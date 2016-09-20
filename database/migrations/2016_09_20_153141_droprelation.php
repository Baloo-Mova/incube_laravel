<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Droprelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_form', function(Blueprint $table){
            $table->dropForeign('fk_city_id_cities_forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_form', function(Blueprint $table){
            $table->foreign('city_id', 'fk_city_id_cities_forms')->references('id')->on('cities');
        });
    }
}
