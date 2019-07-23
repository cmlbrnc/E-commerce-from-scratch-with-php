<?php

class products_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	function getDb($tabloname,$condition) {
		
		return $this->db->listing($tabloname,$condition);
		
	}
	
	

	
	

	

	
}




?>