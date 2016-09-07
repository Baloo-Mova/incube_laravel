<?php

use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stages')->truncate();
        
        \DB::table('stages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Є ідея або напрацювання',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Готовий прототип або продукт',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Існуючий бізнес',
            ),
        ));
        
        
    }
}
