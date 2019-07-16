<?php  
class Controller {
  
  function __construct() 
  {
    

      $this->view =new View();
  }
    
  
  // to add a model we need
  function LoadModel($name) {

    $path='model/'.$name.'_model.php';

    if(file_exists($path)) {
      require $path;
       $modelClassName=$name.'_model';
      $this->model =new  $modelClassName();
    }

  }

}




?>