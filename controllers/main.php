<?php  
class main extends Controller {

    function __construct() 
    {
        parent::__construct();

        $this->view->show("index/index");
    
    }

    function next () {
        $this->LoadModel('p');
    }

}




?>