<?php  

class user_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";
    }


    function check($tablename,$columns,$values) {

      return $this->db->add($tablename,$columns,$values);

    }
    function list($tablename,$condition) {

      return $this->db->listing($tablename,$condition);

    }
    function deleteuser($tablename,$id) {

      return $this->db->delete($tablename,$id);

    }




   
      
}




?>