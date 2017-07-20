<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Vote;
use Carbon\Carbon;
use Lang;
use Pinyin;

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
    public function create( $text = null )
    {
        return view('entry.add', [
          'text' => $text
        ]);
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
            'text'        => 'required|max:32|unique:entries',
            'jackpot'     => 'max:0',
        ]);
        
        if ($request->user()) {

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'pinyin'      => Pinyin::abbr($request->input('text')),
                'user_id'     => $request->user()->id,
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            ]);

        }else{

            $entryId = Entry::insertGetId([
                'text'        => $request->input('text'),
                'pinyin'      => Pinyin::abbr($request->input('text')),
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $idOrText = null)
    {

        $userEntryVote = 0;         

        /* check for precence of 'e/' at the start of the request uri */

        if ( is_numeric($idOrText) && substr($request->path(), 0, 2) == 'e/' ){

          /* The query is for an ID. */
        
          $entry = Entry::findOrFail($idOrText);
          $searchText  = $entry->text;
        
        }else if ($idOrText == null){
        
          /* The query is from the searchbar. */

          if ($request->input('term') == "") {
              return redirect('/');
          }
        
          $entry       = Entry::where('text', $request->input('term'))->first();
          $searchText  = $request->input('term');
          
        }else{
          /* The query is for text. */
          
          $entry = Entry::where('text', $idOrText)->first();
          $searchText  = $idOrText;

        }

        if ( $entry ){
            
            if( $request->user() ){
              
                /* Determines of a user has voted or not */
            
                if ( $entry->votes() ){

                    $vote = $entry->votes()
                              ->where('user_id', $request->user()->id)
                              ->first();

                    if( $vote ){
                      $userEntryVote = $vote->value;
                    }
                }
            }else{
              
                /* Determines of a non-user has voted or not */

                if ( $entry->votes() ){

                    $vote = $entry->votes()
                              ->where('ip_address', $request->ip())
                              ->first();

                    if( $vote ){
                      $userEntryVote = $vote->value;
                    }
                }
            }
        }
        
        if ($entry) {

            $eSiblings = Entry::where("pinyin", "<", $entry->pinyin )
                               ->orderByDesc('pinyin')
                               ->limit(2)
                               ->get()->reverse();

            $ySiblings = Entry::where("pinyin", ">", $entry->pinyin )
                               ->orderBy('pinyin')
                               ->limit(2)
                               ->get();

            if ($entry->user) {

                $entryCreator = $entry->user->name;

            }else{

                $entryCreator = $entry->ip_address;
            }

        }else{
            $eSiblings = null;
            $ySiblings = null;
        }

        return view('entry.show', [
            
            'entry'         => $entry,
            'entryCreator'  => $entryCreator,
            'entryRuby'     => Pinyin::sentence($entry->text, true),
            'searchText'    => $searchText,
            'userEntryVote' => $userEntryVote,
            'requestIp'     => $request->ip(),
            'eSiblings'     => $eSiblings,
            'ySiblings'     => $ySiblings,

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
