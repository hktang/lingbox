<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $userEntries = $request->user()->entries
                         ->sortByDesc('created_at')->take(5);
                         
        $userDefinitions = $request->user()->definitions
                             ->sortByDesc('created_at')->take(5);

        return view('home', [

                'userEntries'     => $userEntries,
                'userDefinitions' => $userDefinitions,

            ]);
    }
}
