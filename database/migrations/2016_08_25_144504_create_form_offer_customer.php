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
        Schema::create('problem_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('economic_activities_id')->index();
            $table->integer('country_id')->index();
            $table->integer('city_id')->index()->nullable();

            $table->string('name', 100);
            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('documents', function(Blueprint $table){
            $table->increments('id');
            $table->string('filename');
        });

        Schema::create('document_form_relation', function(Blueprint $table){
            $table->increments('id');
            $table->integer('table_type_id');
            $table->integer('table_id');
            $table->integer('documents_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('problem_forms');
        Schema::drop('documents');
        Schema::drop('document_form_relation');
    }
}
