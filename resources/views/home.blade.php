@extends('layouts.app')

@section('pageTitle')

    {{Auth::user()->name}} - 

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.dashboard')}}</div>

                <div class="panel-body">

                  @include("dashboard.userEntries")
                  
                  <hr/>
                  
                  @include("dashboard.userDefinitions")

                </div>
            </div>

            @include("dashboard.stats")

        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                
                <div class="panel-heading">
                   {{__('dashboard.killZeroDefinition')}} 
                   ({{__('dashboard.zeroDefinitionCount', ['count' => $siteStats['lonelyEntries']])}})
                </div>

                @include("dashboard.zeroDefinition")

            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">{{__('dashboard.highlightsTitle')}}</div>

                @include("dashboard.highlights")

            </div>

        </div>

    </div>
</div>
@endsection
