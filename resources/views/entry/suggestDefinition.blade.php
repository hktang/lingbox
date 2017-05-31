<h3>{{__('show.suggestDefinition')}}</h3>

{!! Form::open( ['route' => 'storeDefinition'] ) !!}

  {{ Form::textarea( 'definition' ) }}
  
  <br/>
  
  <input type="submit" value="{{__('show.submitDefinition')}}">

{!! Form::close() !!}