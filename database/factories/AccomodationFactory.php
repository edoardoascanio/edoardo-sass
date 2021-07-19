<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Accomodation;
use Faker\Generator as Faker;

$factory->define(Accomodation::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence(5),
        'description'=> $faker->paragraph(3),
        'number_rooms'=> $faker->randomDigitNotNull(),
        'number_bathrooms'=> $faker->numberBetween(1, 4),
        'number_beds'=> $faker->numberBetween(1, 9),
        'square_mts'=> $faker->numberBetween(30, 1000),
        // 'number_views'=> $faker->numberBetween(0, 5),
        'price_per_night'=> $faker->numberBetween(20, 300),
        'user_id'=>$faker->numberBetween(1, 5),
        'accomodation_id' => $faker->unique()->numberBetween(1,8),
        'city' =>$faker->city(),
        'address' => $faker->streetName(),
        'number' => $faker->numberBetween(1, 1000),
        'zip' =>$faker->postcode(),
        'lat' => $faker->latitude(-90, 90),
        'long' => $faker->longitude(-180, 180)
    ];
});
