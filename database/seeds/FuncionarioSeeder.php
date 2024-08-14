<?php

use App\Funcionario;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'CPF' => '02473391211',
            'email' => 'funcionarioCredenciada@gmail.com',
            'telefone' => '93992274474',
            'nome' => 'luis',
            'endereco' => 'luis',
            'isActive' => True,
            'id_credenciada' => 1,
            'id_usuario' => 4
        ]);
    }
}
