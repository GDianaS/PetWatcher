@extends('layout')
@section('title', 'adicionar animal')
@section('content')

<form action='{{action('AnimalController@store')}}' method='post'>
    @csrf

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
            <option value=''>Escolha o tipo de aquisição</option>
            <option value='Criação Comercial '>Criação Comercial </option>
            <option value='Adoção'>Adoção</option>
            <option value='De Companhia'>De Companhia</option>
            <option value='Proteção Animal'>Proteção Animal</option>
        </select>
    </div>

    <div>
        <label>CPF ou CNPJ do proprietário</label>
        <input value='02473391211' type='text' name='cpf_ou_cnpj' placeholder='Insira com ou sem a pontuação'>
    </div>
    <div>
        <label>Nome do animal</label>
        <input value='bilu' type='text' name='nome' placeholder='Nome do seu pet!'>
    </div>
    <div>
        <label>Microchip</label>
        <input value='06091999' type='text' name='codigo_microchip' placeholder='Microchip'>
    </div>

    <div>
        <label>Especie</label>
        <select name='especie'>
            <option value=''>Escolha a espécie do animal</option>

            @foreach($especies->all() as $especie)

            <option value={{$especie->nome}}>{{$especie->nome}}</option>
            @endforeach
        </select>
    </div>

    <div><label>data nascimento</label>
        <input type='date' name='data_nascimento'>
    </div>

    <div>
        <label>Fase</label>
        <select name='fase'>
            <option value=''>Escolha a fase do animal</option>
            <option value='filhote'>Filhote</option>
            <option value='adulto'>Adulto</option>
        </select>
    </div>

    <div>
        <label>Porte</label>
        <select name='porte'>
            <option value=''>Escolha o porte</option>
            <option value='pequeno'>Pequeno</option>
            <option value='medio'>Médio</option>
            <option value='grande'>Grande</option>
        </select>
    </div>

    <div>
        <label>Gênero</label>
        <select name='genero'>
            <option value=''>Escolha o gênero</option>
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
        <input type='submit' value='adicionar proprietário'>
    </div>
</form>
@stop