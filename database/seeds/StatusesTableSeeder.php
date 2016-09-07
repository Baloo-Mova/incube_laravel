<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('statuses')->truncate();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Відредагована',
            ),
            1 => 
            array (
                'id' => 1,
                'name' => 'Нова',
            ),
            2 => 
            array (
                'id' => 2,
                'name' => 'Опублікована',
            ),
            3 => 
            array (
                'id' => 3,
                'name' => 'Потребує редагування',
            ),
        ));
        
        
    }
}
