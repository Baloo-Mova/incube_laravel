<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColOnTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table){
            $table->integer('weight')->default(0);
            $table->integer('to_index')->default(0);
            $table->text('description')->nullable();
        
        });
            
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('accounts_data', function ($table) {
            $table->dropColumn('weight');
            $table->dropColumn('to_index');
            $table->dropColumn('description');
         
         });
    }
}
