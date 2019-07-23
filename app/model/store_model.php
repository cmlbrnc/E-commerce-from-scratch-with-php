<?php  

class store_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";

    
     
    }

    
    function mainPageProducts($tablename,$condition) {
     
      return $this->db->listing($tablename,$condition);
    }

    
    

      
}




?>