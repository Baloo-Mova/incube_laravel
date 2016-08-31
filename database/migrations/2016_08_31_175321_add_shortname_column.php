<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddShortnameColumn extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        Schema::table('designer_forms', function ($table) {
            $table->string('short_name')->after('economic_activities_id');
        });
        Schema::table('investor_forms', function ($table) {
            $table->string('short_name')->after('economic_activities_id');
        });
        Schema::table('customer_forms', function ($table) {
            $table->string('short_name')->after('economic_activities_id');
        });
        Schema::table('executor_forms', function ($table) {
            $table->string('short_name')->after('publisher_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
