<ul class="list-group">

  <li class="list-group-item">
    
    {{__('dashboard.mostPopularEntry')}}

    <a href="{{ route('showEntryByText', $siteEntries['mostPopularEntry']->text) }}">
      {{__($siteEntries['mostPopularEntry']->text)}}
    </a>

    <span class="label label-default"><i class="glyphicon glyphicon-thumbs-up"></i> 
      {{ $siteEntries['mostPopularEntry']->ups }}
    </span>

  </li>


  <li class="list-group-item">
    
    {{__('dashboard.leastPopularEntry')}}

    <a href="{{ route('showEntryByText', $siteEntries['leastPopularEntry']->text) }}">
      {{__($siteEntries['leastPopularEntry']->text)}}
    </a>

    <span class="label label-default"><i class="glyphicon glyphicon-thumbs-down"></i> 
      {{ $siteEntries['leastPopularEntry']->downs }}
    </span>

  </li>

  
  <li class="list-group-item">
    
    {{__('dashboard.oldestLonelyEntry')}}

    <a href="{{ route('showEntryByText', $siteEntries['oldestLonelyEntry']->text) }}">
      {{__($siteEntries['oldestLonelyEntry']->text)}}
    </a>

    <span class="label label-default"><i class="glyphicon glyphicon-thumbs-down"></i> 
      {{ $siteEntries['oldestLonelyEntry']->downs }}
    </span>

  </li>



</ul>