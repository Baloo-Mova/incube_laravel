<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalContactsToForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('investor_forms', function (Blueprint $table){
           $table->string('duration_project')->change();
            $table->string('term_refund')->change();
            $table->string('plan_rent')->change();
            $table->text('contacts');
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
