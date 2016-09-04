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
        $user = User::firstOrCreate([
            'email' => 'admin@incube.zp.ua',
        ]);
        $user->name = "Администратор";
        $user->password = bcrypt('admin');
        $user->user_type_id = 1;
        $user->save();
    }
}
