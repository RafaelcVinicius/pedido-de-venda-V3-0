<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->integer('id_vendedor');
            $table->string('email', 50)->nullable();
            $table->string('situacao', 20);
            $table->date('previsaoentrega')->nullable();
            $table->decimal('acrescimo', 16,2);
            $table->decimal('desconto', 16,2);
            $table->string('obsPedido',150);
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
        Schema::dropIfExists('pedido');
    }
}
