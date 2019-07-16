<?php  
class create extends Controller {

    function __construct() 
    { 

        parent::__construct();

        $this->view->show("form/index");

        $this->LoadModel('create');

    }
      // this is a relation with db
    function control() {

      $name=$_POST['name'];
      $lastname=$_POST['lastname'];
      $age=$_POST['age'];
         
        // doto: send a object
       $result= $this->model->check("students",array("name","lastname","age"),array($name,$lastname,$age));
       
       //do to things
       $this->view->message=$result;
       $this->view->show("form/result");
    }

   

}




?>