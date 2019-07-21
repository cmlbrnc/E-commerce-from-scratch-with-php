<?php  
class View {
  
  function show ($fileName,$data=null,$redirect=null){
    require 'views/'.$fileName.'.php';
  }
    
}

?>