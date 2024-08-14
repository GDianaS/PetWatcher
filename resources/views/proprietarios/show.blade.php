@extends('layout')

@section('title', 'Listagem de proprietários')
@section('content')

<div class="panel">
  <div class="panel-graph-heading">
      É um enorme prazer ter a sua credenciada como nosso parceiro &hearts;
  </div>
  <div class="panel-body bio-graph-info">
      <h3 class="text-center mt-2 mb-2" >Dados do Proprietário</h3>
      <div class="row">
          <div class="bio-row">
              <p><b>Nome</b>: {{$proprietario->nome}}</p>
          </div>
          <div class="bio-row">
              <p><b>Tipo:</b> {{$proprietario->tipo}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>E-mail:</b> {{$proprietario->email}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Telefone:</b> {{$proprietario->telefone}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Endereço:</b> {{$proprietario->endereco}}
              </p>
          </div>
      </div>
  </div>
</div>


@endsection