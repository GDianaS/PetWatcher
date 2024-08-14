@extends('layout')
@section('title', 'Adicionar uma nova Licença')
@section('content')

@if(Auth::user()->isCredenciada)
<script>
    window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";

</script>
@endif

<link rel="stylesheet" type="text/css" href="/jquery.datetimepicker.css"/ >
<script src="/jquery.js"></script>
<script src="/build/jquery.datetimepicker.full.min.js"></script>


<form style="max-width: 380px;" action='{{action('LicenseController@store')}}' method='post'>
    @csrf
    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning">{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    <div class="form-group row">
        <label>CNPJ: </label>
        <input type='texto' class="form-control ms-2" name='CNPJ' value='70.850.582/0001-80'>
    </div>
    <div class="form-group row">
        <label>Data de licenciamento: </label>
        <div class="input-group date">
            <input type='text' class="form-control datepicker" name='data_de_licenciamento' value='2021-08-12'>
            <span class="input-group-text">
                <span class= "fa fa-calendar"></span>
        </span>
        </div>

    </div>
    <div class="form-group row">
        <label>Data de vencimento da licença: </label>
        <div class="input-group date">
            <input type='text' class="form-control datepicker" name='data_vencimento' value='2021-08-12'>
            <span class="input-group-text">
                <span class= "fa fa-calendar"></span>
        </div>
    </div>

    <input type='submit'class="btn btn-primary mb-2 mt-3" value='Enviar'>
</form>


@endsection