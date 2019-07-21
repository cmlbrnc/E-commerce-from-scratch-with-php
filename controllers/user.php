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

     // this is a relation with db
     function addnew() {
      
      $name=$this->form->get('name')->isEmpty();
      $lastname=$this->form->get('lastname')->isEmpty();
      $age=$this->form->get('age')->isEmpty();
 
      if(!empty($this->form->error)) {
      
        $this->view->show("form/result",$this->form->error,$this->response->error(false,"/user/add"));
 
      }else {
 
 
        // doto: send a object
        $result= $this->model->check("students",array("name","lastname","age"),array($name,$lastname,$age));
        
        $this->view->show("form/result",$result);
       }
     }
 

    function listing(){
      $result= $this->model->list("students","order by id desc");
      $this->view->show("form/listing",$result);
    
    }
    function search(){

       $word=$this->form->get('word')->isEmpty();

      if(!empty($this->form->error))  {
        $this->view->show("form/result",$this->form->error);
      }else {

        $result= $this->model->searchuser("students"," name LIKE '%".$word."%'");

     
        $this->view->show("form/listing",$result);

      }
  
    }
    function delete($id){
   
      $result= $this->model->deleteuser("students",$id);
      $this->view->show("form/result",$result);
    
    }
    function update($id){
       
      $result= $this->model->list("students "," where id=".$id); 
     
       $this->view->show("form/update",$result);
    
    }
    function updateuser(){
       
      $name=$this->form->get('name')->isEmpty();
      $lastname=$this->form->get('lastname')->isEmpty();
      $age=$this->form->get('age')->isEmpty();
      $id=$this->form->get('id')->isEmpty();
 
      if(!empty($this->form->error)) {
      
        $this->view->show("form/result",$this->form->error);
 
      }else {
 
 
        // doto: send a object
        $result= $this->model->updateuser("students",array("name","lastname","age"),array($name,$lastname,$age),"id=".$id);
        
        $this->view->show("form/result",$result);
     }
    
    }

}
