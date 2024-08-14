@extends('layout')
@section('title', 'listagem de animais')
@section('content')
<table>
    <tr>
        <th>Nome</th>
        <th>Visualizar</th>
        <th colspan='1'>Opções</th>


        <th></th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
        @foreach($animais as $animal)
        <tr>
            <td>{{$animal->nome}}</td>
            <td><a class="btn btn-primary" href='{{action('AnimalController@show', $animal->id)}}'>Visualizar</a></td>
            <td><a class="btn btn-primary" href='{{action('AnimalController@edit', $animal->id)}}'>Alterar</a></td>
            <td>
                <form action='{{action('AnimalController@inativar_form', $animal->id)}}' method='post' onsubmit="return confirm('tem certeza que deseja dar baixa no cadastro de {{$animal->nome}}?')">
                    @csrf
                    {{method_field('get')}}
                    <input class="btn btn-danger" type='submit' value='inativar'>
                </form>
            </td>
            <td>
                    @if($animal->isCadastroAtivo)
                        Ativo!
                    @else
                        Inativo!
                    @endif
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
{{-- Centralizar container: d-flex justify-content-center --}}
<div class="container">
    <button class="btn btn-default"><a href='{{action('AnimalController@create')}}'><b>Adicionar um novo animal</b></a></button>
</div>

@stop