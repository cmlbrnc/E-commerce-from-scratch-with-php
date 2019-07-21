<?php  

class login_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";
    }

    function  logincontrol($tablename,$condition) {
     
      return $this->db->logincontrol($tablename,$condition);

    }




   
      
}




?>