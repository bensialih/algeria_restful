<?php

use Illuminate\Database\Seeder;

use App\Helpers\Data\Commune as CommuneData;
use App\Helpers\Data\Wilaya as WilayaData;

use App\Models\Commune;
use App\Models\Wilaya;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communes = new CommuneData();
        $wilayas = new WilayaData();

        foreach($wilayas->wilayas as $wilaya) {
            Wilaya::create($wilaya);
        }

        foreach($communes->communes as $commune) {
            Commune::create($commune);
        }
    }
}
