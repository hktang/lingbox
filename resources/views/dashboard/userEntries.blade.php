<h3>{{__('dashboard.myContributions')}}</h3>

@if( $userEntries->count() > 0 )

  @foreach( $userEntries as $userEntry )

    <p>
      <a href="{{ route('showEntryByText', $userEntry->text) }}">
        {{$userEntry->text}}
      </a>
      ({{$userEntry->created_at->diffForHumans()}})
    </p>

  @endforeach

  <p>{{__('dashboard.userEntryCount', ['count' => $userStats['entries']])}}</p>

  <a class='btn btn-primary' href="{{ route('addEntry') }}">
    <i class="glyphicon glyphicon-plus-sign"></i> {{__('dashboard.createEntry')}}
  </a>


@else

  <p>
    {{__('dashboard.noEntry')}}
    <a href="{{ route('addEntry') }}">{{__('dashboard.createFirstEntry')}}</a>
  </p>

@endif