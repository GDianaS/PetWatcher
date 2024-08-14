<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use \App\User;
use \App\License;


use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Auth\Illuminate\Support\Collection;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected function attemptLogin(Request $request)
    {
        LoginController::userExists($request->email);

        LoginController::userIsCredenciada($request->email);

        LoginController::userIsFuncionarioCredenciada($request->email);

        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    protected static function checkLicenses(String $email)
    {
        //encontrar o id_usuário referente a esta licença 
        //encontrar as licenças que batem com a credenciada requisitada
        //encontrar a data de vencimento
        //Se a licença estiver vencida, travar acesso, se estiver pra vencer, enviar uma warning.
        $id_usuario = DB::table('users')->where('email', $email)->first()->id;

        $id_credenciada = DB::table('credenciadas')->where('id_usuario', $id_usuario)->first()->id;

        $licenças_credenciada = DB::table('licenses')->where('id_credenciada', $id_credenciada)->get();

        $datas_de_vencimento = LoginController::getDatasVencimento($licenças_credenciada);

        LoginController::anyLicenseValid($datas_de_vencimento);
    }

    protected static function checkActiveStatus(String $email)
    {
        //encontrar a credenciada referente ao usuário requisitado
        //verificar se seu status é ativo ou não
        //Se seu status for inativo, travar acesso
        $id_usuario = DB::table('users')->where('email', $email)->first()->id;

        $status_usuario = DB::table('credenciadas')->where('id_usuario', $id_usuario)->first()->situacao;

        //está inativo?
        if (strcmp($status_usuario, 'ativo') != 0) {
            throw ValidationException::withMessages(['sua conta foi desativada!']);
        }
    }

    protected static function checkActiveFuncionarioStatus(String $email)
    {
        //encontrar o funcionario referente ao usuário requisitado
        //verificar se seu status é ativo ou não
        //Se seu status for inativo, travar acesso
        $id_usuario = DB::table('users')->where('email', $email)->first()->id;

        $status_usuario = DB::table('funcionarios')->where('id_usuario', $id_usuario)->first()->isActive;

        //está inativo?
        if (!$status_usuario) {
            throw ValidationException::withMessages(['sua conta foi desativada!']);
        }
    }

    protected static function userExists(String $email)
    {
        if (DB::table('users')->where('email', $email)->first() == null) {
            throw ValidationException::withMessages([trans('auth.email')]);
        }
    }

    protected static function userIsCredenciada(String $email)
    {
        
        if (DB::table('users')->where('email', $email)->first()->isCredenciada) {
            LoginController::checkLicenses($email);
            LoginController::checkActiveStatus($email);
        }
    }

    protected static function userIsFuncionarioCredenciada(String $email)
    {
        if (DB::table('users')->where('email', $email)->first()->isFuncionarioCredenciada) {
            LoginController::checkActiveFuncionarioStatus($email);
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        if (!User::where('email', $request->email)->where('password', bcrypt($request->password))->first()) {
            throw ValidationException::withMessages([trans('auth.password')]);
        }
    }

    protected static function getDatasVencimento($licenças_credenciada)
    {
        $datas_de_vencimento = [];
        foreach ($licenças_credenciada as $licença) {
            if ($licença->isRevogada != True) {
                array_push($datas_de_vencimento, $licença->data_vencimento);
            }
        }
        return $datas_de_vencimento;
    }

    protected static function anyLicenseValid($datas_de_vencimento)
    {
        //alguma licença é válida?
        $data_de_hoje = date('Y-m-d', time());
        $anyLicenseValid = False;

        foreach ($datas_de_vencimento as $data_de_vencimento) {
            //isValid?
            if ($data_de_hoje <= $data_de_vencimento) {
                $anyLicenseValid = True;
            }
        }

        if($anyLicenseValid == False){
            throw ValidationException::withMessages([trans('auth.license')]);
        }
    }
}
