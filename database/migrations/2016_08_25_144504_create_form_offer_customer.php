<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormOfferCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('customer_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index()->nullable();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('economic_activities_id')->nullable();
            $table->string('problem_name', 100)->nullable();
            $table->text('problem_description')->nullable();
            $table->text('region')->nullable();
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
        Schema::drop('customer_forms');
    }
}
