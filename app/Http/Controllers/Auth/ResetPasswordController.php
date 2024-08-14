<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Support\Facades\DB;

use Illuminate\Validation\ValidationException;


use App\Http\Requests\ResetPasswordRequest;

class ResetPasswordController extends Controller
{


    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Atualiza a senha do usuário.
     *
     * Se a senha do usuário for a mesma que consta no banco de dados, e se as senhas novas coincidirem, aceder a troca; senão, apontar o erro
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset');
    }


    public function resetPassword(ResetPasswordRequest $request)
    {

        $hashedPassword = Auth::user()->password;
        
        ResetPasswordController::oldPasswordsCheck(Hash::check($request->oldpassword, $hashedPassword));

        ResetPasswordController::newPasswordsCheck($request->newpassword == $request->newpasswordconfirm);

        ResetPasswordController::newPasswordEqualOldPasswordHashCheck(Hash::check($request->newpassword, $hashedPassword));


        Auth::user()->password = bcrypt($request->newpassword);
        Auth::user()->update(array('password' =>  Auth::user()->password));

        return view('auth.passwords.passwordupdated');
    }

    protected static function newPasswordsCheck(bool $matchingPassword)
    {
        if ($matchingPassword == false) {
            throw ValidationException::withMessages(['senhas não coincidem!']);
        }
    }

    protected static function newPasswordEqualOldPasswordHashCheck(bool $matchingPassword)
    {
        if ($matchingPassword == true) {
            throw ValidationException::withMessages(['senha nova igual a senha anterior!']);
        }
    }

    protected static function oldPasswordsCheck(bool $matchingPassword)
    {
        if ($matchingPassword == false) {
            throw ValidationException::withMessages(['senhas atual incorreta!']);
        }
    }
}
