@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$entry->text}}</div>

                <div class="panel-body">
                    @foreach ($entry->definitions->sortByDesc('ups') as $definition)
                    <div class="definition-single">
                      <p>{{$definition->text}}<p>
                      <p>&#9786; {{$definition->ups}} | &#9785; {{$definition->downs}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
