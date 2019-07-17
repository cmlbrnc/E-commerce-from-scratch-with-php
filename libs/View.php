<?php  
class View {
  
  function __construct() 
  {
  

 
  }

  function show ($fileName,$data=null){
    require 'views/'.$fileName.'.php';
  }
    

}




?>