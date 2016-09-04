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
            $table->integer('author_id')->index()->nullable();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('economic_activities_id')->nullable();
            $table->string('investor_name', 100)->nullable();
            $table->text('investor_contacts')->nullable();
            $table->text('stage_project')->nullable();
            $table->text('region')->nullable();
            $table->integer('investor_cost')->nullable();
            $table->integer('duration_project')->nullable();
            $table->integer('term_refund')->nullable();
            $table->text('plan_rent')->nullable();
            $table->text('other')->nullable();
            $table->string('logo',100)->nullable();
            $table->boolean('status')->default(false);
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
