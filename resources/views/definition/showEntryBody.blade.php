<dt lang="zh"><h1 id="entry-text">{{$definition->entry->text}}</h1></dt>

<p>

  {{__('show.entryCreatedBy', [

      'creator' => $definition->entry->user->name, 
      'created' => $definition->entry->created_at->diffForHumans()

  ])}} 
</p>