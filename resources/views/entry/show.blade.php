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
                      data-value="1"
                           title="{{__('show.upVoteEntry')}}"
                        >
                          <i class="glyphicon glyphicon-triangle-top"></i>
                        </a>

                        <p id="entry-count">{{ $entry->votes->where('value', 1)->count() }}</p>

                        <a  href="#" 
                           class="vote vote-down vote-entry @if($userEntryVote === -1) voted @endif" 
                              id="entry-vote-down"
                      data-value="-1"
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

      var votableId      = $(this).hasClass('vote-entry') ? {{ $entry->id }} : $(this).data('id');
      var voteValue      = $(this).hasClass('vote-up') ? 1 : -1 ;
      var votableType    = $(this).hasClass('vote-entry') ? 'Entry' : 'Definition' ;
      var originalValue  = $(this).hasClass('voted') ? $(this).data('value') : 0 ;
      var voteToken      = "{{ csrf_token() }}";

      $.ajax({
        url: "{{URL::route('vote')}}",
        type: "post",
        data: {

          'votable_id'       : votableId,
          'votable_type'     : votableType,
          'value'            : voteValue,
          'original_value'   : originalValue,
          '_token'           : voteToken

        },

        success: function(response){

          if (response == "voted") {

            location.reload();

          }else{

            console.log(response);

          }
              
        },

        error: function(response){

          console.log("Vote error.");

        }
      });      
    }); 

  });
  
</script>


@endsection
