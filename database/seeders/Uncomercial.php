<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Uncomercial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('uncomercial')->insert([
            ['id' =>'1', 'nome' => 'UN'],
            ['id' =>'2', 'nome' => 'KG'],
            ['id' =>'3', 'nome' => 'LT'],
            ['id' =>'4', 'nome' => 'CX'],
            ['id' =>'5', 'nome' => 'M3'],
            ['id' =>'6', 'nome' => 'M2'],
            ['id' =>'7', 'nome' => 'DZ'],
            ['id' =>'8', 'nome' => 'PÇ'],
            
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
