<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string('nome', 80);
            $table->string('telefone', 20);
            $table->string('email', 100);
            $table->string('rua', 50);
            $table->string('bairro', 30);
            $table->string('cidade',50);
            $table->string('uf', 2);
            $table->string('cep', 9);
            $table->string('longitude');
            $table->string('latitude');
            $table->string('imagem', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estabelecimentos');
    }
}
