<?php  

class Form extends _response  {
  


  public $value,$data;
  public $error=array();

  
  function get ($key) {

    $this->value=$key;

    $this->data=htmlspecialchars(strip_tags($_POST[$key]));

    return $this;

    
  }

  function isEmpty() {
      if(empty($this->data)) {

        $this->error[]=$this->value." cannot be empty.";

        
        return $this;

      }else {
          return $this->data;
      }
      
  }

    
}



?>