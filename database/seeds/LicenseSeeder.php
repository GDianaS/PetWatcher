<?php

use Illuminate\Database\Seeder;
use \App\License;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        License::create([
            'id_credenciada' => '1',
            'data_de_licenciamento' => '2021-08-12',
            'data_vencimento' => '2024-08-15',
            'isRevogada' => False,
        ]);
    }
}
