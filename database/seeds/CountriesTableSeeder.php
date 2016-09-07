<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->truncate();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Росiя',
                'icon' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Україна',
                'icon' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Бiлорусь',
                'icon' => NULL,
            ),
        ));
        
        
    }
}
