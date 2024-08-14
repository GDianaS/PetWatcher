<?php

use App\Proprietario;
use Illuminate\Database\Seeder;

class ProprietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proprietario::create([
            'nome' => 'luis',
            'email' => 'luis@gmail.com',
            'tipo' => 'Pessoa Jurídica',
            'cpf_ou_cnpj' => '02473391211',
            'telefone' => '1231231244123',
            'endereco' => 'rua doida',
        ]);
    }
}
