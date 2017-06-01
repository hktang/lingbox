<?php

namespace App\Http\Controllers;

use App\Definition;
use Illuminate\Http\Request;
use Lang;

class DefinitionController extends Controller
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
    public function store(Request $request, $entryId)
    {
        $this->validate($request, [
            'text'        => 'required|max:2048|unique:entries',
            'jackpot'     => 'max:0',
        ]);
        
        if ($request->user()) {

            $definitionId = Definition::insertGetId([
                'text'        => $request->input('text'),
                'entry_id'     => $entryId,
                'user_id'     => $request->user()->id,
            ]);

        }else{
          
          return redirect()->route('showEntry', $entryId)
                           ->with('warning', Lang::get('addDefinition.failed'));
                         
        }

        return redirect()->route('showEntry', $entryId)
                         ->with('success', Lang::get('addDefinition.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
