<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExclusiveForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_form', function(Blueprint $table){
            //default fields
            $table->increments('id');
            $table->integer('author_id')->index()->unsigned();
            $table->integer('form_type_id')->index()->unsigned()->nullable();
            $table->integer('publisher_id')->index()->nullable()->unsigned();
            $table->integer('status_id')->default(1)->unsigned()->index()->nullable();
            $table->integer('economic_activities_id')->index()->unsigned();
            $table->integer('country_id')->index()->unsigned();
            $table->integer('city_id')->index()->nullable()->unsigned();
            $table->integer('stage_id')->index()->unsigned();

            $table->string('name', 100)->nullable();
            $table->text('description')->nullable();
            //Fields Addided in investor Form
            $table->integer('money')->nullable();
            $table->string('duration_project')->nullable();
            $table->string('term_refund')->nullable();
            $table->string('plan_rent')->nullable();

            $table->string('first_name', 100)->nullable();
            $table->string('second_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->date('date_birth')->nullable();
            $table->text('experience')->nullable();
            $table->text('education')->nullable();
            $table->text('internship')->nullable();
            $table->text('participation_projects')->nullable();
            $table->text('adress')->nullable();
            $table->string('phone', 100)->nullable();

            $table->text('idea')->nullable();
            $table->text('current_situation')->nullable();
            $table->text('field')->nullable();
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('competition')->nullable();
            $table->text('benefits')->nullable();
            $table->text('buisness_model')->nullable();
            $table->text('money_target')->nullable();
            $table->text('investor_interest')->nullable();
            $table->text('risks')->nullable();

            $table->string('request_email')->nullable();
            $table->text('about')->nullable();
            $table->text('requirements')->nullable();
            $table->text('working_conditions')->nullable();
            $table->text('duties')->nullable();
            $table->string('company_name')->nullable();
            $table->text('company_info')->nullable();

            $table->text('other')->nullable();
            $table->text('contacts')->nullable();
            $table->string('site', 100)->nullable();
            $table->string('youtube_link', 100)->nullable();
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
        Schema::drop('user_form');
    }
}
