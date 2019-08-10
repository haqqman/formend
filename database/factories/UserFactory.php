<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'username' => $faker->userName,
        'password' => '$2y$10$QVP.uR2kEtrTL13i6lpIBOB5Sl4kVuReXj1SlLcS3tDjClQPn82hm', // secret
        'pin' => $faker->numberBetween(1000, 30000),
        'remember_token' => Str::random(10),
    ];
});
