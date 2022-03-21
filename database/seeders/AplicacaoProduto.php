<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AplicacaoProduto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('aplicacaoproduto')->insert([
            ['id' =>'1', 'nome' => 'MERCADORIA PARA REVENDA'],
            ['id' =>'2', 'nome' => 'SERVIÇO'],
            
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
