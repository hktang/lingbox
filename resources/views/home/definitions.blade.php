@foreach ($randomEntry->definitions->sortByDesc('ups')->take(3) as $definition)
<div class="row">
  
  <div class="col-xs-12 definition-body">
    <div class="definition-single">
      <p>{!! nl2br(e($definition->text)) !!}<p>
    </div>
  </div>
  
</div>
  
<hr />
@endforeach
