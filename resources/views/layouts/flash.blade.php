@if ( session('success') )
  <div class="alert alert-success .fade .in system-alert">

      <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"> </span> 
      
      {{ session('success') }}

      <a href="#" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</a>
      
  </div>
@elseif ( session('warning') )
  <div class="alert alert-warning .fade .in system-alert">

      <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"> </span> 
      
      {{ session('warning') }}

      <a href="#" class="close" data-dismiss="alert" aria-label="close" aria-hidden="true">&times;</a>
      
  </div>
@endif