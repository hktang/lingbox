@php
 
 $userDefinitionVoteValue = 0;

 $definitionVote = $definition->votes()
                     ->where('user_id', Auth::user()->id)
                     ->first();

 if( $definitionVote ){

    $userDefinitionVoteValue = $definitionVote->value;

 }

@endphp

@if( Auth::user() )
  
  <a href="#" class="vote vote-up @if($userDefinitionVoteValue == 1) voted @endif" data-id="{{$definition->id}}" data-value="1">

@else
  
  <a href="#" class="vote vote-up @if($userDefinitionVoteValue == 1) voted @endif" data-id="{{$definition->id}}" data-value="1">

@endif
    <i class="glyphicon glyphicon-triangle-top"></i>
  </a> 

<span id="def-up-count-{{$definition->id}}">{{$definition->ups}}</span> | 

<a href="#" class="vote vote-down @if($userDefinitionVoteValue == -1) voted @endif" data-id="{{$definition->id}}" data-value="-1">
  <i class="glyphicon glyphicon-triangle-bottom"></i>
</a> 

<span id="def-down-count-{{$definition->id}}">{{$definition->downs}}</span> 