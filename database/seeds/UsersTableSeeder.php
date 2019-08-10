<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'pin' => Hash::make('2255'),
        ]);

        factory(User::class)->create([
            'email' => 'webmaster@haqqman.com',
            'password' => Hash::make('@techb0mb89*'),
            'pin' => Hash::make('134381'),
        ]);
    }
}
