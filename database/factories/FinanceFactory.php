<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Finance;

$factory->define(\App\Finance::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(1,20000),
        'comment' => $faker->text(),
        'date' => $faker->date(),
        'category_id'=>$faker->numberBetween(1,4),
        'user_id' => 1,
    ];
});
