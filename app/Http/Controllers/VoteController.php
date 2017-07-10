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
            'original_value'  => 'in:-1,1,0',
        ]);


        /* Determine votable type */

        if ($request->votable_type == 'Entry') {

            $votable_type = 'App\Entry';

        }else if ($request->votable_type == 'Definition') {

            $votable_type = 'App\Definition';

        }

        /* Save to votes table */

        if ( $request->user() ){

            /* Vote for entries */
            
            if ( $request->value == $request->original_value ){

                /* Already voted */

                return 0;

            }else{

                /* Not yet voted */

                $vote = Vote::firstOrNew([

                    'user_id'        => $request->user()->id,
                    'votable_id'     => $request->votable_id,
                    'votable_type'   => $votable_type,

                ]);

                $vote->user_id      = $request->user()->id;
                $vote->value        = $request->value;
                $vote->votable_id   = $request->votable_id;
                $vote->votable_type = $votable_type;
                $vote->ip_address   = $request->ip();
                $vote->save();

                

                if ( $votable_type == 'App\Definition' ){

                    /* revise definition vote count */

                    $definition = Definition::findOrFail($request->votable_id);

                    if ($request->value == "1") {

                        $count = $definition->votes->where('value', 1)->count();
                        $definition->update(['ups', $count], ['timestamps' => false]);

                    }else if ($request->value == "-1"){

                        $count = $definition->votes->where('value', -1)->count();
                        $definition->update(['downs', $count], ['timestamps' => false]);

                    }
                }

                return $request->value;

            }

        }else{

            return "?";
        }

    }


}
