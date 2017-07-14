@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  @if($randomEntry)
                    <h1>{{$randomEntry->text}}</h1>
                  @else
                    <h1>{{__('dashboard.randomEntry')}}</h1>
                  @endif
                  </div>

                <div class="panel-body">
                  @if($randomEntry->has('definitions'))
                    @include('home.definitions')
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection