@if( Auth::user() )

  <a href="#" class="vote vote-up" id="def-up-{{$definition->id}}">

@else
  
  <a href="#" class="vote vote-up" id="def-up-{{$definition->id}}">

@endif
    <i class="glyphicon glyphicon-triangle-top"></i>
  </a> 

<span id="def-up-count-{{$definition->id}}">{{$definition->ups}}</span> | 

<a href="#" class="vote vote-down" id="def-down-{{$definition->id}}">
  <i class="glyphicon glyphicon-triangle-bottom"></i>
</a> 

<span id="def-down-count-{{$definition->id}}">{{$definition->downs}}</span> 