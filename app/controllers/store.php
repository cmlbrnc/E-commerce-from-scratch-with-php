<?php  
class store extends Controller {

    function __construct() 
    { 
         parent::__construct();
        $this->LoadModel('store');
        Session::init();
        $this->view->show("pages/index",array(
            "data1"=>$this->model->mainPageProducts("products","where status=0 order by id desc LIMIT 6"),
            "data2"=>$this->model->mainPageProducts("products","where status=1 order by id desc ")
    ));
         
     
    
    }

    	
    



}
