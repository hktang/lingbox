@foreach ($randomEntry->definitions->sortByDesc('ups')->take(3) as $definition)
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
    </div>
  </div>
  
</div>
  
<hr />
@endforeach
