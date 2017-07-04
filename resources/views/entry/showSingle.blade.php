@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      <p>{!! nl2br(e($definition->text)) !!}<p>
      <p>

       <a href="#" class="vote vote-up {{ $userVote or '' }}" id="def-up-{{$definition->id}}"><i class="glyphicon glyphicon-triangle-top"></i></a> 

       <span id="def-up-count-{{$definition->id}}">{{$definition->ups}}</span> | 

       <a href="#" class="vote vote-down {{ $userVote or '' }}" id="def-down-{{$definition->id}}"><i class="glyphicon glyphicon-triangle-bottom"></i></a> 

       <span id="def-down-count-{{$definition->id}}">{{$definition->downs}}</span> | 

       {{$definition->user->name or __('show.unknownUser')}}

       {{__('show.singleDesc', [

         'created' => $definition->created_at->diffForHumans(),
         'updated' => $definition->updated_at->diffForHumans(),

       ])}}
       
       @can('update', $definition)
       
          | <a href="{{ route('editDefinition', $definition->id) }}">{{__('updateDefinition.edit')}}</a>
       
       @endcan
    </div>
  </div>
  
</div>  
  
<hr />

@endforeach

<div class="definition-suggest">
    
    @if( ! Auth::user() )
      
      <h3>{{__('show.suggestDefinition')}}</h3>
      <p>{{__('login.login')}} {{__('show.or')}} <a href="{{ route('register') }}">{{__('register.register')}}</a> {{__('show.toSuggestDefinition')}}</p>
      @include('auth.loginForm')
    
    @elseif ( ! Auth::user()->definitions->where('entry_id', $entry->id)->first() )
      
      <h3>{{__('show.suggestDefinition')}}</h3>
      @include('entry.suggestDefinition')
    
    @endif
    
</div>