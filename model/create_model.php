<?php  

class create_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";
    }


    function check($tablename,$columns,$values) {

      return $this->db->add($tablename,$columns,$values);

    }




   
      
}




?>