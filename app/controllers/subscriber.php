<?php  
class subscriber extends Controller {

    function __construct() 
    { 
         parent::__construct();
        $this->LoadModel('subscriber');

        Session::init();
      
   
    }

    function login() {
   
        $this->view->show("pages/login",array("header"=>$this->model->setting()));
     
    
    }
    function register() {
		
	
        $this->view->show("pages/register");
            
        }
        
  
	
	function registercontrol() {
		
        $name=$this->form->get("name")->isEmpty();
        $lastname=$this->form->get("lastname")->isEmpty();
        $email=$this->form->get("email")->isEmpty();
        $password=$this->form->get("password")->isEmpty();
        $repassword=$this->form->get("repassword")->isEmpty();
        $tel=$this->form->get("tel")->isEmpty();	
        $this->form->isRealEmail($email);	
        $password=$this->form->passwordMatch($password,$repassword);
        
        
        
        if (!empty($this->form->error)) :
        
    
        $this->view->show("pages/register",array("error"=>$this->form->error));

       
        
        
        else:
        
    
        
        $result=$this->model->registercontrol("subscribers",
        array("name","lastname","email","password","phone"),
        array($name,$lastname,$email,$password,$tel));
          
    
            if ($result==1):
        
        
            $this->view->show("pages/register",
            array("info" =>$this->response->res("success","Account has been successfully created.")));
            
            
            
            else:
            
            $this->view->show("pages/register",
            array("info" => 
            $this->response->res("danger","An error occured whilst registiration.")));
            
            
            
            
            endif;
        
        endif;
        
        
        
            
        } // REgister Control
        
        
        
        function logout() {
               
                Session::destroy();			
                $this->response->redirect("/store");
            
        } // ÇIKIŞ
        
        
        function logincontrol() {
            
        $name=$this->form->get("name")->isEmpty();
        $password=$this->form->get("password")->isEmpty();
        
        
        if (!empty($this->form->error)) {

            $this->view->show("pages/login",array("info" =>$this->response->res("warning","Username and Password cant be empty")));


        }else {

             //**db control
        
        $result=$this->model->LoginController("subscribers"," name='$name' and password='$password' ");
        
        if ($result==1) {

          

            $this->response->redirect("/store");

            }else {

            $this->view->show("pages/login",
            array("info" =>$this->response->res("warning","Username and password are wrong")));
    
            



                    }
       
        
        
        
       


            }
    
    
      
        
            
        } // login control



}
