<?php

use Illuminate\Database\Seeder;

class TableTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('table_types')->delete();
        
        \DB::table('table_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Investor',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Problem',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Designer',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Employer',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Executor',
            ),
        ));
        
        
    }
}
