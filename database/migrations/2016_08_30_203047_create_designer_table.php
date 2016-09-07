<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDesignerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_form', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('economic_activities_id')->index();
            $table->integer('country_id')->index();
            $table->integer('city_id')->index()->nullable();
            $table->integer('stage_id')->index();
            
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();

            $table->string('web_site', 100)->nullable();
            $table->string('youtube_link', 100)->nullable();

            $table->text('idea')->nullable();
            $table->text('current_situation')->nullable();
            $table->text('field')->nullable();
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('competition');
            $table->text('benefits');
            $table->text('buisness_model');
            $table->text('money_target');
            $table->text('investor_interest');
            $table->text('risks');
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
        Schema::drop('project_form');
    }
}


