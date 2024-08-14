<?php

use App\Credenciada;
use Illuminate\Database\Seeder;

class CredenciadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Credenciada::create([
            'id_usuario' => '2',
            'id' => '1',
            'CNPJ' => '1234556789',
            'Inscriçao_Estadual' => 'PA',
            'Razao_Social' => 'Petshop do Mc Poze',
            'telefone' => '707070',
            'email' => 'petshop1@gmail.com',
            'endereço' => 'STAIRWAY TO HEAVEN',
            'situacao' => 'ativo',
        ]);
    }
}
