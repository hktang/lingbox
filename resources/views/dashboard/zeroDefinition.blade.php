@if( $lonelyEntries->count() > 0 )

  @foreach( $lonelyEntries as $lonelyEntry )

    <p>
      <a href="{{ route('showEntry', $lonelyEntry->id) }}">
        {{$lonelyEntry->text}}
      </a>
      <span class="label label-success"><i class="glyphicon glyphicon-thumbs-up"></i> {{ $lonelyEntry->ups }}</span>
    </p>

  @endforeach

@else

  <p>
    {{__('dashboard.allDefined')}}
  </p>

@endif