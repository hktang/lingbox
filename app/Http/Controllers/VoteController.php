<?php

namespace App\Http\Controllers;

use App\Vote;
use App\Definition;
use App\Entry;
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
            'original_value'  => 'in:-1,1,0',
            'ip_address'      => 'ip',
        ]);


        /* Determine votable type */

        if ($request->votable_type == 'Entry') {

            $votable_type = 'App\Entry';

        }else if ($request->votable_type == 'Definition') {

            $votable_type = 'App\Definition';

        }

        /* Save to votes table */

        if ( $request->user() ){

            if ( $request->value == $request->original_value ){

                /* Already voted */

                return 0;

            }else{

                /* Not yet voted */

                $this->storeVote($request, $votable_type);
                $this->storeVoteCount($request, $votable_type);
 
                return "voted";

            }

        }else{

            /* User not logged in */
            
            if ( $request->value == $request->original_value ){

                /* Already voted */

                return 0;

            }else{

                /* Not yet voted */

                $this->storeVote($request, $votable_type);
                $this->storeVoteCount($request, $votable_type);

                return "voted";

            }
        }

    }

    private function storeVote(Request $request, $votable_type){
      
      $user_id = $request->user() ? $request->user()->id : null;
      
      if($user_id){
        
        /* User vote */
        
        $vote = Vote::firstOrNew([

            'user_id'        => $request->user()->id,
            'votable_id'     => $request->votable_id,
            'votable_type'   => $votable_type,

        ]);
        
      }else{
        
        /* Public vote */
        
        $vote = Vote::firstOrNew([

            'ip_address'     => $request->ip_address,
            'votable_id'     => $request->votable_id,
            'votable_type'   => $votable_type,

        ]);
        
      }
      
      $vote->user_id      = $user_id;
      $vote->value        = $request->value;
      $vote->votable_id   = $request->votable_id;
      $vote->votable_type = $votable_type;
      $vote->ip_address   = $request->ip();
      $vote->save();

    }
    
    private function storeVoteCount(Request $request, $votable_type){
      
      if( $votable_type == 'App\Definition' ){
        
          $votable = Definition::findOrFail($request->votable_id);
          
      }else if( $votable_type == 'App\Entry' ){
        
          $votable = Entry::findOrFail($request->votable_id);
      
      }
      
      /* revise votable vote count */
      
      $upCount   = $votable->votes->where('value', 1)->count();
      $downCount = $votable->votes->where('value', -1)->count();
     
      $votable->timestamps = false;
      $votable->ups        = $upCount;
      $votable->downs      = $downCount;
      $votable->save();

    }
}
