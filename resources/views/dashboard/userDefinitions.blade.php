@if( $userDefinitions->count() > 0 )

<h3>{{__('dashboard.myDefinitions')}}</h3>
  
  @foreach( $userDefinitions as $userDefinition )

    <p>
    @if($userDefinition->entry)
      <a href="{{ route('showEntryByText', $userDefinition->entry->text) }}">
        {{$userDefinition->entry->text}}
      </a>
    @endif
      ({{$userDefinition->created_at->diffForHumans()}})
    </p>

  @endforeach

  <p>{{__('dashboard.userDefinitionCount', ['count' => $userStats['definitions']])}}</p>

@endif