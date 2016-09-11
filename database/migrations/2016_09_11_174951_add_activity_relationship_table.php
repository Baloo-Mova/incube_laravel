<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_relationship', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_table_type');
            $table->integer('sender_table_id');
            $table->integer('receiver_table_type_id');
            $table->integer('receiver_table_id');
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
