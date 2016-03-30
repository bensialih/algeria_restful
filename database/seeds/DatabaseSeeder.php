<?php

use Illuminate\Database\Seeder;
//use app\database\migrations\seeds\CommuneSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('CommuneSeeder');
    }
}
