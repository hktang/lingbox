@foreach ($randomEntry->definitions->sortByDesc('ups')->take(3) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      <p>{!! __(App\Helpers\TextHelper::addHashtags($definition->text)) !!}</p>
    </div>
  </div>
  
</div>
  
<hr />
@endforeach
