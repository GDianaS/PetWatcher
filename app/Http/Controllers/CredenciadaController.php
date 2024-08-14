<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Credenciada;
use App\Http\Requests\CredenciadaRequest;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\CredenciadaUserAdapterController;
use App\Http\Requests\UpdateCredenciadaRequest;

class CredenciadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $credenciadas = Credenciada::all();
        return view('credenciadas.index', compact('credenciadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credenciadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CredenciadaRequest $request)
    {
        
        $credenciada = new Credenciada();
        $credenciada->CNPJ = $request->CNPJ;
        $credenciada->Inscriçao_Estadual = $request->Inscriçao_Estadual;
        $credenciada->Razao_Social = $request->Razao_Social;
        $credenciada->telefone = $request->telefone;
        $credenciada->email = $request->email;
        $credenciada->endereço = $request->endereço;
        $credenciada->situacao = 'inativo';

        CredenciadaUserAdapterController::validator($credenciada);

        CredenciadaUserAdapterController::create($credenciada);
        

        //se for válido, recuperar o ID do usuário criado com o CNPJ convertido em email desta recém-criada credenciada
        $id_usuario = DB::table('users')->where('email', $credenciada->email)->first()->id;

        $credenciada->id_usuario = $id_usuario;

        $credenciada->save();

        return redirect('/credenciada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credenciada  $credenciada
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $credenciada = Credenciada::findOrFail($id);
        return view('credenciadas.show', compact('credenciada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credenciada  $credenciada
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credenciada = Credenciada::findOrFail($id);
        return view('credenciadas.edit', compact('credenciada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credenciada  $credenciada
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCredenciadaRequest $request, $id)
    {
        $credenciada = Credenciada::findOrFail($id);
        $credenciada->Inscriçao_Estadual = $request->Inscriçao_Estadual;
        $credenciada->Razao_Social = $request->Razao_Social;
        $credenciada->telefone = $request->telefone;
        $credenciada->endereço = $request->endereço;
        $credenciada->email = $request->email;

        CredenciadaUserAdapterController::update($request, $credenciada->id_usuario);

        $credenciada->save();
        return redirect('/credenciada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credenciada  $credenciada
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $credenciada = Credenciada::findOrFail($id);
        $credenciada->delete();
        
        return redirect('/credenciada');

        //
    }
    public function toggle_sitaucao($id)
    {
        $credenciada = Credenciada::findOrFail($id);

        $situacao = $credenciada->situacao;

        if($situacao == 'inativo'){
            $credenciada->situacao = 'ativo';
        }
        else{
            $credenciada->situacao = 'inativo';
        }
        $credenciada->save();
        return redirect('/credenciada');
    }

    public function reset_credenciada_password($id)
    {
        CredenciadaUserAdapterController::reset_credenciada_password($id);
        return redirect('/credenciada');
    }
}
