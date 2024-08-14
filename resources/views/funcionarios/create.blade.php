@extends('layout')

@section('content')



<h1>Adicionar um novo funcionario</h1>

<form action='{{action('FuncionarioController@store')}}' method='post'>
    @csrf

    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    <div class="form-group">
        <label class="col-form-label " for="inputDefault">CPF</label>
        <input value="{{old('CPF')}}" type="text" class="form-control @error('CPF') is-invalid @enderror" placeholder="Default input" name='CPF'>
        @error('CPF')
        <div class="invalid-feedback">
            {{$erro}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">Nome</label>
        <input value="{{old('nome')}}" type="text" class="form-control  @error('nome') is-invalid @enderror" placeholder="Default input" name='nome'>
        @error('nome')
        <div class="invalid-feedback">
            {{$erro}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">telefone</label>
        <input value="{{old('telefone')}}" type="text" class="form-control  @error('telefone') is-invalid @enderror" placeholder="Default input" name='telefone'>
        @error('telefone')
        <div class="invalid-feedback">
            {{$erro}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">email</label>
        <input value="{{old('email')}}" type="text" class="form-control  @error('email') is-invalid @enderror" placeholder="Default input" name='email'>
        @error('email')
        <div class="invalid-feedback">
            {{$erro}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label" for="inputDefault">endereço</label>
        <input value="{{old('endereco')}}" type="text" class="form-control  @error('endereco') is-invalid @enderror" placeholder="Default input" name='endereco'>
        @error('endereco')
        <div class="invalid-feedback">
            {{$erro}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <input type='submit' value='enviar'>
    </div>
</form>


@endsection