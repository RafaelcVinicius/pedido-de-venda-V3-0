<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Itempedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itempedido', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pedido');
            $table->integer('id_produto')->references('id')->on('produtos');
            $table->decimal('valor',15,2);
            $table->decimal('qtde', 15,2);
            $table->decimal('percacrescimo', 15,2)->default(0.00);
            $table->decimal('percdesconto', 15,2)->default(0.00);
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
        Schema::dropIfExists('itempedido');
    }
}
