@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)

  <div class="definition-single">
    <p>{{$definition->text}}<p>
    <p>
     <a href="#" class="voteUp" id="{{$definition->id}}">&#9786;</a> 
     {{$definition->votes->where('vote', '1')->count()}} | 
     &#9785; {{$definition->votes->where('vote', '-1')->count()}} |
     {{$definition->user->name}}, {{$definition->created_at}}
  </div>
  
  <hr />

@endforeach

<script type="text/javascript">
$(document).ready(function(){
  $('.voteUp').click(function(){
    $.ajax({
      url: "{{URL::route('voteUp')}}",
      type: "post",
      data: {'definition_id':$(this).attr('id')},
      success: function(data){
        console.log(success);
      },
      error: function(data){
        console.log(data);
      }
    });      
  }); 
});
</script>