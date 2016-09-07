<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminUserSeeder::class);
        $this->call(EconomicActivitiesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call('StatusesTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('StagesTableSeeder');
        $this->call('TableTypesTableSeeder');
    }
}
