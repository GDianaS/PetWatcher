@extends('layout')

@section('title', 'Bem vindo!')

@section('content')
@if(!$license_warning==null)
<div class="alert alert-dismissible alert-warning">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Atenção!</h4>
    <p class="mb-0">Alguma de suas licenças está próxima de expirar! Se sua licença já foi renovada, ignore este aviso.<a href="#" class="alert-link">Ouvidoria</a>.</p>
</div>

@endif

<div id="slider">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center gray-box">
                <h1>Pet Watcher</h1>
                <h4>Pet Watcher é uma plataforma digital que visa viabilizar o Registro Geral de Animais de Estimação, consiste na chipagem de animais, com cadastro online.</h4>
            </div>
            <div class="col-md-6 align-self-center text-center">
                <img class="img-fluid" src="assets/undraw_relaxing_walk.svg" alt="" />
            </div>
        </div>
    </div>
</div>


<section class="hello-painel" >
    <div class="container">
        <div class="justify-content-center text-center">
            <h3>
            @if(auth()->check())
            Olá {{Auth::user()->name}}!
                @if(Auth::user()->isDivisa == True)
                Sua divisa está bem!
                @endif
                @if(Auth::user()->isCredenciada == True)
                Sua Credenciada está bem!
                @endif

                @if(Auth::user()->isFuncionarioCredenciada == True)
                Mantenha seu chefe feliz!@
                @endif
            @endif
            </h3>
        </div>
    </div>

</section>


@endsection