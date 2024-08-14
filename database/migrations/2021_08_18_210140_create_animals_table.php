<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cpf_ou_cnpj_proprietario');
            $table->date('dataNascimento');
            $table->string('sexo');
            $table->string('fase');
            $table->string('porte');
            $table->boolean('hasPedigree');
            $table->string('origem_pedigree')->nullable();
            $table->string('codigo_pedigree')->nullable();
            $table->string('codigo_microchip');
            $table->string('especie');
            $table->string('tipo');
            $table->date('data_cadastro');
            $table->boolean('isCadastroAtivo');
            $table->string('motivoDesativacao');
            $table->string('telefone_credenciada')->nullable();

            $table->timestamps();
            
            $table->integer('id_credenciada')->unsigned();
            $table->foreign('id_credenciada')->references('id')->on('credenciadas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
