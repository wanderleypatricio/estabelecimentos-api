<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name'          => 'Fulano',
            'rua'           => 'Nome da rua',
            'bairro'        => 'bairro onde mora',
            'complemento'   => 'tipo de moradia',
            'telefone'      => 'seu telefone',
            'email'         => 'adm@gmail.com',
            'password'      => bcrypt('adm123'),
        ]);
    }
}
