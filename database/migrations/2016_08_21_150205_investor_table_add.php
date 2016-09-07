<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvestorTableAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investor_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('economic_activities_id')->index();
            $table->integer('country_id')->index();
            $table->integer('city_id')->index()->nullable();
            $table->integer('stage_id')->index();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('money_count');
            $table->integer('duration_project')->nullable();
            $table->integer('term_refund')->nullable();
            $table->integer('plan_rent')->nullable();
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
        Schema::drop('investor_forms');
    }
}
