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
        Schema::create('proposal_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_table_id')->unsigned()->index();
            $table->integer('receiver_table_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proposal_forms');
    }
}
