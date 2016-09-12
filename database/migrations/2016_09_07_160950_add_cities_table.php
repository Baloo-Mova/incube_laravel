<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::create('cities', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->unsigned()->nullable()->index();
            $table->foreign('country_id','fk_country_cities')->references('id')->on('countries')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function(Blueprint $table){
            $table->dropForeign('fk_country_cities');
        });
        \Illuminate\Support\Facades\Schema::drop('cities');
    }
}
