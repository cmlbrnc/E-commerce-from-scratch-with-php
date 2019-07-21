<?php  
class store extends Controller {

    function __construct() 
    { 
     
        parent::__construct();
        $this->LoadModel('store');
        $this->view->show("pages/index");

       
    }

  

}
