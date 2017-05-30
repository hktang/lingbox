@extends('layouts.app')

@section('pageTitle')

{{__('add.addEntry')}} - 

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('add.addEntry')}}</div>

                <div class="panel-body">

                  {!! Form::open( ['route' => 'storeEntry'] ) !!}

                    <label for='text'>{{__('add.formEntry')}}</label>
                    
                    {{ Form::text( 'text' ) }}
                    
                    <input type="submit" value="{{__('add.formSubmit')}}">

                  {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
