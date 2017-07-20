@if( $userDefinitions->count() > 0 )

<h3>{{__('dashboard.myDefinitions')}}</h3>
  
  @foreach( $userDefinitions as $userDefinition )

    <p>
      <a href="{{ route('showEntryByText', $userDefinition->entry->text) }}">
        {{$userDefinition->entry->text}}
      </a>
      ({{$userDefinition->created_at->diffForHumans()}})
    </p>

  @endforeach

@endif