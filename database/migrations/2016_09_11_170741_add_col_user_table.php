<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddColUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            
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
