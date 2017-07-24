@if( $lonelyEntries->count() > 0 )

  <ul class="list-group">  

    @foreach( $lonelyEntries as $lonelyEntry )

      <li class="list-group-item">
        <a href="{{ route('showEntryByText', $lonelyEntry->text) }}">
          {{$lonelyEntry->text}}
        </a>
        <i class="glyphicon glyphicon-thumbs-up"></i> {{ $lonelyEntry->ups }}
      </li>

    @endforeach

  </ul>

@else
  
  <div class="panel-body">
    <p>
      {{__('dashboard.allDefined')}}
    </p>
  </div>

@endif