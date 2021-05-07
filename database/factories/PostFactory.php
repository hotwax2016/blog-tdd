<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text(),
        'image_url' => UploadedFile::fake()->image('photo1.jpg')
    ];
});
