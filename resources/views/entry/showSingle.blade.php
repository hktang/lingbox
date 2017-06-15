@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)
<div class="row">

  <div class="col-xs-1 definition-votes">
  
  </div>
  
  <div class="col-xs-11 definition-body">
    <div class="definition-single">
      <p>{!! nl2br(e($definition->text)) !!}<p>
      <p>

       <a href="#" class="def-voteUp" id="def-voteUp{{$definition->id}}">&#9786;</a> 

       <span id="upCount{{$definition->id}}">{{$definition->ups}}</span> | 

       <a href="#" class="voteDown" id="voteDown{{$definition->id}}">&#9785;</a> 

       <span id="downCount{{$definition->id}}">{{$definition->downs}}</span> | 

       {{$definition->user->name or __('show.unknownUser')}}

       {{__('show.singleDesc', [

         'created' => $definition->created_at->diffForHumans(),
         'updated' => $definition->updated_at->diffForHumans(),

       ])}}
       
       @can('update', $definition)
       
          | <a href="{{ route('editDefinition', $definition->id) }}">{{__('updateDefinition.edit')}}</a>
       
       @endcan
    </div>
  </div>
  
</div>  
  
<hr />

@endforeach

<div class="definition-suggest">
    
    @if( ! Auth::user() )
      
      <h3>{{__('show.suggestDefinition')}}</h3>
      <p>{{__('login.login')}} {{__('show.or')}} <a href="{{ route('register') }}">{{__('register.register')}}</a> {{__('show.toSuggestDefinition')}}</p>
      @include('auth.loginForm')
    
    @elseif ( ! Auth::user()->definitions->where('entry_id', $entry->id)->first() )
      
      <h3>{{__('show.suggestDefinition')}}</h3>
      @include('entry.suggestDefinition')
    
    @endif
    
</div>


<script type="text/javascript">

$(document).ready(function(){



  $('.def-voteUp').click(function(){

    var definitionId = $(this).attr('id').replace('def-voteUp','');

    $.ajax({
      url: "{{URL::route('vote')}}",
      type: "post",
      data: {

        'definition_id': definitionId,
        'vote_type':'up',
        '_token': "{{ csrf_token() }}"

      },

      success: function(dId){

        var upCountId = '#upCount' + dId;
        var $upCount = $(upCountId);

        if (! $upCount.hasClass("voted")){

          $upCount.text( + $upCount.text() + 1 ).addClass("voted");
        
        }
        console.log(dId);
      },

      error: function(data){

        console.log(data.responseText);

      }
    });      
  }); 


  $('.voteDown').click(function(){

    var definitionId = $(this).attr('id').replace('voteDown','');

    $.ajax({
      url: "{{URL::route('vote')}}",
      type: "post",
      data: {

        'definition_id': definitionId,
        'vote_type':'down',
        '_token': "{{ csrf_token() }}"

      },

      success: function(dId){

        var downCountId = '#downCount' + dId;
        var $downCount = $(downCountId);

        if (! $downCount.hasClass("voted")){

          $downCount.text( + $downCount.text() + 1 ).addClass("voted");
        
        }
        console.log(dId);
      },

      error: function(data){

        console.log(data.responseText);

      }
    });      
  }); 


});
</script>