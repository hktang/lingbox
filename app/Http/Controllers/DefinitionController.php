<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Definition;
use Illuminate\Http\Request;
use Lang;
use Validator;

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
        
        // Validate
        $rules = [

            'definition-text' => 'required|max:213|unique:definitions,text',
            'jackpot'         => 'present|max:0',

        ];

        $this->validate($request, $rules);


        // Add 

        $entry = Entry::findOrFail($entryId);

        if ($request->user()) {
            
            $definition = new Definition;
            
            $definition->text = $request->input('definition-text');
            $definition->entry_id = $entryId;
            $definition->user_id = $request->user()->id;
            $definition->save();
            
        }else{
          
          return redirect()->route('showEntryByText', $entry->text)
                           ->with('warning', Lang::get('addDefinition.failed'));
                         
        }

        return redirect()->route('showEntryByText', $entry->text)
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
          'definition-text' => 'required|max:213|unique:definitions,text',
      ]);
        
      $definition = Definition::find($id);
      $entryText  = $definition->entry->text;
      $user       = $request->user();
      
      if ($user->can('update', $definition)) {
        
        $definition->text = $request->input('definition-text');
        $definition->save();

      }else{
          
          return redirect()->route('showEntryByText', $entryText)
                           ->with('warning', Lang::get('addDefinition.updateFailed'));
                         
        }

      return redirect()->route('showEntryByText', $entryText)
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
