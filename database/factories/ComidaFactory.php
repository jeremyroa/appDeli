<?php

use Faker\Generator as Faker;

$factory->define(App\Comida::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    return [
        'name' => $faker->unique()->foodName(),
        'price' => $faker->randomNumber(2),
        'category' => $faker->meatName(),
    ];
});
