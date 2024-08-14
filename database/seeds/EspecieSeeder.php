<?php

use App\Especie;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especie::create([
            'nome' => 'especie',
        ]);
    }
}
