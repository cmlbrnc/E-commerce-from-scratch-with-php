<?php  

class subscriber_model extends Model{

    function __construct() 
    {
      parent::__construct();
     // echo "inserting  ";
    }

    function LoginController($tablename,$condition) {
		
      return $this->db->logincontrol($tablename,$condition);
    
      
      
      
    }
    
      
    function RegisterControl($tablename,$keys,$values) {
     
      return $this->db->add($tablename,$keys,$values);
    
      
      
    }


  
    function getList($tablename,$condition) {
      
      return $this->db->listing($tablename,$condition);
    
      
      
    }
    
    function Delete($tablename,$condition) {
            
      return $this->db->delete($tablename,$condition);
    
      
      
    }
    
   
    
    function update($tablename,$columns,$data,$condition) {
      
      
      return $this->db->update($tablename,$columns,$data,$condition);
    }
    
    
    function sifreGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {
      
      
      return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
    }
    
    
    
    function get($tablename,$condition) {
     
    return $this->db->listing($tablename,$condition);
      
    } // get
    
    function TopluislemBaslat() {		
    return $this->db->beginTransaction();	
      
    }
    
    function TopluislemTamamla() {
    return $this->db->commit();
    }
    
    
    
    function SiparisTamamlama($veriler) {
    
    return $this->db->siparisTamamla($veriler);
      
    } // SİPARİŞ TAMAMLAMA
   
}





?>