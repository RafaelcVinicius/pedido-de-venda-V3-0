<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('uf')->insert([
            ['id' =>'11','uf' => 'RO','nome' => 'RONDÔNIA'],
            ['id' =>'12','uf' => 'AC','nome' => 'ACRE'],
            ['id' =>'13','uf' => 'AM','nome' => 'AMAZONAS'],
            ['id' =>'14','uf' => 'RR','nome' => 'RORAIMA'],
            ['id' =>'15','uf' => 'PA','nome' => 'PARÁ'],
            ['id' =>'16','uf' => 'AP','nome' => 'AMAPÁ'],
            ['id' =>'17','uf' => 'TO','nome' => 'TOCANTINS'],
            ['id' =>'21','uf' => 'MA','nome' => 'MARANHÃO'],
            ['id' =>'22','uf' => 'PI','nome' => 'PIAUÍ'],
            ['id' =>'23','uf' => 'CE','nome' => 'CEARÁ'],
            ['id' =>'24','uf' => 'RN','nome' => 'RIO GRANDE DO NORTE'],
            ['id' =>'25','uf' => 'PB','nome' => 'PARAÍBA'],
            ['id' =>'26','uf' => 'PE','nome' => 'PERNAMBUCO'],
            ['id' =>'27','uf' => 'AL','nome' => 'ALAGOAS'],
            ['id' =>'28','uf' => 'SE','nome' => 'SERGIPE'],
            ['id' =>'29','uf' => 'BA','nome' => 'BAHIA'],
            ['id' =>'31','uf' => 'MG','nome' => 'MINAS GERAIS'],
            ['id' =>'32','uf' => 'ES','nome' => 'ESPÍRITO SANTO'],
            ['id' =>'33','uf' => 'RJ','nome' => 'RIO DE JANEIRO'],
            ['id' =>'35','uf' => 'SP','nome' => 'SÃO PAULO'],
            ['id' =>'41','uf' => 'PR','nome' => 'PARANÁ'],
            ['id' =>'42','uf' => 'SC','nome' => 'SANTA CATARINA'],
            ['id' =>'43','uf' => 'RS','nome' => 'RIO GRANDE DO SUL'],
            ['id' =>'50','uf' => 'MS','nome' => 'MATO GROSSO DO SUL'],
            ['id' =>'51','uf' => 'MT','nome' => 'MATO GROSSO'],
            ['id' =>'52','uf' => 'GO','nome' => 'GOIÁS'],
            ['id' =>'53','uf' => 'DF','nome' => 'DISTRITO FEDERAL'],
        ]);
        Schema::enableForeignKeyConstraints();

    }
}