@extends('layout')
@section('title','Adicionar espécie')

@section('content')
@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif

<a class="link-voltar" href="/especie">Voltar</a><br>

<form style="max-width: 380px;" class="form-inline" action='{{action('EspecieController@store')}}' method='post'>
    @csrf

    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning mb-2 mt-2">{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <label>Nome: </label>
    <input type='text'  class="form-control @error('nome') is-invalid @enderror" name='nome' value='{{old('nome')}}'>
    @error('nome')
    <div class="feedback invalid-feedback">{{$erro}}</div>
    @enderror
    <input  class="btn btn-primary mb-2" type='submit' value='Enviar'>
</form>


@stop