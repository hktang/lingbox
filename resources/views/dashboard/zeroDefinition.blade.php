@if( $lonelyEntries->count() > 0 )

  @foreach( $lonelyEntries as $lonelyEntry )

    <p>
      <a href="{{ route('showEntry', $lonelyEntry->id) }}">
        {{$lonelyEntry->text}}
      </a>
      ({{ $lonelyEntry->ups }})
    </p>

  @endforeach

@else

  <p>
    {{__('dashboard.allDefined')}}
  </p>

@endif