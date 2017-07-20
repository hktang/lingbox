<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Illuminate\Http\Request;
use Pinyin;

class HomeController extends Controller
{

    public function welcome(Request $request)
    {
      
        $entryCount   = Entry::count();
        $randomEntry  = Entry::has('definitions')->inRandomOrder()->first();
        $userCount    = User::count();

        return view('publicHome', [

                'entryCount'  => $entryCount,
                'randomEntry' => $randomEntry,
                'entryRuby'   => Pinyin::sentence($randomEntry->text, true),
                'userCount'   => $userCount,

            ]);
    }
}
