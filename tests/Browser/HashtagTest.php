<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HashtagTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddHashtag()
    {

        $this->browse(function ($browser) {

            $browser->visit('/login')
                    ->type('email', '1@1.com')
                    ->type('password', 'letmeout')
                    ->press('登录')
                    ->visit('/e/1')
                    ->type('text', '#么么哒#')
                    ->press('提交释义')
                    ->clickLink('么么哒')
                    ->assertSee('还没有定义');
        });
    }
}
