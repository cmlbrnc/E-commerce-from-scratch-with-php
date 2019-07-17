<?php  
class user extends Controller {

    function __construct() 
    { 

        parent::__construct();

        

        $this->LoadModel('user');

    }
    
    function add(){
      $this->view->show("form/index");
    }

    function listing(){
      $result= $this->model->list("students","order by id desc");
      $this->view->show("form/listing",$result);
    
    }
    function delete($id){
   
      $result= $this->model->deleteuser("students",$id);
      $this->view->show("form/result",$result);
    
    }




      // this is a relation with db
    function addnew() {
      
     $name=$this->form->get('name')->isEmpty();
     $lastname=$this->form->get('lastname')->isEmpty();
     $age=$this->form->get('age')->isEmpty();

     if(!empty($this->form->error)) {
     
       $this->view->show("form/result",$this->form->error);

     }else {


       // doto: send a object
       $result= $this->model->check("students",array("name","lastname","age"),array($name,$lastname,$age));
       
       $this->view->show("form/result",$result);


     }

     
     
         
       
    }

   

}




?>