<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codbarras', 100);
            $table->string('referencia', 100);
            $table->integer('id_aplicacao');
            $table->integer('id_un');
            $table->decimal('precocusto', 16,2);
            $table->decimal('precovenda', 16,2);
            $table->decimal('porclucro', 16,2);
            $table->decimal('qtde', 16,2);
            $table->string('ativo', 5);
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
        Schema::dropIfExists('produtos');
    }
}
