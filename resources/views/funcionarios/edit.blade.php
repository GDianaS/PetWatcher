@extends('layout')
@section('content')


<h1>Editar espécie</h1>
<form action='{{action('CredenciadaController@update', $credenciada->id)}}' method='post'>
    @csrf

    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    {{method_field('put')}}

    <div class="form-group">
        <label class="col-form-label" for="inputDefault">CNPJ</label>
        <input value="{{$credenciada->CNPJ}}" type="text" class="form-control" placeholder="Default input" name='CNPJ'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Inscriçao_Estadual</label>
        <input value="{{$credenciada->Inscriçao_Estadual}}" type="text" class="form-control" placeholder="Default input" name='Inscriçao_Estadual'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Razao_Social</label>
        <input value="{{$credenciada->Razao_Social}}" type="text" class="form-control" placeholder="Default input" name='Razao_Social'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">telefone</label>
        <input value="{{$credenciada->telefone}}" type="text" class="form-control" placeholder="Default input" name='telefone'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">endereço</label>
        <input value="{{$credenciada->endereço}}" type="text" class="form-control" placeholder="Default input" name='endereço'>
    </div>
    <div class="form-group">
        <input type='submit' value='enviar'>
    </div>
</form>

@stop