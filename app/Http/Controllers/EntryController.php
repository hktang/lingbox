<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use Carbon\Carbon;
use Lang;
use Tracker;

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
            'jackpot'     => 'max:0',
        ]);
        
        if ($request->user()) {

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'user_id'     => $request->user()->id,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);

        }else{

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'ip_address'  => $request->ip(),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
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
        $visitor = Tracker::currentSession();
        
        return view('entry.show', [
            
            'entry' => Entry::find($id),
            'searchText'  => $id,
            'pageViews' => Tracker::pageViews(60*24)->count(),
            'city' => $visitor->device->is_mobile,
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
