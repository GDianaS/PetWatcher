@extends('layout')
@section('content')

@section('title', 'Revogação de licenças')

@if(Auth::user()->isLicense)
<script>
    window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
</script>
@endif

<form form style="max-width: 380px;" class="form-inline" action='{{action('LicenseController@get_credenciada_licenses')}}' method='post'>
    @csrf
    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li class="alert alert-warning">{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    
    <div class="form-group mb-2">
        <label>CNPJ da Credenciada: </label>
        <input type='text' class="form-control mt-2" name='CNPJ' value='{{old('CNPJ')}}'>
    </div>
    <input type='submit' class="btn btn-primary mb-4 mt-3" value='Buscar licenças'>
</form>

@if(count($licenças_credenciada) > 0)
<div class="container">
    <div class="row">
        @foreach($licenças_credenciada->all() as $licença)
        <div class="col-sm-11 col-md-7 col-lg-4">
            <div id="card-license" class= @if($licença->isRevogada) 'card card-revogada p-3 mb-3'
                @else 'card card-ativada p-3 mb-3'
                @endif
                style="max-width: 20rem;">

                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row">
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Data do Licenciamento:<br> {{$licença->data_de_licenciamento}}</h6> 
                            <h6 class="mb-0">Data do Vencimento:<br> {{$licença->data_vencimento}}</h6> 
                        </div>
                    </div>
                    {{-- <div class="badge"> <span>Design</span> </div> --}}
                </div>
                <div class="mt-5">
                    <h3 class="heading text-center">@if($licença->isRevogada) Revogada
                        @else Ativa
                        @endif</h3>
                    <div class="mt-5">
                        <form class="align-items-center text-center" action='{{action('LicenseController@toggle_isRevogada', $licença->id)}}' method='post' onsubmit="return confirm('Tem certeza que deseja revogar esta licença??')">
                            @csrf
                            {{method_field('put')}}
                        
                            <input type='submit'class="btn" style="background-color:#E0B1CB" value=
                            @if($licença->isRevogada) 'Ativar Licença'
                            @else 'Revogar Licença'
                            @endif>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endif

@endsection