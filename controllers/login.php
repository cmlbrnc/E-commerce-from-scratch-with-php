<?php  
class login extends Controller {

    function __construct() 
    {
        parent::__construct();

        $this->LoadModel('login');
     
    }

    function form() {
        $this->view->show("form/login");
    }
    function  logincontrol() {

         $name=$this->form->get('name')->isEmpty();
         $password=$this->form->get('password')->isEmpty();

        if(!empty($this->form->error)) {
      
            $this->view->show("form/result",
            $this->form->error,
            $this->response->error(false,"/login/form"));

         
                
          }else {
     
             
            // doto: send a object
         $result= $this->model->logincontrol("session"," name='$name' and password='$password'");
            
         
         if($result){
            header("Location:".URL."/panel");
            
         }else {
 
             $this->view->show("panel/result",$this->form->error,$this->response->error("no match","/login/form"));
                 // parent::error (false,"/user/add");

         }

       
          
           }



             
    
     
   
  
      }

}


?>