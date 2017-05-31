@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)

  <div class="definition-single">
    <p>{{$definition->text}}<p>
    <p>

     <a href="#" class="voteUp" id="voteUp{{$definition->id}}">&#9786;</a> 

     <span id="upCount{{$definition->id}}">

      {{$definition->ups}}

     </span> | 

     <a href="#" class="voteDown" id="voteDown{{$definition->id}}">&#9785;</a> 

     <span id="downCount{{$definition->id}}">

      {{$definition->downs}}

     </span> | 

     {{$definition->user->name or __('show.unknownUser')}}, {{$definition->created_at}}
  </div>
  
  <hr />

@endforeach

<div class="definition-suggest">
    @include('entry.suggestDefinition')
</div>


<script type="text/javascript">

$(document).ready(function(){



  $('.voteUp').click(function(){

    var definitionId = $(this).attr('id').replace('voteUp','');

    $.ajax({
      url: "{{URL::route('voteUp')}}",
      type: "post",
      data: {

        'definition_id': definitionId,
        '_token': "{{ csrf_token() }}"

      },

      success: function(dId){

        var upCountId = '#upCount' + dId;
        var $upCount = $(upCountId);

        if (! $upCount.hasClass("voted")){

          $upCount.text( + $upCount.text() + 1 ).addClass("voted");
        
        }

      },

      error: function(data){

        console.log(data.responseText);

      }
    });      
  }); 


  $('.voteDown').click(function(){

    var definitionId = $(this).attr('id').replace('voteDown','');

    $.ajax({
      url: "{{URL::route('voteDown')}}",
      type: "post",
      data: {

        'definition_id': definitionId,
        '_token': "{{ csrf_token() }}"

      },

      success: function(dId){

        var downCountId = '#downCount' + dId;
        var $downCount = $(downCountId);

        if (! $downCount.hasClass("voted")){

          $downCount.text( + $downCount.text() + 1 ).addClass("voted");
        
        }

      },

      error: function(data){

        console.log(data.responseText);

      }
    });      
  }); 


});
</script>