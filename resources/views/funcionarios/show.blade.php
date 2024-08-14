@extends('layout')

@section('title', 'Listagem de credenciadas')

@section('content')
{{$funcionario->nome}}
{{$funcionario->Inscriçao_Estadual}}
{{$funcionario->Razao_Social}}
{{$funcionario->telefone}}
{{$funcionario->endereço}}
{{$funcionario->id_usuario}}
@endsection