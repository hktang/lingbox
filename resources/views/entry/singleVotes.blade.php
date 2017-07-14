@php
 
 $userDefinitionVoteValue = 0;

@endphp

@if( Auth::user() )

  @php

   $definitionVote = $definition->votes()
                       ->where('user_id', Auth::user()->id)
                       ->first();

   if( $definitionVote ){

      $userDefinitionVoteValue = $definitionVote->value;

   }

  @endphp
  
  <a href="#" class="vote vote-up @if($userDefinitionVoteValue == 1) voted @endif" data-id="{{$definition->id}}" data-value="1">

@else

  @php

   $definitionVote = $definition->votes()
                       ->where('ip_address', $requestIp)
                       ->first();

   if( $definitionVote ){

      $userDefinitionVoteValue = $definitionVote->value;

   }
  
  @endphp  

  <a href="#" class="vote vote-up @if($userDefinitionVoteValue == 1) voted @endif" data-id="{{$definition->id}}" data-value="1">

@endif
    <i class="glyphicon glyphicon-thumbs-up"></i>
  </a> 

<span id="def-up-count-{{$definition->id}}">{{$definition->ups}}</span> | 

<a href="#" class="vote vote-down @if($userDefinitionVoteValue == -1) voted @endif" data-id="{{$definition->id}}" data-value="-1">
  <i class="glyphicon glyphicon-thumbs-down"></i>
</a> 

<span id="def-down-count-{{$definition->id}}">{{$definition->downs}}</span> 