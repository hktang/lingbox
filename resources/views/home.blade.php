@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.dashboard')}}</div>

                <div class="panel-body">

                  @include("dashboard.userEntries")
                  
                  @include("dashboard.userDefinitions")

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.killZeroDefinition')}}</div>

                <div class="panel-body">

                  @include("dashboard.zeroDefinition")

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
