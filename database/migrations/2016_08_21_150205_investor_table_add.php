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
            $table->integer('author_id')->index()->unsigned();
            $table->integer('publisher_id')->index()->nullable()->unsigned();
            $table->integer('status_id')->default(1)->unsigned();
            $table->integer('economic_activities_id')->index()->unsigned();
            $table->integer('country_id')->index()->unsigned();
            $table->integer('city_id')->index()->nullable()->unsigned();
            $table->integer('stage_id')->index()->unsigned();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->integer('money_count');
            $table->integer('duration_project')->nullable();
            $table->integer('term_refund')->nullable();
            $table->integer('plan_rent')->nullable();
            $table->timestamps();

            $table->foreign('author_id', )
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
