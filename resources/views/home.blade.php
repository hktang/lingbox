@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.dashboard')}}</div>

                <div class="panel-body">

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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
