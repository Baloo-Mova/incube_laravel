<?php
use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrNew([
            'name'=>'admin',
            'email' => 'admin@incube.zp.ua',
            'password'=> bcrypt('admin'),
            'user_type_id'=>1,
        ])->save();
    }
}
