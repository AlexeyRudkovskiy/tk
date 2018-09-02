<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'slug' => $faker->slug,
        'content_schema' => [],
        'content' => $faker->realText(),
        'author_id' => 1
    ];
});
