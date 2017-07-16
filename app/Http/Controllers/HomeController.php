<?php

namespace App\Http\Controllers;

use App\Entry;
use App\User;
use Illuminate\Http\Request;

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
                'userCount'   => $userCount,

            ]);
    }
}
