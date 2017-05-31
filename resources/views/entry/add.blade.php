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
