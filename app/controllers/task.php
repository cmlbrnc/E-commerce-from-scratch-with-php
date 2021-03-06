<?php

class task extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
	$this->LoadModel('task');
	
	
	}	
	
	function commentcontrol() {

	
	$name=$this->form->get("name")->isEmpty();
	$comment=$this->form->get("comment")->isEmpty();
	$productid=$this->form->get("productid")->isEmpty();
	$subsid=$this->form->get("subsid")->isEmpty();
	$date=date("d-m-Y");	
	if (!empty($this->form->error)) {
        echo $this->response->res("danger","Please fill out all fields");
	}else {

		$result=$this->model->addcomment("comments",
		array("subsid","productid","name","context","date"),
		array($subsid,$productid,$name,$comment,$date));
	
		if ($result==1):

		echo $this->response->res("success","Your comment is successfully added",'id="ok"');
		
		else:
		
		
	
		echo $this->response->res("danger","HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");
		
		endif;

	}
	
	
	} // COMMENT CONTROL 
	
	
	
	function newslettercontrol() {
	
	$email=$this->form->get("email")->isEmpty();	
	$this->form->isRealEmail($email);	
	$date=date("d-m-Y");
		
	if (!empty($this->form->error)) :
	
	echo $this->response->res("danger","Email is not valid.");

	else:
	

	
		$result=$this->model->addNewsletter("emails",
		array("email","date"),
		array($email,$date));
	
		if ($result==1):
	

	
		echo $this->response->res("success","You have been succesfully registered our newsletter",'id="newsletterok"');
		
		else:
		
		
	
		echo $this->response->res("danger","An error occured. Please try to register later.");
		
		endif;
	
	endif;
	
	
	
		
	} // newsletter control
	
	function contact() {
		
	$name=$this->form->get("name")->isEmpty();
	$email=$this->form->get("email")->isEmpty();
	$subject=$this->form->get("subject")->isEmpty();
	$message=$this->form->get("message")->isEmpty();
	
	
	@$this->form->isRealEmail($email);	
	$date=date("d-m-Y");
		
	if (!empty($this->form->error)) :
	
	echo $this->response->res("danger","LÜTFEN TÜM BİLGİLERİ UYGUN GİRİNİZ");

	else:
	

	
		$result=$this->model->contactForm("contact",
		array("name","email","subject","message","date"),
		array($name,$email,$subject,$message,$date));
	
		if ($result==1):
	

		
		echo $this->response->res("success","Your message has been sent",'id="contactok"');
		
		else:
		
		
	
		echo $this->response->res("danger","An error occured.");
		
		endif;
	
	endif;

		
	}
	

	function AddtoCart() {
	

		
		Cookie::addtoCart($this->form->get("productid")->isEmpty(),$this->form->get("number")->isEmpty());
		
	}
	
	function removeproduct() {
	
		if ($_POST) :
		
		Cookie::removeProduct($_POST["productid"]);
		endif;	
	}

	
	
	function updatecart () {
		if ($_POST) :		
		Cookie::UpdateCart($_POST["productid"],$_POST["number"]);
		endif;	
	}
	
	function dropcart () {
		
		$this->response->redirect("/pages/checkout");
		
		Cookie::removeAll()();
		
	}
	
	
	function checkoutcontrol() {
		
		echo '<a href="'.URL.'/pages/checkout">
		<h3> <img src="'.URL.'/views/design/images/bag.png" alt=""> </h3>
							
                            
		<p>';
		
		
		
		if (isset($_COOKIE["product"])) :
		
			echo count($_COOKIE["product"]);
			
			
			else:
			
			echo "Empty Cart";
		endif;
		
		
	
		
		echo'</p></a>';
	
	
		
	}

	
}
