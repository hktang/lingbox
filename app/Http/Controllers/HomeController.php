<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Entry;
use App\User;
use Illuminate\Http\Request;
use Pinyin;

class HomeController extends Controller
{

    public function welcome(Request $request)
    {
      
        $siteStats = [

          'definitions'       => Definition::count(),
          'entries'           => Entry::count(),
          'lonelyEntries'     => Entry::doesntHave('definitions')->count(),
          'users'             => User::count(),
        
        ];

        $randomEntry  = Entry::has('definitions')->inRandomOrder()->first();


        return view('publicHome', [

                'entryRuby'   => Pinyin::sentence($randomEntry->text, true),
                'randomEntry' => $randomEntry,
                'siteStats'   => $siteStats,

            ]);
    }
}
