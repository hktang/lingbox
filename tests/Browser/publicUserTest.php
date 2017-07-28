<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class publicUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Lingbox');
        });
    }

    public function testEntry()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/e/1')
                    ->assertSee('以添加释义');
        });
    }

    public function testSearch()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/t/嘛哩嘛哩轰')
                    ->assertSee('还没有定义');
        });
    }

    public function testAdd()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/add/嘛哩嘛哩轰')
                    ->assertSee('那啥')
                    ->press('添加')
                    ->assertSee('秒前');
        });
    }

}
