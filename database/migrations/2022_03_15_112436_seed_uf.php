<?php

use Illuminate\Database\Migrations\Migration;
use Symfony\Component\Console\Output\ConsoleOutput;
use Database\Seeders\UFSeeder;

class SeedUf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $seeder = new UFSeeder;
      $seeder->run();
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      $output = new ConsoleOutput;
      $output->writeln('<info>nothing to do</info>');
  }
}