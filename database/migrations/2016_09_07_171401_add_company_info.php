<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\Schema::table('work_form',function(Blueprint $table){
            $table->string('company_name');
            $table->text('company_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\Schema::table('work_form',function(Blueprint $table){
            $table->dropColumn('company_name');
            $table->dropColumn('company_info');
        });
    }
}
