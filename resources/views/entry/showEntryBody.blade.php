<h1 id="entry-text">{{$entry->text}}</h1>
<p class='ruby'><i class="glyphicon glyphicon-bullhorn"> </i> {{$entryRuby}}</p>

<p>

  {{__('show.entryCreatedBy', [

      'creator' => $entryCreator, 
      'created' => $entry->created_at->diffForHumans()

  ])}} 
</p>