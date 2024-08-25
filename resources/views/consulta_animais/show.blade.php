@extends('layout')
@section('title', $animal->nome)
@section('content')


<a class="link-voltar" href="/consulta_animal">Voltar</a><br>

@if(Auth::user()->isDivisa || $can_view_more_details)
<div class="panel-body bio-graph-info">
  <h3 class="text-center mt-2 mb-2" >Dados do Animal</h3>
  <div class="row">
          <div class="bio-row">
              <p><b>Nome:</b> {{$animal->nome}}</p>
          </div>
          <div class="bio-row">
              <p><b>Data de Nascimento:</b> {{$animal->dataNascimento}}</p>
          </div>
          <div class="bio-row">
              <p><b>Sexo:</b> {{$animal->sexo}}</p>
          </div>
          <div class="bio-row">
              <p><b>Fase de Crescimento:</b> {{$animal->fase}}</p>
          </div>
          <div class="bio-row">
              <p><b>Porte:</b> {{$animal->porte}}</p>
          </div>
          <div class="bio-row">
              <p><b>Especie:</b> {{$animal->especie}}</p>
          </div>
          <div class="bio-row">
              <p><b>Pedigree:</b></p>
              @if(($animal->hasPedigree) == 0)
                <p>Não</p>
              @endif
              @if(($animal->hasPedigree) == 1)
                <p>Sim</p>
              @endif
          </div>
          <div class="bio-row">
              <p><b>CPF/CNPJ do Proprietário:</b> {{$animal->cpf_ou_cnpj_proprietario}}</p>
          </div>
          <div class="bio-row">
              <p><b>Código do Microchip:</b> {{$animal->codigo_microchip}}</p>
          </div>
          <div class="bio-row">
              <p><b>Telefone da Credenciada:</b> {{$animal->telefone_credenciada}}</p>
          </div>

</div>
@endif

@endsection