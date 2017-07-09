<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Definition;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vote $vote)
    {
        //
    }

    /**
     * Store a vote to entry or definition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vote(Request $request)
    {
        $this->validate($request, [
            'votable_id'      => 'required|integer',
            'votable_type'    => 'required',
            'value'           => 'in:-1,1',
            'user_entry_value' => 'in:-1,1',
        ]);

        if ( $request->user() ){

            if ( $request->votable_type == 'Entry' ){
            
                /* Vote for entries */
                
                if ( $request->value == $request->user_entry_value ){

                    /* Already voted */

                    return "Already voted up/down";

                }else{

                    /* Not yet voted */

                    $vote = Vote::firstOrNew([

                        'user_id'        => $request->user()->id,
                        'votable_id'     => $request->votable_id,
                        'votable_type'   => 'App\Entry',

                    ]);

                    $vote->value        = $request->value;
                    $vote->votable_id   = $request->votable_id;
                    $vote->votable_type = 'App\Entry';
                    $vote->ip_address   = $request->ip();
                    $vote->save();

                    return "vote ". $request->value;

                }

            }else if ( $request->votable_type == 'Definition' ){
                
                /* Vote for definitions */ 
                
                    return "Voting for definitions";
                }

        }else{

            return "?";
        }

    }


}
