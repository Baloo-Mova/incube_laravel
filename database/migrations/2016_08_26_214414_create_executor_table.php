<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateExecutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('executor_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index()->nullable();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('status_id')->default(1)->index();
            $table->string('executor_fname', 100)->nullable();
            $table->string('executor_sname', 100)->nullable();
            $table->string('executor_thname', 100)->nullable();
            $table->date('date_birth');
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->text('internship')->nullable();
            $table->text('participation_projects')->nullable();
            $table->text('description')->nullable();
            $table->text('adress')->nullable();
            $table->string('phone', 100)->nullable();
            $table->text('contacts')->nullable();
            $table->text('other')->nullable();
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
        Schema::drop('executor_forms');
    }
}
