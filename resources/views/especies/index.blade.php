@extends('layout')
@section('title', 'Listagem de espécies')
@section('content')

@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif

@if(count($especies)==0)
        {{-- Verificar se tabela de especies está vazia --}}
        <p class="alert alert-secondary mb-2 mt-2">Não há registro de nenhuma espécies cadastradas</p>
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
            @foreach($especies as $especie)
        <tr>
            <td>{{$especie->nome}}</td>
            <td><a class = "btn btn-warning btn-circle btn-circle-sm m-1" href='{{action('EspecieController@show', $especie->id)}}'><i class="fa fa-paw"></i></a></td>
            <td><a class = "btn btn-secondary btn-circle btn-circle-sm m-1" href='{{action('EspecieController@edit', $especie->id)}}'><i class="fa fa-paint-brush"></i></a></td>
            <td>
            <form action=' {{action('EspecieController@destroy', $especie->id)}}' method='post' onsubmit="return confirm('Tem certeza que deseja remover {{$especie->nome}}?')">
                            @csrf
                            {{method_field('delete')}}
                            <input class = "btn btn-danger btn-circle btn-circle-sm m-1" type='submit' value='Remover'>
                            </form>
            </td>
            @endforeach
        </tr>
        </tbody>
    </table>
    @endif

{{-- Centralizar container: d-flex justify-content-center --}}
<div class="container">
    <button class="btn btn-default"><a href='{{action('EspecieController@create')}}'><b>Adicionar uma nova espécie</b></a></button>
</div>

@stop
