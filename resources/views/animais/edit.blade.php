@extends('layout')
@section('title', 'Editar dados de ' . $animal->nome)
@section('content')

<form action='{{action('AnimalController@update', $animal->id)}}' method='post'>
    @csrf
    {{method_field('put')}}
    <!-- Informa os erros de validação do campo nome -->
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $erro)
        <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <div>
        <label>Tipo de Aquisição</label>
        <select name='tipo_aquisicao'>
            <option value='{{$animal->tipo}}'>{{$animal->tipo}}(atual)</option>
            <option value='Criação Comercial '>Criação Comercial </option>
            <option value='Adoção'>Adoção</option>
            <option value='De Companhia'>De Companhia</option>
            <option value='Proteção Animal'>Proteção Animal</option>
        </select>
    </div>

    <div>
        <label>CPF ou CNPJ do proprietário</label>
        <input value='{{$animal->cpf_ou_cnpj_proprietario}}' type='text' name='cpf_ou_cnpj' placeholder='Insira com ou sem a pontuação'>
    </div>

    <div>
        <label>Nome do animal</label>
        <input value='{{$animal->nome}}' type='text' name='nome' placeholder='Nome do seu pet!'>
    </div>

    <div>
        <label>Especie</label>
        <select name='especie'>
            <option value='{{$animal->especie}}'>{{$animal->especie}}(Atual)</option>

            @foreach($especies->all() as $especie)

            <option value={{$especie->nome}}>{{$especie->nome}}</option>
            @endforeach
        </select>
    </div>

    <div><label>data nascimento</label>
    
        <input value="{{$animal->dataNascimento}}" type='date' name='data_nascimento'>
    </div>

    <div>
        <label>Fase</label>
        <select name='fase'>
            <option value='{{$animal->fase}}'>{{$animal->fase}}(Atual)</option>
            <option value='filhote'>Filhote</option>
            <option value='adulto'>Adulto</option>
        </select>
    </div>

    <div>
        <label>Porte</label>
        <select name='porte'>
            <option value='{{$animal->porte}}'>{{$animal->porte}}(Atual)</option>
            <option value='pequeno'>Pequeno</option>
            <option value='medio'>Médio</option>
            <option value='grande'>Grande</option>
        </select>
    </div>

    <div>
        <label>Gênero</label>
        <select name='genero'>
            <option value='{{$animal->sexo}}'>{{$animal->sexo}}(Atual)</option>
            <option value='masculino'>Masculino</option>
            <option value='feminino'>Feminino</option>
        </select>
    </div>

    <fieldset>
    <legend>Possui pedigree?</legend>
    <div class="form-check form-switch">
        <input class="form-check-input" name='has_pedigree' type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckChecked">Se possuir, insira também os dados abaixo:</label>
    </div>
    </fieldset>

    <div>
        <label>Pedigree</label>
        <input type='text' name='pedigree' placeholder='opcional'>
    </div>
    <div>
        <label>Origem Pedigree</label>
        <input type='text' name='origem_pedigree' placeholder='opcional'>
    </div>

    <div>
        <input type='submit' value='atualizar cadastro do animal'>
    </div>
</form>
@stop