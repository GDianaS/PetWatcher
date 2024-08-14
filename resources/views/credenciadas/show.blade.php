@extends('layout')

@section('title', 'Listagem de credenciadas')
@section('content')

@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif


<a class="link-voltar" href="/credenciada">Voltar</a><br>

<div class="panel">
  {{-- <div class="panel-graph-heading">
      É um enorme prazer ter a sua credenciada como nosso parceiro &hearts;
  </div> --}}
  <div class="panel-body bio-graph-info">
      <h3 class="text-center mt-2 mb-2" >Dados da Credenciada</h3>
      <div class="row">
          <div class="bio-row">
              <p><b>CNPJ</b>: {{$credenciada->CNPJ}}</p>
          </div>
          <div class="bio-row">
              <p><b>Inscrição Estadual:</b> {{$credenciada->Inscriçao_Estadual}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Razão Social:</b> {{$credenciada->Razao_Social}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Telefone:</b> {{$credenciada->telefone}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Endereço:</b> {{$credenciada->endereço}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Endereço:</b> {{$credenciada->email}}
              </p>
          </div>
          <div class="bio-row">
              <p><b>Id:</b> {{$credenciada->id_usuario}}
              </p>
          </div>
      </div>
  </div>
</div>

@endsection