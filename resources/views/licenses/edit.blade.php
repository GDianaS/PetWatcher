@extends('layout')
@section('title', 'Editar espécie')

@section('content')

@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif
<form style="max-width: 380px;" class="form-inline" action='{{action('EspecieController@update', $especie->id)}}' method='post'>
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

    <div class="form-group mb-2">
        <label >Nome:</label>
        <input  class="form-control" type='text' name='nome' value='{{$especie->nome}}'>
    </div>
    <button type="submit" class="btn btn-primary mb-2">Enviar</button>

</form>

@endsection
