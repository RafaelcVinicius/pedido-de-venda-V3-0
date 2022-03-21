<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Especies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('especies')->insert([
            ['id' =>'1', 'nome' => 'DINHEIRO'],
            ['id' =>'2', 'nome' => 'CHEQUE'],
            ['id' =>'3', 'nome' => 'CARTÃO'],
            ['id' =>'4', 'nome' => 'CONVENIO'],
            ['id' =>'5', 'nome' => 'CARNÊ'],
            ['id' =>'6', 'nome' => 'CONVENIO'],
            ['id' =>'7', 'nome' => 'CRÉDITO DO CLIENTE'],
            ['id' =>'8', 'nome' => 'CARTÃO CRÉDITO'],
            ['id' =>'9', 'nome' => 'CARTÃO DÉBITO'],
            
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
