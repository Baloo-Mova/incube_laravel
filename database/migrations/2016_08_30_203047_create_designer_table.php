<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateDesignerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->index()->nullable();
            $table->integer('publisher_id')->index()->nullable();
            $table->integer('economic_activities_id')->nullable();
            
            $table->string('project_name', 255)->nullable();
            $table->text('project_manager')->nullable();
            $table->text('project_contacts')->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('web_site', 100)->nullable();
            $table->text('project_goal')->nullable();
            $table->text('project_aspects')->nullable();
            $table->text('project_beneficaries')->nullable();
            $table->text('description')->nullable();
            $table->integer('project_cost')->nullable();
            $table->string('project_duration', 100)->nullable();
            $table->text('region')->nullable();
            $table->text('project_stage')->nullable();
            $table->text('available_funding')->nullable();
            $table->text('other')->nullable();
            $table->string('logo',100)->nullable();
            $table->string('project_files',100)->nullable();
            $table->boolean('status')->default(false);
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
        Schema::drop('designer_forms');
    }
}


