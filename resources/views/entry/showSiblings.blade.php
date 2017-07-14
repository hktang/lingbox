<div class="panel panel-default">
  <div class="panel-heading">
  {{__('show.siblings')}}
  </div> 

  <ul class="list-group">  
    @foreach($eSiblings as $eSibling)
      <li class="list-group-item">
        <a href="{{route('showEntry', ['id' => $eSibling->id])}}">
          {{$eSibling->text}}
        </a>
      </li>
    @endforeach
      <li class="list-group-item">{{$entry->text}}</li>
    @foreach($ySiblings as $ySibling)
      <li class="list-group-item">
        <a href="{{route('showEntry', ['id' => $ySibling->id])}}">
          {{$ySibling->text}}
        </a>
      </li>    
    @endforeach
  </ul>

</div>

