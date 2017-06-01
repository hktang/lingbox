{!! Form::open( ['route' => [ 'storeDefinition', $entry->id ]] ) !!}

  {{ Form::textarea( 'text' ) }}
  
  {{ Form::text('jackpot', '', ['style' => 'display:none']) }}
  
  <br/>
  
  <input type="submit" value="{{__('show.submitDefinition')}}">

{!! Form::close() !!}