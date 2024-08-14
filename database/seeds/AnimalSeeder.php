<?php

use App\Animal;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animal::create([
            'nome' => 'animal1',
            'cpf_ou_cnpj_proprietario' => '02473391211',
            'dataNascimento' => '2024-08-15',
            'data_cadastro' => '2024-08-15',
            'sexo' => 'masculino',
            'fase' => 'filhote',
            'porte' => 'grande',
            'codigo_microchip' => '123',
            'especie' => 'especie1',
            'hasPedigree' => false,
            'isCadastroAtivo' => true,
            'tipo' => 'Adoção',
            'motivoDesativacao' => '',
            'id_credenciada' => 1,
        ]);
    }
}
