<?php

namespace App\Http\Controllers;

use App\Proprietario;
use Illuminate\Http\Request;
use \App\Http\Requests\ProprietarioRequest;

use Illuminate\Validation\ValidationException;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proprietarios = Proprietario::all();
        return view('proprietarios.index', compact('proprietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('proprietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProprietarioRequest $request)
    {

        ProprietarioController::tipo_validation($request);

        $proprietario = new Proprietario();
        $proprietario->nome = $request->nome;
        $proprietario->tipo = $request->tipo;
        $proprietario->cpf_ou_cnpj = $request->cpf_ou_cnpj;
        $proprietario->email = $request->email;
        $proprietario->telefone = $request->telefone;
        $proprietario->endereco = $request->endereco;
        $proprietario->save();
        return redirect('/proprietario');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proprietario  $proprietario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proprietario = Proprietario::findOrFail($id);

        return view('proprietarios.show', compact('proprietario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proprietario  $proprietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proprietario = Proprietario::findOrFail($id);
        return view('proprietarios.edit', compact('proprietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proprietario  $proprietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proprietario = Proprietario::findOrFail($id);
        $proprietario->nome = $request->nome;
        $proprietario->tipo = $request->tipo;
        $proprietario->cpf_ou_cnpj = $request->cpf_ou_cnpj;
        $proprietario->email = $request->email;
        $proprietario->telefone = $request->telefone;
        $proprietario->endereco = $request->endereco;
        $proprietario->save();
        return redirect('/proprietario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proprietario  $proprietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proprietario = Proprietario::findOrFail($id);
        $proprietario->delete();
        return redirect('/proprietario');
    }

    public static function tipo_validation(ProprietarioRequest $request)
    {
        if ($request->tipo == 'pessoa jurídica'){
            ProprietarioController::checar_cnpj($request);
        }else{
            ProprietarioController::checar_cpf($request);
        }
    }

    public static function checar_cnpj(ProprietarioRequest $request){
        try{
            $request->validate([
                'cpf_ou_cnpj' => 'required|cnpj',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw ValidationException::withMessages(['CNPJ inválido!']);
        }
    }
    public static function checar_cPF(ProprietarioRequest $request){
        try{
            $dados = $request->validate([
                'cpf_ou_cnpj' => 'required|cpf',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            throw ValidationException::withMessages(['CPF inválido!']);
        }
    }
}
