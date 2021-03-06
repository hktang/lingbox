@extends('layouts.app')

@section('content')

@if( \Request::is('/'))
  @include('layouts.jumbotron')
@endif

<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h1 id='h1-join-us'>{{__('dashboard.siteStats', [

              'numberOfDefinitions'    =>  $siteStats['definitions'],
              'numberOfEntries'        =>  $siteStats['entries'],
              'numberOfUsers'          =>  $siteStats['users'],

            ])}}
          </h1>
          <div id="jumbo-register">
           @if(!Auth::user())
            <a href='{{route('register')}}' class='btn btn-success'>
              {{__('register.joinUs')}}
            </a>
            <a href='{{route('login')}}' >{{__('login.login')}}</a>
           @else
            <a href='{{route('home')}}' class='btn btn-success'>{{__('login.myHome')}}</a>
           @endif
          </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-ultralight">
              <dl id="entry-dl" lang="zh">
                <div class="panel-heading">
                  @if($randomEntry)
                     <div id="home-feature-entry-text">
                      <h1>
                        <dt lang="zh">
                          <a href="{{ route('showEntryByText', $randomEntry->text) }}">
                            {{$randomEntry->text}}
                          </a>
                          <a href="/" id="shuffle"><i class='glyphicon glyphicon-random'></i></a>
                        </dt>
                      </h1>
                    
                      <p class='ruby'><i class="glyphicon glyphicon-bullhorn"> </i> {{$entryRuby}}</p>
                      </div>
                  @else
                    <h1>{{__('dashboard.randomEntry')}}</h1>
                  @endif
                  </div>

                <div class="panel-body">
                  @if($randomEntry && $randomEntry->has('definitions'))
                    @include('home.definitions')
                  @endif
                </div>
              </dl>
            </div>
        </div>
    </div>
</div>

@endsection