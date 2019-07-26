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
	$date=date("d-m-Y");	
	if (!empty($this->form->error)) {
        echo $this->response->res("danger","Please fill out all fields");
	}else {

		$result=$this->model->addcomment("comments",
		array("productid","name","context","date"),
		array($productid,$name,$comment,$date));
	
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
	
	function iletisim() {
		
	$ad=$this->form->get("ad")->bosmu();
	$mail=$this->form->get("mail")->bosmu();
	$konu=$this->form->get("konu")->bosmu();
	$mesaj=$this->form->get("mesaj")->bosmu();
	
	
	@$this->form->GercektenMailmi($mail);	
	$tarih=date("d-m-Y");
		
	if (!empty($this->form->error)) :
	
	echo $this->bilgi->uyari("danger","LÜTFEN TÜM BİLGİLERİ UYGUN GİRİNİZ");

	else:
	

	
		$sonuc=$this->model->iletisimForm("iletisim",
		array("ad","mail","konu","mesaj","tarih"),
		array($ad,$mail,$konu,$mesaj,$tarih));
	
		if ($sonuc==1):
	

		
		echo $this->bilgi->uyari("success","Mesajınız Alındı. En kısa sürede Dönüş yapılacaktır. Teşekkür ederiz",'id="formok"');
		
		else:
		
		
	
		echo $this->bilgi->uyari("danger","HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");
		
		endif;
	
	endif;

		
	}
	

	

	
}




?>