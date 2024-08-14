<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('CPF');
            $table -> string('nome');
            $table -> string('endereco');
            $table -> string('telefone');
            $table -> string('email');
            $table->boolean('isActive');
            $table->timestamps();

            $table->integer('id_credenciada')->unsigned();
            $table->foreign('id_credenciada')->references('id')->on('credenciadas')->onDelete('cascade');
            
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
