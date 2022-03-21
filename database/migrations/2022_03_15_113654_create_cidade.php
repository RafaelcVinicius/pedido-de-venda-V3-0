<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidade', function (Blueprint $table) {
            $table->id();
            $table->string('codigoibge', 7);
            $table->string('nome', 100);         
            $table->string('latitude', 100);         
            $table->string('longitude', 100);         
            $table->tinyInteger('capital');
            $table->integer('id_uf');
            $table->integer('mesoregiao');
            $table->foreign('id', 'fk_cidade_uf')->references('id')->on('uf');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidade');
    }
}