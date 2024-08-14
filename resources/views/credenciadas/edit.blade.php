@extends('layout')
@section('content')

@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif

<a class="link-voltar" href="/credenciada">Voltar</a><br>

<form style="max-width: 400px;" class="form-inline mt-2" action='{{action('CredenciadaController@update', $credenciada->id)}}' method='post'>
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
        <label class="col-form-label" for="inputDefault">Inscrição Estadual</label>
        <input value="{{$credenciada->Inscriçao_Estadual}}" type="text" class="form-control" placeholder="Default input" name='Inscriçao_Estadual'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Ração Social</label>
        <input value="{{$credenciada->Razao_Social}}" type="text" class="form-control" placeholder="Default input" name='Razao_Social'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Telefone</label>
        <input value="{{$credenciada->telefone}}" type="text" class="form-control" placeholder="Default input" name='telefone'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Email</label>
        <input value="{{$credenciada->email}}" type="text" class="form-control" placeholder="Default input" name='email'>
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Endereço</label>
        <input value="{{$credenciada->endereço}}" type="text" class="form-control" placeholder="Default input" name='endereço'>
    </div>
    <div class="form-group">
        <input class="btn btn-primary mb-2 mt-3" type='submit' value='Enviar'>
    </div>
</form>

@stop