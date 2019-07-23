<?php  

class Settings  extends Model{

   public $result,$title,$description,$keywords,$sloganUp1,$sloganDown1,$sloganUp2,$sloganDown2,$sloganUp3,$sloganDown3;
	
	
	
	
	function __construct() {	
	
	parent::__construct();
	
	$this->result=$this->db->listing("settings");
	
	
	
	$this->title=$this->result[0]["title"];
	$this->description=$this->result[0]["description"];
	$this->keywords=$this->result[0]["keywords"];
	$this->sloganUp1=$this->result[0]["sloganUp1"];
	$this->sloganDown1=$this->result[0]["sloganDown1"];
	$this->sloganUp2=$this->result[0]["sloganUp2"];
	$this->sloganDown2=$this->result[0]["sloganDown2"];
	$this->sloganUp3=$this->result[0]["sloganUp3"];
	$this->sloganDown3=$this->result[0]["sloganDown3"];
		
	
		
	}
	
}




?>