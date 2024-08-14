@extends('layout')
@section('title', 'Editar dados do proprietário')
@section('content')

<form action='{{action('ProprietarioController@update', $proprietario->id)}}' method='post'>
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
<label>Tipo</label>
    
<select name='tipo'>
<option value=''>Selecione</option>        
<option value='Pessoa Física'>Pessoa física</option>
        <option value='pessoa jurídica'>Pessoa Jurídica</option>
    </select>
<div>
    <label>CPF ou CNPJ</label>
    <input type='text' name='cpf_ou_cnpj' placeholder='CPF ou CNPJ' value='{{$proprietario->cpf_ou_cnpj}}'>
</div>
    <div>
    <label>Nome</label>
<input type='text' name='nome' placeholder='nome' value='{{$proprietario->nome}}'>
</div>
<div><label>e-mail</label>
<input type='email' name='email' placeholder='nome@exemplo.com' value='{{$proprietario->email}}'>
</div>
<div>
<label>Telefone</label>
<input type='text' name='telefone' placeholder='(93) 99999999' value='{{$proprietario->telefone}}'>
</div>
<div>
    <label>Endereço</label>
    <input type='text' name='endereco' placeholder='endereço' value='{{$proprietario->endereco}}'>
</div>
<div>
    <input type='submit' value='alterar dados'>
</form>
@stop