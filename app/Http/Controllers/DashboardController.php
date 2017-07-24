<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Entry;
use App\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
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

        $lonelyEntries = Entry::doesntHave('definitions')
                              ->inRandomOrder()
                              ->take(5)
                              ->get();

        $siteStats = [

          'definitions'       => Definition::count(),
          'entries'           => Entry::count(),
          'lonelyEntries'     => Entry::doesntHave('definitions')->count(),
          'users'             => User::count(),
        
        ];

        $siteEntries = [

          'leastPopularEntry' => Entry::orderByDesc('downs')->first(),
          'mostPopularEntry'  => Entry::orderByDesc('ups')->first(),
          'oldestLonelyEntry' => Entry::doesntHave('definitions')->orderByDesc('created_at')->first(),

        ];

        $userStats = [

          'definitions'       => Definition::where('user_id', $request->user()->id)->count(),          
          'entries'           => Entry::where('user_id', $request->user()->id)->count(),

        ];
        
        return view('home', [

                'userEntries'      => $userEntries,
                'userDefinitions'  => $userDefinitions,
                'lonelyEntries'    => $lonelyEntries,
                'siteEntries'      => $siteEntries,
                'siteStats'        => $siteStats,
                'userStats'        => $userStats,

            ]);
    }

}
