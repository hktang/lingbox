<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function welcome(Request $request)
    {
      
        $randomEntry = Entry::has('definitions')->inRandomOrder()->first();

        return view('publicHome', [

                'randomEntry'      => $randomEntry,

            ]);
    }
}
