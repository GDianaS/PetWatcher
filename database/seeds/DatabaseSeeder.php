<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CredenciadaSeeder::class);
        $this->call(LicenseSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(FuncionarioSeeder::class);
        $this->call(ProprietarioSeeder::class);
        $this->call(AnimalSeeder::class);
    }
}
