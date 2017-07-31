@foreach ($randomEntry->definitions->sortByDesc('ups')->take(3) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      <p>
      @if(isset($definitionLang))
        <dd lang="{{ $definitionLang }}">
      @else
        <dd lang="zh">
      @endif
           {!! __(App\Helpers\TextHelper::addHashtags($definition->text)) !!}
        </dd>
      </p>
    </div>
  </div>
  
</div>
@endforeach
