<?php 

namespace App\Helpers;

use Illuminate\Support\ServiceProvider;

class TextHelper extends ServiceProvider
{

    public static function addHashtags(String $text)
    {

        // sanitize text

        $text = htmlentities($text);

        // get tags

        $findTags = preg_match_all("/(#[^\s\"\'#&<>]{1,32}?#)/Uu", $text, $tags);


        // replace clean tags with links

        foreach ($tags[1] as $tag){

          $cleanTag = substr($tag, 1, -1);
          $link     = "<a href=" . route("showEntryByText", $cleanTag) . ">" . $tag . "</a>";
          $text     = str_replace($tag, $link, $text);

        }

        return nl2br($text);
    }

}