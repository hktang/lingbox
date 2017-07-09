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
                           class="vote vote-up vote-entry @if($userEntryVote === 1) voted @endif" 
                              id="entry-vote-up"
                           title="{{__('show.upVoteEntry')}}"
                        >
                          <i class="glyphicon glyphicon-triangle-top"></i>
                        </a>

                        <p id="entry-count">{{ $entry->votes->where('value', 1)->count() }}</p>

                        <a  href="#" 
                           class="vote vote-down vote-entry @if($userEntryVote === -1) voted @endif" 
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


<script type="text/javascript">

  $(document).ready(function(){

    $('.vote').click(function(){

      var entryId        = {{ $entry->id }};
      var voteValue      = $(this).hasClass('vote-up') ? 1 : -1 ;
      var voteType       = $(this).hasClass('vote-entry') ? 'Entry' : 'Definition' ;
      var userEntryValue = {{ $userEntryVote }};
      var voteToken      = "{{ csrf_token() }}";

      $.ajax({
        url: "{{URL::route('vote')}}",
        type: "post",
        data: {

          'votable_id'       : entryId,
          'votable_type'     : voteType,
          'value'            : voteValue,
          'user_entry_value' : userEntryValue,
          '_token'           : voteToken

        },

        success: function(response){

          console.log(response);
        },

        error: function(data){

          console.log(data.responseText);

        }
      });      
    }); 

  });
  
</script>


@endsection
