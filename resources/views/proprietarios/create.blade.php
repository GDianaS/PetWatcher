@extends('layout')
@section('title', 'Adicionar proprietário')
@section('content')

<form style="max-width: 400px;" class="form-inline mt-2" action='{{action('ProprietarioController@store')}}' method='post'>
    @csrf

    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning mb-2 mt-2">{{$erro}}</li></p>
        @endforeach
    </ul>
    @endif

    <label class="col-form-label" >Tipo</label>
    <select class="form-select" aria-label=".form-select-sm example" name='tipo'>
        <option selected>Selecione</option>
        <option value='Pessoa Física'>Pessoa Física</option>
        <option value='Pessoa Jurídica'>Pessoa Jurídica</option>
    </select>

    <div class="form-group">
        <label class="col-form-label" >CPF ou CNPJ</label>
        <input type='text' class="form-control" name='cpf_ou_cnpj' placeholder='CPF ou CNPJ'>
    </div>

    <div class="form-group">
        <label class="col-form-label" >Nome</label>
        <input type='text' class="form-control" name='nome' placeholder='nome'>
    </div>

    <div class="form-group">
        <label class="col-form-label" >E-mail</label>
        <input type='email' class="form-control" name='email' placeholder='nome@exemplo.com'>
    </div>

    <div class="form-group">
        <label>Telefone</label>
        <input type='text' class="form-control" name='telefone' placeholder='(93) 99999999'>
    </div>

    <div class="form-group">
        <label class="col-form-label" >Endereço</label>
        <input type='text' class="form-control" name='endereco' placeholder='Rua ipê 222 Matinha'>
    </div>

    <div class="form-group">
        <input type='submit' class="btn btn-primary mb-2 mt-3" value='Enviar'>
    </div>
</form>
@stop