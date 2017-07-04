<template>
<div class="row">

  <div class="col-xs-1 definition-votes">


  </div>
  
  <div class="col-xs-11 definition-body">
    <div class="definition-single">
      <p>Vue def text<p>
      <p>

       <a href="#" class="vote vote-up" id="def-up-1}}"><i class="glyphicon glyphicon-triangle-top"></i></a> 
       <span id="def-up-count-1">Vue Ups</span> | 

       <a href="#" class="vote vote-down" id="def-down-1"><i class="glyphicon glyphicon-triangle-bottom"></i></a> 

       <span id="def-down-count-1}}">Vue Downs</span> | Created 1 hour ago by Vue
       </p>
    </div>
  </div>

  <hr />

</div>  
  

</template>

<script>
    export default {
        mounted() {
            console.log('Component Definitions mounted.')
        }
    }
</script>
