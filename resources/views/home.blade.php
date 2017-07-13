@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.dashboard')}}</div>

                <div class="panel-body">

                  @include("dashboard.userEntries")
                  
                  @include("dashboard.userDefinitions")

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
