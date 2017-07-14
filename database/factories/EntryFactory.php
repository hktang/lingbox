<?php

namespace App;

use Faker\Factory as Faker;
use Pinyin;

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

$faker  = Faker::create('zh_CN');

$factory->define(Entry::class, function () use ($faker) {

    $text = $faker->city . $faker->country;

    return [
    	'text'    => $text,
      'pinyin'  => Pinyin::abbr($text),
    ];
});
