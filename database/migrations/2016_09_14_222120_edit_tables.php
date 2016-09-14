<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_form', function (Blueprint $table){
            $table->dropForeign('fk_stage_id_stages_forms');
            $table->foreign('stage_id', 'fk_stage_id_stages_forms')->references('id')->on('stages');
            $table->integer('economic_activities_id')->unsigned()->nullable()->change();
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
