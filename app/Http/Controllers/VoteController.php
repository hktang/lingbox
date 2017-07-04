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
            'voteFor'      => 'in:definition,entry',
            'definitionId' => 'sometimes|required|integer',
            'entryId'      => 'sometimes|required|integer',
            'value'        => 'in:-1,1',
            'ipAddress'    => 'ip',
        ]);

        if ( $request->user() ){

            //save user_id
            if ( $request
                  ->user()
                  ->votes
                  ->whereColumn([
                      
                        ["value", "=", $request->value],
                        ["definition_id", "=", $request->definitionId],

                      ])
                  ->first() ){

                return "Already voted";

            }else{

                return "Not voted";
            }

        }else{

            //save ip address
        }

    }


}
