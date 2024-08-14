@extends('layout')
@section('title', 'Listagem de credenciadas')
@section('content')

@if(Auth::user()->isCredenciada)
<script>
    window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
</script>
@endif

<div class="table-responsive">
    <table class="table table-hover">
            <tr>
        
                <th>Razão Social</th>
                <th>Visualizar</th>
                <th>Alterar</th>
                <th colspan="3">Situação</th>
        
            </tr>
            @foreach($credenciadas as $credenciada)
            <tr>
                <td>{{$credenciada->Razao_Social}}</td>
                <td><a class = "btn btn-warning btn-circle btn-circle-sm m-1" href='{{action('CredenciadaController@show', $credenciada->id)}}'><i class="fa fa-users"></i></a></td>
                <td><a class = "btn btn-secondary btn-circle btn-circle-sm m-1" href='{{action('CredenciadaController@edit', $credenciada->id)}}'><i class="fa fa-paint-brush"></i></a></td>
                <td><label>
                    <span style="text-transform: uppercase;">{{$credenciada->situacao}}</span>
                </label></td>
                <td>
                    <form action='{{action('CredenciadaController@toggle_sitaucao',$credenciada->id )}}' method='post' onsubmit="return confirm('tem certeza que deseja Atualizar a situação da licença de {{$credenciada->Razao_Social}}?')">
                        @csrf
                        {{method_field('put')}}
                        <input type='submit' class="btn btn-rounded mb-2" style="background-color:var(--second-light)" value='Atualizar situação da licença'>
                        </form>
        
                        <form action='{{action('CredenciadaController@reset_credenciada_password', $credenciada->id)}}' method='post' onsubmit="return confirm('Tem certeza que deseja resetar a senha de {{$credenciada->Razao_Social}}?')">
                            @csrf
                            {{method_field('put')}}
                            <input type='submit' class="btn btn-rounded " style="background-color: var(--second-light); min-width:225px;" value='Resetar senha do usuário'>
                        </form>
                </td>
                @endforeach
        </table>
    </div>
    <div class="container">
        <button class="btn btn-default"><a href='{{action('CredenciadaController@create')}}'><b>Adicionar uma nova credenciada</b></a></button>
    </div>
@endsection