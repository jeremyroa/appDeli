<?php

use Faker\Generator as Faker;

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'dni' => $faker->unique()->randomNumber(8),
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'question' => $faker->sentence(3),
        'answer' => $faker->sentence(2),
        'remember_token' => Str::random(10),
    ];
});
