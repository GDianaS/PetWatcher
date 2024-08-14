@extends('layout')
@section('title', 'listagem geral de animais')
@section('content')
<form form style="max-width: 380px;" class="form-inline" action='{{action('AnimalController@index_geral')}}' method='post'>
    @csrf
    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning">{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <div class="form-group mb-2">
        <label>Codigo do microchip: </label>
        <input type='text' class="form-control mt-2" name='codigo_microchip' value='{{old('codigo_microchip')}}'>
    </div>
    <input type='submit' class="btn btn-primary mb-4 mt-3" value='Buscar animais'>
</form>
<table>
    @if($animal_encontrado != null)
    <h3>Animais encontrados</h3>
    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">{{$animal_encontrado->codigo_microchip}}</div>
        <div class="card-body">
            <h4 class="card-title">{{$animal_encontrado->nome}}</h4>
            <p class="card-text">Cadastrado por {{ DB::table('credenciadas')->where('id', $animal_encontrado->id_credenciada)->first()->Razao_Social}}</p>
            <p class="card-text">Contato: {{ DB::table('credenciadas')->where('id', $animal_encontrado->id_credenciada)->first()->telefone}}</p>
            <a class="btn btn-primary" href='{{action('AnimalController@show_geral', $animal_encontrado->id)}}'>Visualizar</a>
        </div>
    </div>
    @endif
    <h3>Todos os animais do sistema:</h3>
    @foreach($animais as $animal)
    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">{{$animal->codigo_microchip}}</div>
        <div class="card-body">
            <h4 class="card-title">{{$animal->nome}}</h4>
            <p class="card-text">Cadastrado por {{ DB::table('credenciadas')->where('id', $animal->id_credenciada)->first()->Razao_Social}}</p>
            <p class="card-text">Contato: {{ DB::table('credenciadas')->where('id', $animal->id_credenciada)->first()->telefone}}</p>
            <a class="btn btn-primary" href='{{action('AnimalController@show_geral', $animal->id)}}'>Visualizar</a>
        </div>
    </div>


    @endforeach
</table>
{{-- Centralizar container: d-flex justify-content-center --}}

@stop