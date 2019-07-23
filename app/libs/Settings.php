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


	function seo($s) {
		$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
		$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','');
		$s = str_replace($tr,$eng,$s);
		$s = strtolower($s);
		$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
		$s = preg_replace('/\s+/', '-', $s);
		$s = preg_replace('|-+|', '-', $s);
		$s = preg_replace('/#/', '', $s);
		$s = str_replace('.', '', $s);
		$s = trim($s, '-');
		return $s;
	   }
	
}




?>