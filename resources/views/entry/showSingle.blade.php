@foreach ($entry->definitions->sortByDesc('ups')->take(5) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      <p>{!! nl2br(e($definition->text)) !!}<p>
      <p>

       @include('entry.singleVotes')

       | 

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

@include('entry.singleAddDefinition')