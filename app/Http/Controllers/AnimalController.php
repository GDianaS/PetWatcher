<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Especie;
use App\Credenciada;
use App\Funcionario;
use App\Http\Requests\AnimalMicrochipRequest;
use App\Http\Requests\AnimalRequest;
use App\Http\Requests\InativacaoCadastroAnimalRequest;
use App\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(AnimalController::get_id_credenciada());
        $animais = Animal::where('id_credenciada', AnimalController::get_id_credenciada())->get();
        
        return view('animais.index', compact('animais'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show_animal_geral(AnimalMicrochipRequest $request)
    {
        $animal_encontrado = Animal::where('codigo_microchip',$request->codigo_microchip)->first();
        $animais = Animal::all();
        return view('consulta_animais.index', compact('animais'), ['animal_encontrado'=>$animal_encontrado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especie::all();
        return view('animais.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalRequest $request)
    {
        
        $animal = new Animal();
        //primeiro as informações relacionadas ao animal
        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->cpf_ou_cnpj_proprietario = $request->cpf_ou_cnpj;
        $animal->dataNascimento = $request->data_nascimento;
        $animal->sexo = $request->genero;
        $animal->porte = $request->porte;
        $animal->fase = $request->fase;
        $animal->telefone_credenciada = AnimalController::get_telefone_credenciada();

        if ($request->has_pedigree == 'on') {
            $animal->hasPedigree = true;
        } else $animal->hasPedigree = false;

        if ($animal->hasPedigree) {
            AnimalController::get_isNull_error($request->pedigree);
            AnimalController::get_isNull_error($request->origem_pedigree);
            $animal->codigo_pedigree = $request->pedigree;
            $animal->origem_pedigree = $request->origem_pedigree;
        }
        $animal->codigo_microchip = $request->codigo_microchip;

        $animal->tipo = $request->tipo_aquisicao;
        $animal->data_cadastro = date('Y-m-d', time());
        $animal->isCadastroAtivo = true;
        $animal->motivoDesativacao = '';
        $animal->id_credenciada = AnimalController::get_id_credenciada();
        $animal->save();

        return redirect('/animal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.show', compact('animal'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especies = Especie::all();
        $animal = Animal::findOrFail($id);
        return view('animais.edit', compact('animal', 'especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $animal = Animal::findOrFail($id);
        

        $animal->nome = $request->nome;
        $animal->especie = $request->especie;
        $animal->cpf_ou_cnpj_proprietario = $request->cpf_ou_cnpj;
        $animal->dataNascimento = $request->data_nascimento;
        $animal->sexo = $request->genero;
        $animal->porte = $request->porte;

        if ($request->has_pedigree == 'on') {
            $animal->hasPedigree = true;
        } else $animal->hasPedigree = false;

        if ($animal->hasPedigree) {
            AnimalController::get_isNull_error($request->pedigree);
            AnimalController::get_isNull_error($request->origem_pedigree);
            $animal->codigo_pedigree = $request->pedigree;
            $animal->origem_pedigree = $request->origem_pedigree;
        }
        $animal->save();

        $animal->tipo = $request->tipo_aquisicao;
        $animal->id_credenciada = AnimalController::get_id_credenciada();

        return redirect('/animal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect('/animal');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function inativar_form($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.inativar', compact('animal'));

    }
    public function inativar(InativacaoCadastroAnimalRequest $request, $id)
    {
        $animal = Animal::findOrFail($id);
        $animal->isCadastroAtivo = false;
        $animal->motivoDesativacao = $request->motivo_desativacao;
        $animal->save();
        return redirect('/animal');

    }

    public static function get_id_credenciada()
    {
        $funcionario = Funcionario::where('email', Auth::user()->email)->first();
        return $funcionario->id_credenciada;
    }

    public static function get_telefone_credenciada()
    {
        $funcionario = Funcionario::where('email', Auth::user()->email)->first();
        $credenciada = Credenciada::where('id', $funcionario->id_credenciada)->first();
        return $credenciada->telefone;
    }
    public static function get_isNull_error($dado)
    {
        if ($dado == null) {
            throw ValidationException::withMessages(['Os campos origem e número de pedigree precisam ser preenchidos!']);
        }
    }
    public static function codigo_microchip_is_unique($dado)
    {
        if (DB::table('animals')->where('codigo_microchip', $dado)->first() != null) {
            throw ValidationException::withMessages(['Microchip já consta no sistema!']);
        }
    }

    public function show_geral($id)
    {
        $can_view_more_details = false;
        $animal = Animal::findOrFail($id);
        $all_funcs = Funcionario::where('id_credenciada',$animal->id_credenciada)->get(); //todos os funcionarios da credenciada onde o animal foi cadastrado
        foreach ($all_funcs as $func) {
            if($func->id_usuario == Auth::user()->id){
                $can_view_more_details = true;
            }
        }
        return view('consulta_animais.show', compact('animal', 'can_view_more_details'));
    }

    public function index_geral()
    {
        $animais = Animal::all();
        $credenciadas = Credenciada::all();
        return view('consulta_animais.index', compact('animais', 'credenciadas'),['animal_encontrado'=>[]]);
    }
}
