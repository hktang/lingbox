<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;

class LoginTest extends DuskTestCase
{
    use DatabaseTransactions;

    function __construct() {
      $this->userName  = 'lingboxTest';
      $this->email     = 'lingbox.test@example.com';
      $this->password  = 'secret';
      $this->entryText = '嘛哩哄';
      $this->defText   = 'Entry 嘛哩哄 definition goes here.';
    }

    public function testRegister()
    {

        $this->browse(function ($browser) {

            $browser->visit('/register')
                    ->type('name', $this->userName)
                    ->type('email', $this->email)
                    ->type('password', $this->password)
                    ->type('#password-confirm', $this->password)
                    ->press('注册')
                    ->assertPathIs('/home')
                    ->clickLink($this->userName)
                    ->clickLink('退出')
                    ->assertPathIs('/');
        });
    }


    public function testLogin()
    {

        $this->browse(function ($browser) {

            $browser->visit('/login')
                    ->type('email', $this->email)
                    ->type('password', $this->password)
                    ->press('登录')
                    ->assertPathIs('/home');
        });
    }

    public function testAddEntry()
    {

        $this->browse(function ($browser) {

            $browser->visit('/add')
                    ->type('text', $this->entryText)
                    ->press('添加')
                    ->assertSee($this->entryText)
                    ->type('definition-text', $this->defText)
                    ->press('提交释义')
                    ->assertSee($this->defText)
                    ->clickLink('编辑释义')
                    ->type('definition-text', $this->defText . '--rev')
                    ->press('编辑释义')
                    ->assertSee($this->defText . '--rev');

        });


    }
}
