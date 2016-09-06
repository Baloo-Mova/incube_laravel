<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenameStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('designer_forms', function ($table) {
            $table->renameColumn('status', 'status_id');
            $table->integer('status_id')->unsigned()->default(1)->change();
        });
        Schema::table('investor_forms', function ($table) {
            $table->renameColumn('status', 'status_id');
            $table->integer('status_id')->unsigned()->default(1)->change();
        });
        Schema::table('customer_forms', function ($table) {
            $table->renameColumn('status', 'status_id');
            $table->integer('status_id')->unsigned()->default(1)->change();
        });
        Schema::table('executor_forms', function ($table) {
            $table->renameColumn('status', 'status_id');
            $table->integer('status_id')->unsigned()->default(1)->change();
        });
        Schema::table('employer_forms', function ($table) {
            $table->renameColumn('status', 'status_id');
            $table->integer('status_id')->unsigned()->default(1)->change();
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
