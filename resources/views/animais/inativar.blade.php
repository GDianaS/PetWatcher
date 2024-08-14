@extends('layout')
@section('title', 'Inativar cadastro de ' . $animal->nome)
@section('content')

<form action='{{action('AnimalController@inativar', $animal->id)}}' method='post'>
    @csrf
    {{method_field('put')}}
    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    <div>
        <label>Motivo Desativação</label>
        <input type='text' name='motivo_desativacao' placeholder='porque o cadastro está sendo desativado'>
    </div>
    <div>
        <input type='submit' value='desativar cadastro do animal'>
    </div>
</form>
@stop