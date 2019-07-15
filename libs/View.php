<?php  
class View {
  
  function __construct() 
  {
  

 
  }

  function show ($fileName){
    require 'views/'.$fileName.'.php';
  }
    

}




?>