<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelArciclesToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('articles',function(Blueprint $table){
            $table->foreign('author_id', 'fk_category_author_id_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('publisher_id', 'fk_category_publisher_id_user_id')->references('id')->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign('category_id', 'fk_category_id_categories')->references('id')->on('categories');
            $table->foreign('status_id', 'fk_category_statuses_rel')->references('id')->on('statuses');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::table('user_form', function(Blueprint $table){
            $table->dropForeign('fk_category_author_id_user_id');
            $table->dropForeign('fk_category_publisher_id_user_id');
            $table->dropForeign('fk_category_id_categories');
            $table->dropForeign('fk_category_statuses_rel');
         
        });

    }
}
