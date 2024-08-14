<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Credenciada;
use App\Http\Requests\FuncionarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::where('id_credenciada', FuncionarioController::get_current_id_credenciada())->get();
        // dd(Funcionario::where('id_credenciada', FuncionarioController::get_current_id_credenciada())->get());
        return view('funcionarios.index', compact('funcionarios'));
    }

    public static function get_current_id_credenciada()
    {
        $credenciada = Credenciada::where('id_usuario', Auth::user()->id)->first();
        return $credenciada->id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        $funcionario = new Funcionario();
        $funcionario->CPF = $request->CPF;
        $funcionario->id_credenciada = FuncionarioController::get_id_credenciada(Auth::user()->id);
        $funcionario->nome = $request->nome;
        $funcionario->telefone = $request->telefone;
        $funcionario->endereco = $request->endereco;
        $funcionario->email = $request->email;
        $funcionario->isActive = true;

        FuncionarioUserAdapterController::validator($funcionario);

        FuncionarioUserAdapterController::create($funcionario);


        //se for válido, recuperar o ID do usuário criado com o CNPJ convertido em email desta recém-criada credenciada
        $id_usuario = DB::table('users')->where('email', $funcionario->email)->first()->id;

        $funcionario->id_usuario = $id_usuario;

        $funcionario->save();

        return redirect('/funcionario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }

    public static function get_id_credenciada($user_id)
    {
        return DB::table('credenciadas')->where('id_usuario', $user_id)->first()->id;
    }

    public function reset_funcionario_password($id)
    {
        FuncionarioUserAdapterController::reset_funcionario_password($id);
        return redirect('/funcionario');
    }

    public function toggle_situacao($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $situacao = $funcionario->isActive;

        if($situacao == 1){
            $funcionario->isActive = 0;
        }
        else{
            $funcionario->isActive = 1;
        }
        $funcionario->save();
        return redirect('/funcionario');
    }
}
