<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnderecoCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('enderecocliente', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->string('cep',12 );
            $table->string('uf',2);
            $table->string('municipio', 100);
            $table->string('numero', 11)->nullable();;
            $table->string('bairro', 100);
            $table->string('complemento', 100)->nullable();;
            $table->string('endereco', 100);
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
        Schema::dropIfExists('enderecocliente');
    }
}
