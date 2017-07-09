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

    $votable_id = ! empty($params['votable_id']) 
                  ? $params['votable_id'] 
                  : $faker->numberBetween(1,50);

    $rand = $faker->numberBetween(1,100);

    if ($rand < 80 ) {
      
      $value = 1;
      
      DB::table('definitions')
        ->where('id', $votable_id )
        ->increment('ups');

    } else {

      $value = -1;

      DB::table('definitions')
        ->where('id', $votable_id )
        ->increment('downs');
    }


    return [
        'ip_address' => $faker->ipv6,
        'votable_id' => $votable_id,
        'votable_type' => $params['votable_type'],
        'value' => $value,
    ];
});
