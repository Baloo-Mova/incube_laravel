<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColUserform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   
         public function up()
    {
        Schema::table('user_form', function (Blueprint $table){
            $table->integer('country_id')->unsigned()->nullable()->change();
            $table->integer('city_id')->unsigned()->nullable()->change();
            $table->integer('stage_id')->unsigned()->nullable()->change();
        });

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
