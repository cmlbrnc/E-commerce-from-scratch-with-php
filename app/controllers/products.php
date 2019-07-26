<?php

class products extends Controller  {
	
	
	function __construct() {
		parent::__construct();
		
		
	Session::init();	
	
	$this->LoadModel('products');

	
	}	
	
	
	function details($id,$name) {

		 $result=$this->model->getDb("products","where id=".$id);
		
	
		$this->view->show("pages/single",
		 array(
		 "data1" => $result,
		 "data2" => $this->model->getDb("products","where catid=".$result[0]["catid"]." and id<>$id and stock < 200 order by stock asc LIMIT 10 "),
		"data3" =>$this->model->getDb("products","where catid=".$result[0]["catid"]." and id<>$id  LIMIT 3"),
		"data4" =>$this->model->getDb("comments","where productid=$id and status=0") 
		));
		
	
		
	}
	
	function category($id,$name) {
		
		$result=$this->model->getDb("products","where catid=".$id);
		$findChildCat=$this->model->getDb("alt_category","where id=".$id);
		//13
		
	
		
		$this->view->show("pages/products",
		array(
		"data1" => $result,
		"data2" => $this->model->getDb("alt_category",
		"where child_cat_id=".$findChildCat[0]["child_cat_id"]." and id<>$id"),
		"data3" =>$this->model->getDb("products","where catid=".$id." "), 
		));
		
		
		/*
		"data2" => $this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id and stok < 200 order by stok asc LIMIT 10 "),
		"data3" =>$this->model->uruncek("urunler","where katid=".$sonuc[0]["katid"]." and id<>$id  LIMIT 3"),
		"data4" =>$this->model->uruncek("yorumlar","where urunid=$id and durum=1"
		*/

		
		
	}

	
}




?>