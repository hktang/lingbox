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
        factory(App\Definition::class, 200)
          ->create();
    }
}
