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
            'definition_id' => 'sometimes|required|integer',
            'entry_id' => 'sometimes|required|integer',
            'ip_address' => 'ip',
        ]);
 
        if ( isset($request->definition_id) ){
          
          $params = array(
            'for'  => 'definition',
            'type' => $request->vote_type,
          );
          
          $this->saveVote($request, $params );
          
        }else if ( isset($request->entry_id) ){
          
          $upVotes = Vote::updateOrCreate([

                'entry_id' => $request->entry_id,
                'ip_address' => $request->ip(),
              
              ], [ 'vote' => 1 ])->definition->entries->where('vote', 1)->count();
          
          Entry::where('id', $request->entry_id)
                      ->update(['ups' => $upVotes]);

          return $request->entry_id;
          
        }
    }

    /**
     * Store an upvote or downvote for an entry or definition.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $params
     */
    protected function saveVote($request, $params){ 
    
      $for  = $params['for']  ? $params['for']  : 'definition'; 
      $type = $params['type'] ? $params['type'] : 'up'; 
      
      $voteValue =  $type == 'up'  ?  1 : -1 ; 
      $voteTypeField = $type == 'up' ? 'ups' : 'downs';      
      
      if ( $for == 'definition' ) {
        
        $votes = Vote::updateOrCreate([

              'definition_id' => $request->definition_id,
              'ip_address' => $request->ip(),
            
            ], [ 'vote' => $voteValue ])->definition->votes->where('vote', $voteValue)->count();
        
        Definition::where('id', $request->definition_id)
                    ->update([$voteTypeField => $votes]);

        return $request->definition_id;
        
      } else if ( $for == 'entry' ) {
        
        $votes = Vote::updateOrCreate([

              'entry_id' => $request->entry_id,
              'ip_address' => $request->ip(),
            
            ], [ 'vote' => $voteValue ])->entry->votes->where('vote', $voteValue)->count();
        
        Entry::where('id', $request->vote_id)
                    ->update([$voteTypeField => $votes]);

        return $request->entry_id;
        
      }

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
            'definition_id' => 'sometimes|required|integer',
            'entry_id' => 'sometimes|required|integer',
            'ip_address' => 'ip',
        ]);
 
        if ( isset($request->definition_id) ){
          
          $upVotes = Vote::updateOrCreate([

                'definition_id' => $request->definition_id,
                'ip_address' => $request->ip(),
              
              ], [ 'vote' => 1 ])->definition->votes->where('vote', 1)->count();
          
          Definition::where('id', $request->definition_id)
                      ->update(['ups' => $upVotes]);

          return $request->definition_id;
          
        }else if ( isset($request->entry_id) ){
          
          $upVotes = Vote::updateOrCreate([

                'entry_id' => $request->entry_id,
                'ip_address' => $request->ip(),
              
              ], [ 'vote' => 1 ])->definition->entries->where('vote', 1)->count();
          
          Entry::where('id', $request->entry_id)
                      ->update(['ups' => $upVotes]);

          return $request->entry_id;
          
        }
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
            'definition_id' => 'sometimes|required|integer',
            'entry_id' => 'sometimes|required|integer',
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
