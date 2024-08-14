@extends('layout')

@section('title', $animal->nome)
@section('content')
<p>{{$animal->nome}}</p>
<p>{{$animal->cpf_ou_cnpj_proprietario}}</p>
<p>{{$animal->dataNascimento}}</p>
<p>{{$animal->sexo}}</p>
<p>{{$animal->fase}}</p>
<p>{{$animal->porte}}</p>
<p>{{$animal->codigo_microchip}}</p>
<p>{{$animal->especie}}</p>
<p>{{$animal->hasPedigree}}</p>
@endsection