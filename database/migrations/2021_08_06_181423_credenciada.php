<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Credenciada extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credenciadas', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('CNPJ')->unique();
            $table -> string('Inscriçao_Estadual');
            $table -> string('Razao_Social');
            $table -> string('endereço');
            $table -> string('telefone');
            $table -> string('email');
            $table -> string('situacao');

            $table->timestamps();

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
        Schema::dropIfExists('credenciadas');
    }
}
