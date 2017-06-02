@extends('layouts.app')

@section('pageTitle')

      {{__('updateDefinition.pageTitlePrefix')}} {{$definition->entry->text}} - 

@endsection

@section('content')
<div class="container">

    <div class="row">
    
      <div class="col-md-8 col-md-offset-2">
      
        @include('layouts.flash')
        
      </div>
      
    </div>
    
    <div class="row">
    
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
            
                @if($definition)
                  
                    <div class="panel-heading">
                    
                      <h1>{{$definition->entry->text}}</h1>
                      
                      <p>
                      {{__('show.entryCreatedBy')}} 
                      
                      {{$definition->entry->user->name or __('show.unknownUser') . " ($entry->ip_address)" }}
                      
                      {{__('show.entryCreatedAt', ['created' => $definition->entry->created_at->diffForHumans() ])}} 
                      </p>
                      
                    </div>

                    <div class="panel-body">
                    
                      {!! Form::open( ['route' => ['updateDefinition', $definition->id ]] ) !!}
                       
                        @if (count($errors) > 0)
                            <div class="well alert alert-danger">
                          
                                <h4>{{__('updateDefinition.error')}}</h4>
                                
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                
                            </div>
                        @endif
                                                
                        {{ Form::textarea( 'text', $definition->text, ['style' => 'width:100%; height:160px;']  ) }} 
                        
                        <br />
                        <input type="submit" value="{{__('updateDefinition.formSubmit')}}">
                        
                      {!! Form::close() !!}
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
