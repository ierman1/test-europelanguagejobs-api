<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var Factory $factory */

use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Models\Breed::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Models\Dog::class, function (Faker\Generator $faker) {
    return [
        'breed_id' => $faker->numberBetween(1, 5),
        'name' => $faker->name,
        'hair_color' => $faker->colorName,
        'size' => array('small', 'medium', 'large')[$faker->numberBetween(0, 2)],
        'file_path' => '/storage/pictures/default.jpg'
    ];
});