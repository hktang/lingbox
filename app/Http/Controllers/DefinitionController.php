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
            'text'        => 'required|max:2048|unique:definitions',
            'jackpot'     => 'max:0',
        ]);
        
        if ($request->user()) {
            
            $definition = new Definition;
            
            $definition->text = $request->input('text');
            $definition->entry_id = $entryId;
            $definition->user_id = $request->user()->id;
            $definition->save();
            
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
    public function edit(Request $request, $id)
    {

        $definition = Definition::find($id);
        $user       = $request->user();

        if ($user->can('update', $definition)) {
            
            return view('definition.edit', [
            
            'definition' => Definition::find($id),
            
            ]);

        }else{
            return redirect()->route('showEntry', $id)
                ->with('warning', Lang::get('addDefinition.updateFailed'));
        }
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
      
      $this->validate($request, [
          'text'        => 'required|max:2048|unique:definitions',
      ]);
        
      $definition = Definition::find($id);
      $entryId    = $definition->entry_id;
      $user       = $request->user();
      
      if ($user->can('update', $definition)) {
        
        $definition->text = $request->input('text');
        $definition->save();

      }else{
          
          return redirect()->route('showEntry', $entryId)
                           ->with('warning', Lang::get('addDefinition.updateFailed'));
                         
        }

        return redirect()->route('showEntry', $entryId)
                         ->with('success', Lang::get('addDefinition.updated'));
      
      
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
