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
        Schema::create('work_form', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('country_id')->index();
            $table->integer('city_id')->index()->nullable();
            $table->integer('economic_activities_id')->index();

            $table->string('name', 100)->nullable();
            $table->integer('money')->nullable();
            $table->string('phone')->nullable();
            $table->string('request_email')->nullable();
            $table->string('site')->nullable();
            $table->text('about')->nullable();
            $table->text('requirements')->nullable();
            $table->text('working_conditions')->nullable();
            $table->text('duties')->nullable();
            $table->text('ect')->nullable();

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
        Schema::drop('work_form');
    }
}
