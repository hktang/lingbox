@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)
<div class="row">

  <div class="col-xs-1 definition-votes">

    @if(Auth::user() && Auth::user()->votes->where('definition_id', $definition->id)->first() )



    @else

      Not voted

    @endif

  </div>
  
  <div class="col-xs-11 definition-body">
    <div class="definition-single">
      <p>{!! nl2br(e($definition->text)) !!}<p>
      <p>

       <a href="#" class="vote vote-up {{ $voted or "" }}" id="def-up-{{$definition->id}}"><i class="glyphicon glyphicon-triangle-top"></i></a> 

       <span id="def-up-count-{{$definition->id}}">{{$definition->ups}}</span> | 

       <a href="#" class="vote vote-down {{ $voted or "" }}" id="def-down-{{$definition->id}}"><i class="glyphicon glyphicon-triangle-bottom"></i></a> 

       <span id="def-down-count-{{$definition->id}}">{{$definition->downs}}</span> | 

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

  $('.vote-up').click(function(){

    var definitionId = $(this).attr('id').replace('def-up-','');

    $.ajax({
      url: "{{URL::route('vote')}}",
      type: "post",
      data: {

        'definitionId': definitionId,
        'value': 1,
        'voteFor': "definition",
        '_token': "{{ csrf_token() }}"

      },

      success: function(response){

/*        var upCountId = '#def-up-count-' + dId;
        var $upCount = $(upCountId);

        if (! $upCount.hasClass("voted")){

          $upCount.text( + $upCount.text() + 1 ).addClass("voted");
        
        }*/
        console.log(response);
      },

      error: function(data){

        console.log(data.responseText);

      }
    });      
  }); 



});
</script>