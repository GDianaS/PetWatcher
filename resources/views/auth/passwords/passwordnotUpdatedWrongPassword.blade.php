@extends('layout')

@section('title', 'Erro na atualização da senha!')

@section('content')
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>ERRO! </strong>Senha não atualizada. Verifique suas credenciais e tente novamente. Volte para a <a href="/" class="alert-link">home</a>.
</div>
@endsection
