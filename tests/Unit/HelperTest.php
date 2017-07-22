<?php

namespace Tests\Unit;

use App\Helpers\TextHelper;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HelperTest extends TestCase
{
    public function testAddHashtags()
    {
        $textHelper = new TextHelper();

        $text0     = "No change.";
        $text1     = "Two tags #可以# #测试#.";
        $text2     = "Two bad tags #<崩塌# #&破坏# ##'# ##\"#";
        $text3     = "Long EN tag #ThisIsAReallyLoongTagWith32chars#.";
        $text4     = "Long ZH tag #好像最多允许十个字吧#.";
        $text5     = "Long ZH tag #好像最多允许十个字对吗#.";

        $filtered = $textHelper->addHashtags($text0);
        $this->assertEquals($text0, $filtered);

        $filtered = $textHelper->addHashtags($text1);
        $this->assertContains("/t/" . urlencode('可以'), $filtered);
        $this->assertContains("/t/" . urlencode('测试'), $filtered);

        $filtered = $textHelper->addHashtags($text2);
        $this->assertNotContains("href", $filtered);

        $filtered = $textHelper->addHashtags($text3);
        $this->assertContains("href", $filtered);

        $filtered = $textHelper->addHashtags($text4);
        $this->assertContains("href", $filtered);

        $filtered = $textHelper->addHashtags($text5);
        $this->assertNotContains("href", $filtered);

    }
}
