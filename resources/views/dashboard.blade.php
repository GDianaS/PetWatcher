@extends('layout')

@section('title', 'Dashboard do Usuário')

@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 mt-2 pt-3">
      <div class="row z-depth-3">
        <div class="col-sm-4 rounded-left" style="background-color: var(--second-light);">
          <div class="card-block text-center text-white">
          <img src="https://avatars.dicebear.com/api/avataaars/{{$user = Auth::user()->email}}.svg">
            <h2 class="font-weight-bold mt-4"> Olá, {{$user = Auth::user()->name}}!</h2>
            <p class="text-center">
                @if(auth()->check())
                    @if(Auth::user()->isDivisa == True)
                    Divisa
                    @endif
                    @if(Auth::user()->isCredenciada == True)
                    Credenciada
                    @endif
                    @if(Auth::user()->isFuncionarioCredenciada == True)
                    Funcionário da Credenciada
                    @endif
                @endif
            </p>
            <i class="far fa-edit fa-2x mb-4"></i>
          </div>
        </div>
        <div class="col-sm-8 bg-white rounded-right">
          <h3 class="mt-3 text-center">Dados Pessoais</h3>
          <hr class="bg-primary">
          <div class="row">
            <div class="col-sm-6">
              <p class="lead">E-mail:</p>
              <h6 class="text-muted">{{$user=Auth::user()->email}}</h6>
            </div>
            <div class="col-sm-6">
              <p class="lead">Data de Ingresso:</p>
              <h6 class="text-muted">{{$user=Auth::user()->created_at}}</h6>
            </div>
          </div>
          <hr class="bg-primary">
          <p class="lead text-center">O que deseja fazer hoje?</p>
          <ul class="list-unstyled d-flex justify-content-center mt-4">
            <li><a type="button" class="btn text-white" style="background-color: var(--second-dark);" href="/password_reset">Alterar Senha</a>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection