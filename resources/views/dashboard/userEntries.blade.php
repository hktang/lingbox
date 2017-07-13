<h3>{{__('dashboard.myContributions')}}</h3>

@if( $userEntries->count() > 0 )

  @foreach( $userEntries as $userEntry )

    <p>
      <a href="{{ route('showEntry', $userEntry->id) }}">
        {{$userEntry->text}}
      </a>
      ({{$userEntry->created_at->diffForHumans()}})
    </p>

  @endforeach

  <p>
    <a href="{{ route('addEntry') }}">{{__('dashboard.createEntry')}}</a>
  </p>

@else

  <p>
    {{__('dashboard.noEntry')}}
    <a href="{{ route('addEntry') }}">{{__('dashboard.createFirstEntry')}}</a>
  </p>

@endif