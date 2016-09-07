<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       \Illuminate\Support\Facades\Schema::create('table_types', function ($table){
            $table->increments('id');
           $table->string('name');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       \Illuminate\Support\Facades\Schema::drop('table_types');
    }
}
