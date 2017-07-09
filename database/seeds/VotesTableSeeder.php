<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {

        factory(App\Vote::class, 500)
          ->create([
            'votable_type' => 'App\Entry',
        ]);

        DB::table('votes')->insert(array([
            'user_id' => 11,
            'votable_id' => 1,
            'votable_type' => 'App\Entry',
            'ip_address'  => '192.168.1.1',
            'value'  => 1
        ],[
            'user_id' => 11,
            'votable_id' => 2,
            'votable_type' => 'App\Entry',
            'ip_address'  => '192.168.1.1',
            'value'  => 1
        ]));    
    }

}
