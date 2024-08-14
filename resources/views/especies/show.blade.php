@extends('layout')

@section('title', 'Listagem de especies')
@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif
@section('content')

<a class="link-voltar" href="/especie">Voltar</a><br>

{{$especie->nome}}

@endsection