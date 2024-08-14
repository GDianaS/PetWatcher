<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCadastros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('id_especie');
            $table->date('data_cadastro');
            $table->boolean('isCadastroAtivo');
            $table->string('motivoDesativacao');
            
            $table->timestamps();

            $table->integer('id_proprietario')->unsigned();
            $table->foreign('id_proprietario')->references('id')->on('proprietarios')->onDelete('cascade');

            $table->integer('id_microchip')->unsigned();
            $table->foreign('id_microchip')->references('id')->on('microchips')->onDelete('cascade');

            $table->integer('id_credenciada')->unsigned();
            $table->foreign('id_credenciada')->references('id')->on('credenciadas')->onDelete('cascade');

            $table->integer('id_pedigree')->unsigned();
            $table->foreign('id_pedigree')->references('id')->on('pedigrees')->onDelete('cascade');

            $table->integer('id_animal')->unsigned();
            $table->foreign('id_animal')->references('id')->on('animals')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_cadastros');
    }
}



