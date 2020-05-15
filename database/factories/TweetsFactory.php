<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweets;
use Faker\Generator as Faker;

$factory->define(Tweets::class, function (Faker $faker) {

	// $title = $faker->sentence;
 //    $slug = Str::slug($title);
    return [
        'content' => $faker->text(300),
        'user_id' => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18))
    ];
});
