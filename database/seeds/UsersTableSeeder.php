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
        factory(App\User::class, 10)
          ->create()
          ->each(function ($u) {
              for ($i = 1; $i <= rand ( 1 , 3 ); $i++) {
                $u->entries()
                  ->save( factory(App\Entry::class)->make());
              }
          });

        DB::table('users')->insert([
            'name' => 'hktang',
            'email' => "1@1.com",
            'password' => Hash::make('letmeout'),
        ]);
    }
}
