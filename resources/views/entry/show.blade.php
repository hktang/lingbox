@extends('layouts.app')

@section('pageTitle')

    @if($entry)
      {{__('show.pageTitlePrefix')}} {{$entry->text}} {{__('show.pageTitleSuffix')}} - 
    @else
      {{__('show.entryNotExist', ['searchText' => $searchText])}} - 
    @endif

@endsection

@section('content')

<div class="container">

    <div class="row">
    
      <div class="col-md-8 col-md-offset-2">
      
        @include('layouts.flash')
        
      </div>
      
    </div>
    
    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
            
                @if($entry)
                  
                    <div class="panel-heading">
                    
                      <div class="row">
                      
                        <div class="col-xs-2 entry-votes">

                        <a  href="#" 
                           class="vote vote-up @if($userEntryVote == 1) voted @endif" 
                              id="entry-vote-up"
                           title="{{__('show.upVoteEntry')}}"
                        >
                          <i class="glyphicon glyphicon-triangle-top"></i>
                        </a>

                        <p id="entry-count">Count</p>

                        <a  href="#" 
                           class="vote vote-down @if($userEntryVote == -1) voted @endif" 
                              id="entry-vote-down"
                           title="{{__('show.downVoteEntry')}}"
                        >
                          <i class="glyphicon glyphicon-triangle-bottom"></i>
                        </a>
                        
                        </div>

                        <div class="col-xs-10 entry-body">


                          <h1 id="entry-text">{{$entry->text}}</h1>
                        
                          <p>
                            {{__('show.entryCreatedBy')}} 
                            
                            {{$entry->user->name or __('show.unknownUser') . " ($entry->ip_address)" }}
                            
                            {{__('show.entryCreatedAt', ['created' => $entry->created_at->diffForHumans() ])}} 
                          </p>

                        </div>
                      </div>
                      
                    </div>

                    <div class="panel-body">
                    
                        @include('entry.showSingle')
                        
                    </div>
                    
                @else
                  
                    <div class="panel-heading">
                    
                      {{__('show.entryNotExist', ['searchText' => $searchText])}}
                      
                    </div>

                    <div class="panel-body">
                    
                        <a href="{{URL::route('addEntry')}}">
                        
                          {{__('show.createEntry', ['searchText' => $searchText])}}
                          
                        </a>
                        
                    </div>
                    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
