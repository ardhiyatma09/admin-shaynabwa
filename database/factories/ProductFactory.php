<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'type' => $faker->sentence(2),
        'slug' => $faker->sentence(1) . '-' . $faker->sentence(1),
        'price' => rand(10,50),
        'quantity' => rand(10,20),
        'description' => $faker->sentence(50)
    ];
});
