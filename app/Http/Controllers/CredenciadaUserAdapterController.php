<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use \App\Credenciada;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Validation\ValidationException;

class CredenciadaUserAdapterController extends Controller
{
    public static function validator(\App\Credenciada $data)
    {
        //verificar se o email(cnpj) é único
        if (DB::table('credenciadas')->where('CNPJ', $data->CNPJ)->first() != null) {
            throw ValidationException::withMessages(['CREDENCIADA JÁ EXISTE']);
        }

        return true;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public static function create(\App\Credenciada $credenciada)
    {

        return User::create([
            
            'name' => $credenciada->Razao_Social,
            'email' => $credenciada->email,
            'password' => bcrypt(preg_replace("/[^A-Za-z0-9 ]/", '', $credenciada->CNPJ)),
            'isDivisa' => False,
            'isCredenciada' => True,
            'isFuncionarioCredenciada' => False,
        ]);
    }

    public static function update(Request $request, int $id)
    {
        try{
            $request->validate([
                'email' => 'unique:users',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw ValidationException::withMessages(['Email já consta no sistema!']);
        }
        $user = User::findOrFail($id);
        $user->name = $request->Razao_Social;
        $user->email = $request->email;
        $user->save();
    }

    public static function reset_credenciada_password($id_credenciada)
    {
        $credenciada = Credenciada::findOrFail($id_credenciada);

        $user = User::findOrFail($credenciada->id_usuario);

        $user->password = bcrypt($credenciada->CNPJ);

        $user->save();
        
    }
}
