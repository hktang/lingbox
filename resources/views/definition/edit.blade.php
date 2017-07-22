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
                    
                        @include('definition.showEntryBody')
                      
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
                        
                        <textarea style="width:100%; height:160px;" name="text" cols="50" rows="10">{{$definition->text}}</textarea>
                        
                        <button class="btn btn-primary" type="submit">
                        <i class="glyphicon glyphicon-saved"></i> {{__('updateDefinition.formSubmit')}}</button>
                        
                      {!! Form::close() !!}
                        
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
