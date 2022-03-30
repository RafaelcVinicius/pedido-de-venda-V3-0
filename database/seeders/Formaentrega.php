<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Formaentrega extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('formaentrega')->insert([
            ['id' =>'1', 'tipo' => 'NENHUM', 'cobranca' => '0'],
            ['id' =>'2', 'tipo' => 'RETIRAR NO LOCAL', 'cobranca' => '0'],
            ['id' =>'3', 'tipo' => 'CORREIOS', 'cobranca' => '1'],            
            ['id' =>'4', 'tipo' => 'TRANSPORTADORA', 'cobranca' => '1'],            
            ['id' =>'5', 'tipo' => 'MOTOBOY', 'cobranca' => '1'],            
            ['id' =>'6', 'tipo' => 'ENTREGA PELO EMISSOR', 'cobranca' => '1' ],            
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
