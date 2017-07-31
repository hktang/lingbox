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

  <textarea style="width:100%; height:160px;" name="definition-text" cols="50" rows="10">{{old('definition-text')}}</textarea>
  
  {{ Form::text('jackpot', '', ['style' => 'display:none']) }}
  
  <button class="btn btn-primary pull-right" type="submit"><i class="glyphicon glyphicon-plus-sign"></i> {{__('show.submitDefinition')}}</button>

  <h4>{!!nl2br(__('addDefinition.example'))!!}</h4>
  <p>{!!nl2br(__('addDefinition.placeholder'))!!}</p>

{!! Form::close() !!}