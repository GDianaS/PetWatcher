<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Enoque Alves',
            'email' => 'enoque@gmail.com',
            'password' => bcrypt('123456'),
            'isDivisa' => True,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => False,
        ]);
        User::create([
            'name' => 'Enoque Alves 2',
            'email' => 'enoqadfue2@gmail.com',
            'password' => bcrypt('123456'),
            'isDivisa' => False,
            'isCredenciada' => True,
            'isFuncionarioCredenciada' => False,
        ]);

        User::create([
            'name' => 'Luis Gomes',
            'email' => 'luisgomesbcc@gmail.com',
            'password' => bcrypt('12345'),
            'isDivisa' => True,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => False,
        ]);
        User::create([
            'name' => 'Luis Gomes',
            'email' => 'funcionarioCredenciada@gmail.com',
            'password' => bcrypt('12345'),
            'isDivisa' => False,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => True,
        ]);
        User::create([
            'name' => 'Gabi Sena',
            'email' => 'gabisena@gmail.com',
            'password' => bcrypt('12345'),
            'isDivisa' => True,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => False,
        ]);

        User::create([
            'name' => 'Diana Sousa',
            'email' => 'diana@gmail.com',
            'password' => bcrypt('12345'),
            'isDivisa' => False,
            'isCredenciada' => False,
            'isFuncionarioCredenciada' => True,
        ]);

    }
}
