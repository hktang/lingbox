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
                    
{!! Form::open( ['route' => [ 'storeDefinition', $entry->id ]] ) !!}

  {{ Form::textarea( 'text', '', ['style' => 'width:100%; height:160px;'] ) }}
  
  {{ Form::text('jackpot', '', ['style' => 'display:none']) }}
  
  <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-plus-sign"></i> {{__('show.submitDefinition')}}</button>

{!! Form::close() !!}