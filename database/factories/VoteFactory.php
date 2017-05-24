<?php

use Faker\Factory;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Vote::class, function (Faker\Generator $faker, $params) {
    
    $rand = $faker->numberBetween(1,100);

    if ($rand < 80 ) {
      $vote = 1;
      DB::table('definitions')->where('id', $params['definition_id'])->increment('ups');
    } else {
      $vote = -1;
      DB::table('definitions')->where('id', $params['definition_id'])->increment('downs');
    }
    
    return [
        'ip_address' => $faker->ipv6,
        'vote' => $vote,
    ];
});
