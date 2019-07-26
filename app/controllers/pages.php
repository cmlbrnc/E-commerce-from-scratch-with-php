<?php

class pages extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	
	
	
	}	
	
	
	function contact() {
	
	$this->view->show("pages/contact");
		
	}
	
	function checkout() {
	
	$this->view->show("pages/checkout");
		
	}
	
	
	
	
}




?>