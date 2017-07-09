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