@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      
      @if(isset($definitionLang))
        <dd lang="{{ $definitionLang }}">
      @else
        <dd lang="zh">
      @endif
          <p>{!! __(App\Helpers\TextHelper::addHashtags($definition->text)) !!}</p>
        </dd>

       @include('entry.singleVotes')

       <span class="definition-meta-user definition-meta">
          <i class="glyphicon glyphicon-user"></i> {{$definition->user->name or __('show.unknownUser')}} 
       </span>

       <span class="definition-meta-dates definition-meta">
         <i class="glyphicon glyphicon-calendar"></i> {{__('show.singleDesc', [

           'created' => $definition->created_at->diffForHumans(),
           'updated' => $definition->updated_at->diffForHumans(),

         ])}}
       </span>
       
       @can('update', $definition)
       
          | <a href="{{ route('editDefinition', $definition->id) }}">{{__('updateDefinition.edit')}}</a>
       
       @endcan
    </div>
  </div>
  
</div>

@endforeach

@include('entry.singleAddDefinition')