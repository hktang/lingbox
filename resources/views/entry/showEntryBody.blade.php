<div class='ruby'>
  <p class="entry-meta-ruby">
      {{$entryRuby}}
  </p>
</div>

<h1 id="entry-text"><dt lang="zh">{{$entry->text}}</dt></h1>

<p>

  <span class="entry-meta-user entry-meta">
    <i class="glyphicon glyphicon-user"></i> {{$entryCreator}} 
  </span>

  <span class="entry-meta-date entry-meta">
   <i class="glyphicon glyphicon-calendar"></i> {{ $entry->created_at->diffForHumans() }} 
  </span>

</p>