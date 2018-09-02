<?php

use Faker\Generator as Faker;

$factory->define(App\File::class, function (Faker $faker) {
    return [
        'original_name' => $faker->sentence(3),
        'type' => $faker->fileExtension,
        'description' => $faker->realText(32),
        'size' => 100,
        'is_public' => true
    ];
});
