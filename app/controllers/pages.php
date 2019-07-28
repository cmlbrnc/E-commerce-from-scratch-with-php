<?php

class pages extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		Session::init();
		
	
	
	
	}	
	
	
	function contact() {
	
	$this->view->show("pages/contact");
		
	}
	
	function delivery() {
	
	$this->view->show("pages/other/delivery");
		
	}
	function refund() {
	
	$this->view->show("pages/other/refund");
		
	}
	function customerservice() {
	
	$this->view->show("pages/other/customer-service");
		
	}
	function termconditions() {
	
	$this->view->show("pages/other/term-conditions");
		
	}
	function privacypolicy() {
	
	$this->view->show("pages/other/privacy-policy");
		
	}
	
	function completeorder() {
	
	$this->view->show("pages/complete");
		
	}

	function checkout() {
	
	$this->view->show("pages/checkout");
		
	}
	
	
	
	
}




?>