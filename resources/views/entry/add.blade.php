@extends('layouts.app')

@section('pageTitle')

{{__('add.addEntry')}} - 

@endsection

@section('content')
<div class="container">
       
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default panel-ultralight">
                <div class="panel-heading">{{__('add.addEntry')}}</div>

                <div class="panel-body">

                  {!! Form::open( ['route' => 'storeEntry'] ) !!}
                   
                    @if (count($errors) > 0)
                        <div class="well alert alert-danger">
                      
                            <h4>{{__('add.error')}}</h4>
                            
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            
                        </div>
                    @endif
                    
                    @if(! Auth::user() )
                      <h3>{{__('add.headsupTitle')}}</h3>
                      <p>{{__('add.headsupText')}}</p>
                    @endif
                    
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="input-group">
                                {{ Form::text( 'text' , $text, ["class" => "form-control"] ) }} 
                                {{ Form::text('jackpot', '', ['style' => 'display:none']) }}
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-plus-sign"></i> {{__('add.formSubmit')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
