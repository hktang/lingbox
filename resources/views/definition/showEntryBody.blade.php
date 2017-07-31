<h1 id="entry-text"><dt lang="zh">{{$definition->entry->text}}</dt></h1>

<p>

  <span class="entry-meta-user entry-meta">
    <i class="glyphicon glyphicon-user"></i> {{$definition->entry->user->name}} 
  </span>

  <span class="entry-meta-date entry-meta">
   <i class="glyphicon glyphicon-calendar"></i> {{ $definition->entry->created_at->diffForHumans() }} 
  </span>

</p>