<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBusinessmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('employer_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index()->nullable();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('economic_activities_id')->nullable();
            $table->string('short_name', 100)->nullable();
            $table->string('org_name', 255)->nullable();
            $table->text('org_info')->nullable();
            $table->string('org_type',255)->nullable();
            $table->text('description')->nullable();
            $table->string('web_site',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->text('adress')->nullable();
            $table->text('other')->nullable();
           
            $table->string('logo',100)->nullable();
            $table->boolean('status')->default(0);
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
        Schema::drop('employer_forms');
    }
}
