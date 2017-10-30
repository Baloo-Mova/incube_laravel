<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index()->unsigned();
            $table->integer('publisher_id')->index()->nullable()->unsigned();
            $table->integer('category_id')->index()->nullable()->unsigned();
            $table->integer('status_id')->default(1)->unsigned()->index()->nullable();
            $table->string('name', 400)->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('link')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
       Schema::drop('articles');
    }

}
