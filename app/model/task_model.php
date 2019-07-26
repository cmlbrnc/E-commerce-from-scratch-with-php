<?php

class task_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	
	
	function addcomment($tablename,$keys,$values) {
	
		return $this->db->add($tablename,$keys,$values);
	
		
		
	}
	
		function addNewsletter($tablename,$keys,$values) {
		    
			return $this->db->add($tablename,$keys,$values);
	
		
		
	}
	
			function iletisimForm($tabloisim,$sutunadlari,$veriler) {
		
		return $this->db->Ekle($tabloisim,$sutunadlari,$veriler);
	
		
		
	}
	
		

	

	
	

	

	
}




?>