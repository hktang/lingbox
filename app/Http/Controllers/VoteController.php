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
     * Store an upvote if IP address is new for this vote & definition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voteUp(Request $request)
    {
        $this->validate($request, [
            'definition_id' => 'integer',
            'ip_address' => 'ip',
        ]);
 
        $upVotes = Vote::updateOrCreate([

              'definition_id' => $request->definition_id,
              'ip_address' => $request->ip(),
            
            ], [ 'vote' => 1 ])->definition->votes->where('vote', 1)->count();
        
        Definition::where('id', $request->definition_id)
                    ->update(['ups' => $upVotes]);

        return $request->definition_id;
    }

    /**
     * Store a downvote if IP address is new for this vote & definition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voteDown(Request $request)
    {
        $this->validate($request, [
            'definition_id' => 'integer',
            'ip_address' => 'ip',
        ]);
 
        $downVotes = Vote::updateOrCreate([

              'definition_id' => $request->definition_id,
              'ip_address' => $request->ip(),
            
            ], [ 'vote' => "-1" ])->definition->votes->where('vote', "-1")->count();
        
        Definition::where('id', $request->definition_id)
                    ->update(['downs' => $downVotes]);

        return $request->definition_id;
    }

}
