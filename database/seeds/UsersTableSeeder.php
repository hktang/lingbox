<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)
          ->create()
          ->each(function ($u) {
              for ($i = 1; $i <= rand ( 1 , 3 ); $i++) {
                $u->entries()
                  ->save( factory(App\Entry::class)->make());
              }
          });
    }
}
