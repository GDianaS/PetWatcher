@extends('layout')

@section('title', 'Dados de espécie')
@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif
@section('content')
{{$especie->nome}}
@endsection