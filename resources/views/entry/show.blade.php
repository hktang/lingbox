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
      
          @if ( session('success') )
            <div class="alert alert-success .fade .in system-alert">
          
                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"> </span> 
                
                {{ session('success') }}

                <a href="#" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</a>
                
            </div>
          @elseif ( session('warning') )
            <div class="alert alert-warning .fade .in system-alert">
          
                <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> 
                
                {{ session('warning') }}

                <a href="#" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</a>
                
            </div>
          @endif
      </div>
      
    </div>
    
    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
            
                @if($entry)
                  
                    <div class="panel-heading">
                    
                      <h1>{{$entry->text}}</h1>
                      
                      <p>
                      {{__('show.entryCreatedBy')}} 
                      
                      {{$entry->user->name or __('show.unknownUser') . " ($entry->ip_address)" }}
                      
                      {{__('show.entryCreatedAt', ['created' => $entry->created_at ])}} 
                      </p>
                      
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
