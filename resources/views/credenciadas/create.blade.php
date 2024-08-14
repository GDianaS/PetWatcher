@extends('layout')
@section('title','Adicionar credenciada')
@section('content')

@if(Auth::user()->isCredenciada)
<script>window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";</script>
@endif

<a class="link-voltar" href="/credenciada">Voltar</a><br>

<form style="max-width: 400px;" class="form-inline mt-2" action='{{action('CredenciadaController@store')}}' method='post'>
    @csrf

    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning mb-2 mt-2">{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">CNPJ: </label>
        <input value="{{old('CNPJ')}}" type="text" class="form-control @error('CNPJ') is-invalid @enderror" placeholder="Default input" name='CNPJ'>
        @error('CNPJ')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Inscrição Estadual: </label>
        <input value="{{old('Inscriçao_Estadual')}}" type="text" class="form-control @error('Inscriçao_Estadual') is-invalid @enderror" placeholder="Default input"  name='Inscriçao_Estadual'>
        @error('Inscriçao_Estadual')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Razão Social: </label>
        <input value="P{{old('Razao_Social')}}" type="text" class="form-control @error('Razao_Social') is-invalid @enderror" placeholder="Default input" name='Razao_Social'>
        @error('Razao_Social')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Telefone: </label>
        <input value="{{old('telefone')}}" type="text" class="form-control @error('telefone') is-invalid @enderror" placeholder="Default input"name='telefone'>
        @error('telefone')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Email: </label>
        <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Default input"name='email'>
        @error('email')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Endereço: </label>
        <input value="{{old('endereço')}}" type="text" class="form-control @error('endereço') is-invalid @enderror" placeholder="Default input"name='endereço'>
        @error('endereço')
        <div class='invalid-feedback'>
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <input type='submit' class="btn btn-primary mb-2 mt-3" value='Enviar'>
    </div>
</form>


@endsection