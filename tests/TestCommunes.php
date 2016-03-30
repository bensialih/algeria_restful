<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Wilaya;
use App\Models\Commune;

class TestCommunes extends TestCase
{
    /**
     * tests Aflou is in Laghout
     *
     * @return void
     */
    public function testAflouBelongsToLaghouat()
    {
        $this->assertTrue( Commune::where('nom' , 'LIKE', 'Aflou')->first()->wilaya->nom == 'Laghouat' , 'Aflou doesnt belong to Laghout' );
    }

    /**
     * tests that Ghardaia has the right number of Communes
     * & Hassi Fehal is in Ghardaia
     *
     * @return void
     */
    public function testGhardaiaHasRightWilayat()
    {
        $wilaya_47 = ['Ghardaia', 'El Meniaa','Dhayet Bendhahoua','Berriane','Metlili','El Guerrara','El Atteuf',
        'Zelfana', 'Sebseb','Bounoura','Hassi Fehal','Hassi Gara','Mansoura'];
        $communes = Wilaya::where('nom' , 'LIKE', 'Ghardaïa' )->first()->communes();

        $this->assertTrue( count($communes->pluck('id')) == count($wilaya_47) , 'Ghardaïa doesnt have the right number of Communes' );
        $this->assertContains('Hassi Fehal' , $communes->pluck('nom')->all() , 'Ghardaïa doesnt seem to have a Commune called Hassi Fehal!');
    }

    
}