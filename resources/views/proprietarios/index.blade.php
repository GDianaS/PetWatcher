@extends('layout')
@section('title', 'Listagem de proprietários')
@section('content')

@if(count($proprietarios)==0)
        {{-- Verificar se tabela está vazia --}}
        <p class="alert alert-secondary mb-2 mt-2">Não há registro de nenhum proprietário cadastrado</p>
    @else

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Visualizar</th>
                <th>Alterar</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proprietarios as $proprietario)
        <tr>
            <td>{{$proprietario->nome}}</td>
            <td><a class = "btn btn-warning btn-circle btn-circle-sm m-1" href='{{action('ProprietarioController@show', $proprietario->id)}}'><i class="fa fa-user"></i></a></td>
            <td><a class = "btn btn-secondary btn-circle btn-circle-sm m-1" href='{{action('ProprietarioController@edit', $proprietario->id)}}'><i class="fa fa-paint-brush"></i></a></td>
            <td>
            <form action=' {{action('ProprietarioController@destroy', $proprietario->id)}}' method='post' onsubmit="return confirm('Tem certeza que deseja remover {{$proprietario->nome}}?')">
                            @csrf
                            {{method_field('delete')}}
                            <input class = "btn btn-danger btn-circle btn-circle-sm m-1" type='submit' value='Remover'>
                            </form>
            </td>
        </tr>
         @endforeach
        
        </tbody>
    </table>

    @endif

    <div class="container">
        <button class="btn btn-default"><a href='{{action('ProprietarioController@create')}}'><b>Adicionar um novo proprietário</b></a></button>
    </div>

@stop
