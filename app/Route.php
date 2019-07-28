<?php  
class Route {
	
	protected $defaultController;
	protected $defaultMethod;
	
	protected $controller;
	protected $method;
	protected $parameters=array();

	
function __construct() {
	include 'config/router.php';
	$this->defaultController=$route["controller"];
	$this->defaultMethod=$route["method"];
	
	$this->ParseURL();
		
// loadings

	if (file_exists(CONTROLLER.$this->controller.'.php')) :
	
	require_once(CONTROLLER.$this->controller.'.php');
	
	$this->controller = new $this->controller;
	
			if (method_exists($this->controller,$this->method)) :
			
			
			if ($this->method=="details" || $this->method=="category") :
			
			
					if (count($this->parameters)<2) :
					
					header("Location:".URL);
					
					else:
					
				call_user_func_array([$this->controller,$this->method],$this->parameters);	
					
					endif;
					
					
			else:
			
			call_user_func_array([$this->controller,$this->method],$this->parameters);		
			
			
			
			
			endif;
			
				
			else:
			$this->defaultLOAD();
			endif;
	
	
	
	
	else:	
	$this->defaultLOAD();
	endif;




}

protected function ParseURL() {
	
	
	
		$url=isset($_GET["url"]) ? $_GET["url"]: null;		
		
		$url=rtrim($url,'/');		
		
		if (!empty($url)) :
		
		$url=explode('/',$url);
		
		$this->controller= isset($url[0]) ? $url[0] : $this->defaultController;
		$this->method=isset($url[1]) ? $url[1] : $this->defaultMethod;
		unset($url[0],$url[1]);		
		// products/details/10/tshirt
	
		$this->parameters= !empty($url) ? array_values($url) : array();
		
		else:
		$this->controller=  $this->defaultController;
		$this->method= $this->defaultMethod;
		$this->parameters=array();
		
		endif;
		
		


	
}


protected function defaultLOAD() {
	
require_once(CONTROLLER.$this->defaultController.'.php');
	
	$this->defaultController = new $this->defaultController;	
	
	
call_user_func_array([$this->defaultController,$this->defaultMethod],$this->parameters);	
	
}


}
?>
