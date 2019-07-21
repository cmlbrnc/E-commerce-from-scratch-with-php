<?php  
class panel extends Controller {

    function __construct() 
    {

        parent::__construct();
        Session::init();
        if(Session::get("username")==false) {
            Session::destroy();
            header("Location:".URL."/login/form");
            exit;
        }else {
            $this->view->show("panel/index");
        }
    
    
    }
    function logout() {
        Session::destroy();
        header("Location:".URL."/login/Form");
    }

   


  
}




?>