<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function usuarioAtual(Request $request)
    {
        $user = Auth::user();
        $license_warning = null;

        if (!$user == null && $user->isCredenciada) { //verifica se o usuário é um guest e também se é um credenciado
            $id_usuario = $user->id;

            $id_credenciada = DB::table('credenciadas')->where('id_usuario', $id_usuario)->first()->id;

            // $data_de_vencimento = DB::table('licenses')->where('id_credenciada', $id_credenciada)->first()->data_vencimento;

            $licenças_credenciada = DB::table('licenses')->where('id_credenciada', $id_credenciada)->get();

            $data_de_hoje_mais_15_dias = date('Y-m-d', strtotime("+15 day"));

            $datas_de_vencimento = [];

            foreach ($licenças_credenciada as $licença) {
                if ($licença->isRevogada != True) {
                    array_push($datas_de_vencimento, $licença->data_vencimento);
                }
            }

            foreach ($datas_de_vencimento as $data_de_vencimento) {
                if ($data_de_hoje_mais_15_dias > $data_de_vencimento) { //se estiver próximo de vencer, mostra um aviso no layout
                    $license_warning = true;
                }
            }

            // vence daqui a 15 dias?
            
        }

        $return_this = view('welcome', ['license_warning' => $license_warning]);

        return $return_this;
    }

    public function show(Request $request)
    {
        return view('dashboard');
    }
}
