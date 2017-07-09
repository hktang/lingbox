<?php

use Illuminate\Database\Seeder;

class DefinitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Definition::class, 50)
          ->create()
          ->each(function ($d) {
            for ($i = 1; $i <= rand ( 1 , 50 ); $i++) {
              $d->votes()
                ->save( factory(App\Vote::class)
                ->make([
                    'votable_id' => $d->id,
                    'votable_type' => 'App\Definition',
                  ]));
            }
          });
    }
}
