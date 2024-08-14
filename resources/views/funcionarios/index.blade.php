@extends('layout')
@section('title', 'listagem funcionarios')
@section('content')

<table>
    <tr>
        <th>Nome</th>

        <th>visualizar</th>


        <th colspan='1'>Opções</th>
        <th>Situacao</th>


    </tr>
    @foreach($funcionarios as $funcionario)
    <tr>
        <td>{{$funcionario->nome}}</td>
        <td><a href='{{action('FuncionarioController@show', $funcionario->id)}}'>visualizar</a></td>
        <td><a href='{{action('FuncionarioController@edit', $funcionario->id)}}''>Alterar</a></td>
        <td><label>
            @if($funcionario->isActive)
            Ativo
            @else
            Bloqueado
            @endif
        </label></td>
<td>

 <form action=' {{action('FuncionarioController@toggle_situacao',$funcionario->id )}}' method='post' onsubmit="return confirm('tem certeza que deseja Atualizar a situação de {{$funcionario->nome}}?')">
                @csrf
                {{method_field('put')}}
                <input type='submit' value='Atualizar situação da licença'>
                </form>

                <form action='{{action('FuncionarioController@reset_funcionario_password', $funcionario->id)}}' method='post' onsubmit="return confirm('tem certeza que deseja resetar a senh de {{$funcionario->nome}}?')">
                    @csrf
                    {{method_field('put')}}
                    <input type='submit' value='Resetar senha do usuário'>
                </form>

        </td>
        @endforeach
</table>
<button><a href='{{action('FuncionarioController@create')}}'>Adicionar uma nova funcionario</a></button>
@endsection