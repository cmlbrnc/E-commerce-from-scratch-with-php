<?php  
class View {
  
  function show ($fileName,array $data=NULL){
    require 'views/'.$fileName.'.php';

  }
    
}

?>