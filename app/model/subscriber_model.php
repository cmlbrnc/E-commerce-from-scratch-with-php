<?php  

class subscriber_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";
    }

    function LoginController($tabloname,$condition) {
		
      return $this->db->logincontrol($tabloname,$condition);
    
      
      
      
    }
    
      
    function RegisterControl($tabloname,$keys,$values) {
     
      return $this->db->add($tabloname,$keys,$values);
    
      
      
    }
   
}





?>