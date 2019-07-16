<?php  
class listing extends Controller {

    function __construct() 
    { 

        parent::__construct();

        $this->view->show("index/index");

        $this->LoadModel('listing');
      

    }

    

   

}




?>