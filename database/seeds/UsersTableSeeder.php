<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'ionwarez@gmail.com',
            'pin' => '2255'
        ]);
        
        factory(User::class)->create([
            'email' => 'webmaster@haqqman.com',
            'password' => bcrypt('@techb0mb89*'),
            'pin' => '134381'
        ]);
    }
}
