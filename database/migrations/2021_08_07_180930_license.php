<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class License extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_de_licenciamento');
            $table->date('data_vencimento');
            $table->boolean('isRevogada');
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
        Schema::dropIfExists('licenses');
    }
}
