<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('statuses', function (Blueprint $table){
              $table->increments('id');
              $table->string('name',30)->unique();
          });
        Schema::create('stages', function(Blueprint $table){
            $table->increments('id');
            $table->string('name',100);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statuses');
        Schema::drop('stages');
    }
}
