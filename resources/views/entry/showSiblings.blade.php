<div class="panel panel-default">
  <div class="panel-heading">
  {{__('show.siblings')}}
  </div> 

  <ul class="list-group">
    @foreach($siblings as $sibling)
      <li class="list-group-item">{{$sibling->text}}</li>
    @endforeach
  </ul>

</div>

