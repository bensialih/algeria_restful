<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsWilayaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communes', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->foreign('wilaya_id')->references('id')->on('wilayas');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('communes', function(Blueprint $table){
        //     $table->dropForeign('wilayas_wilaya_id_foreign');
        // });
    }
}
