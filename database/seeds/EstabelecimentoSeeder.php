<?php

use Illuminate\Database\Seeder;
use App\Estabelecimento;
class EstabelecimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estabelecimento::create([
            'id'          => 0,
            'nome'          => '',
            'telefone'      => '',
            'email'         => '',
            'rua'           => '',
            'bairro'        => '',
            'cidade'        => '',
            'uf'            => '',
            'cep'           => '',
            'longitude'     => '',
            'latitude'       => '',
            'imagem'        => '',
        ]);
    }
}
