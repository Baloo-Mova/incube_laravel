<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_form',function(Blueprint $table){
            $table->foreign('author_id', 'fk_author_id_user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('publisher_id', 'fk_publisher_id_user_id')->references('id')->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign('form_type_id', 'fk_form_type_id_table_types')->references('id')->on('table_types');
            $table->foreign('status_id', 'fk_form_statuses_rel')->references('id')->on('statuses');
            $table->foreign('economic_activities_id', 'economic_activities_fk_user_form')->references('id')->on('economic_activities');
            $table->foreign('country_id', 'fk_country_id_countries_forms')->references('id')->on('countries');
            $table->foreign('city_id', 'fk_city_id_cities_forms')->references('id')->on('cities');
            $table->foreign('stage_id', 'fk_stage_id_stages_forms')->references('id')->on('cities');
        });

        Schema::table('documents', function(Blueprint $table){
            $table->foreign('form_id', 'document_form_id_foreign_key')->references('id')->on('user_form')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        Schema::table('proposal_forms', function(Blueprint $table){
            $table->foreign('sender_table_id')->references('id')->on('user_form');
            $table->foreign('receiver_table_id')->references('id')->on('user_form');
        });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('country_id','fk_user_country_id_countries_relation')->references('id')->on('countries');
        });

        Schema::table('economic_activities', function(Blueprint $table){
            $table->foreign('parent_id')->references('id')->on('economic_activities');
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
            $table->dropForeign('fk_author_id_user_id');
            $table->dropForeign('fk_publisher_id_user_id');
            $table->dropForeign('fk_form_type_id_table_types');
            $table->dropForeign('fk_form_statuses_rel');
            $table->dropForeign('economic_activities_fk_user_form');
            $table->dropForeign('fk_country_id_countries_forms');
            $table->dropForeign('fk_city_id_cities_forms');
            $table->dropForeign('fk_stage_id_stages_forms');
        });

        Schema::table('documents', function(Blueprint $table){
            $table->dropForeign('document_form_id_foreign_key');
        });

        Schema::table('proposal_forms', function(Blueprint $table){
            $table->dropForeign('proposal_forms_sender_table_id_foreign');
            $table->dropForeign('proposal_forms_receiver_table_id_foreign');
        });

        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('fk_user_country_id_countries_relation');
        });
    }
}
