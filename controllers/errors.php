<?php  

class errors extends Controller{

    function __construct( )
    {  
        parent::__construct();
        
        $this->view->message="this is a response from var...";
        $this->view->show("error/index");
      
    }

}




?>