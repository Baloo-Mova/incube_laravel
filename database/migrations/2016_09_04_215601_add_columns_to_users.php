<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('logo')->after('remember_token');
            $table->string('bg_logo')->after('remember_token');
            $table->integer('country_id')->after('remember_token')->index()->nullable()->unsigned();
            $table->string('web_site')->after('country_id')->nullable();
            $table->text('contacts')->after('country_id')->nullable();
            $table->string('phone_number')->after('country_id')->nullable();
            $table->text('adress')->after('country_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
