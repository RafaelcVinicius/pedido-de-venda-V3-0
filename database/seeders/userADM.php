<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class userADM extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->insert([
            ['id' =>'1','name' => 'Rafael','email' => 'rafael@gmail.com', 'password' => '$2y$10$9/CHQp6yIT4wqXicZYkh4OOMuD79dyAWyio3s6T8F8k1a1r9Vofq2'],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
