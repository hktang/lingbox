@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)

  <div class="definition-single">
    <p>{{$definition->text}}<p>
    <p>

     <a href="#" class="voteUp" id="{{$definition->id}}">&#9786;</a> 

     <span id="upCount{{$definition->id}}">

      {{$definition->votes->where('vote', '1')->count()}}

     </span> | 

     &#9785; {{$definition->votes->where('vote', '-1')->count()}} |

     {{$definition->user->name or __('show.unknownUser')}}, {{$definition->created_at}}
  </div>
  
  <hr />

@endforeach

<script type="text/javascript">
$(document).ready(function(){
  $('.voteUp').click(function(){

    var definitionId = $(this).attr('id');

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
});
</script>