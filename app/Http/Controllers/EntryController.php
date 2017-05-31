<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use Lang;

class EntryController extends Controller
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
        return view('entry.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text'        => 'required|max:255|unique:entries',
        ]);
        
        if ($request->user()) {

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'user_id'     => $request->user()->id,
            ]);

        }else{

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'ip_address'  => $request->ip(),
            ]);
        }

        return redirect()->route('showEntry', $entryId)
                         ->with('success', Lang::get('add.added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('entry.show', [
            
            'entry' => Entry::find($id),
            'searchText'  => $id,
            
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showByText($text)
    {
        return view('entry.show', [

                'entry' => Entry::where('text', $text)->first(), 
                'searchText'  => $text,

                ]);
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
