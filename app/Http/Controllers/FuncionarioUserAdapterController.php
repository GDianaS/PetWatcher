<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioUserAdapterController extends Controller
{
    public static function validator(\App\Funcionario $data)
    {
        //verificar se o email(cnpj) é único
        if (DB::table('funcionarios')->where('CPF', $data->CNPJ)->first() != null) {
            throw ValidationException::withMessages(['Funcionario JÁ EXISTE']);
        }

        return true;
    }

    public static function create(\App\Funcionario $funcionario)
    {
        return User::create([
            'name' => $funcionario->nome,
            'email' => $funcionario->email,
            'password' => bcrypt(preg_replace("/[^A-Za-z0-9]/", '', $funcionario->CPF)),
            'isDivisa' => False,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => True,
        ]);
    }

    public static function reset_funcionario_password($id_funcionario)
    {
        $funcionario = Funcionario::findOrFail($id_funcionario);

        $user = User::findOrFail($funcionario->id_usuario);

        $user->password = bcrypt(preg_replace("/[^A-Za-z0-9]/", '', $funcionario->CPF));

        $user->save();
        
    }
}
