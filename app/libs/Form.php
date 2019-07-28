<?php  

class Form extends _response  {
  


  public $value,$data;
  public $error=array(),$result=array();

  
  function get ($key) {

    $this->value=$key;

    $this->data=htmlspecialchars(strip_tags($_POST[$key]));

    return $this;

    
  }

  function isEmpty() {
      if(empty($this->data)) {

        $this->error[]=$this->value." cannot be empty.";

        
        return $this;

      }else {
          return $this->data;
      }
      
  }

  function isRealEmail($email) {		
		
						
    getmxrr(substr($email,strpos($email,'@')+1),$this->result);
    
    if (!count($this->result)>0):
    
   
      $this->error[]="Email is not valid.";

    
    endif;	
  
   
    
  } // mail controller	
  
function encode($data) {
    
    return base64_encode(gzdeflate(gzcompress(serialize($data))));
        
    
  } // data encode
  
function decode($data) {
    
    return unserialize(gzuncompress(gzinflate(base64_decode($data))));
  } // data decode		
  
function passwordMatch($value1,$value2) {
    
    if ($value1!=$value2) :
    
    $this->error[]="Passwords are not matching.";	
    
    
    else:
    
    return $this->encode($value1);
    
    endif;
    
    
    
  } // matching
  
  
public static function element_init($criteria,array $data=NULL) {
  
  /*
  1 form
  2 input
  3 textarea	
  
  */
  switch ($criteria):
    
  case "1": echo '<form ';	break;
  case "2": echo '<input ';	break;
  case "3": echo '<textarea '; break;		
  case "close": echo '</form> '; break;		
  endswitch;		
  
    
  
  foreach ($data as $key => $value) :
  
  echo $key."='".$value."' ";	
      
  endforeach;
  
  echo ($criteria==3) ? '></textarea>' : '>'; // ternany
 
 
}

    
}



?>