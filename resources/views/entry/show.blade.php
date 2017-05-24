@extends('layouts.app')

@section('pageTitle')

    @if($entry)
      {{__('show.pageTitlePrefix')}} {{$entry->text}} {{__('show.pageTitleSuffix')}} - 
    @else
      {{__('show.entryNotExist', ['searchText' => $searchText])}} - 
    @endif

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if($entry)
                    <div class="panel-heading">{{$entry->text}}</div>

                    <div class="panel-body">
                        @foreach ($entry->definitions->sortByDesc('ups') as $definition)
                        <div class="definition-single">
                          <p>{{$definition->text}}<p>
                          <p>&#9786; {{$definition->votes->where('vote', '1')->count()}} | &#9785; {{$definition->votes->where('vote', '-1')->count()}}
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="panel-heading">
                      {{__('show.entryNotExist', ['searchText' => $searchText])}}
                    </div>

                    <div class="panel-body">
                        <a href="{{URL::route('addEntry')}}">
                          {{__('show.createEntry', ['searchText' => $searchText])}}
                        </a>
                    </div>                
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
