<?php  
class boots {

    function __construct() 
    {
        $url=isset($_GET["url"]) ? $_GET["url"]:null;
        $url=rtrim($url,"/");
        $url=explode("/",$url);
        
        /*
        echo $url[0]."<br>"; controoler
        echo $url[1]."<br>"; method
        echo $url[2]."<br>"; value
        */
        if(empty($url[0])){
          require 'controllers/main.php';

          $controller = new main();

        }
        $file='controllers/'.$url[0].'.php';
        
         if(file_exists($file)) {
        
            require $file;
            $maincontroller = new $url[0];
            if(isset($url[2])) {
        
            
        
                $maincontroller->{$url[1]}($url[2]);
               
                
            
              }else {
            
            
                if(isset($url[1])) {
            
                
            
                    $maincontroller->{$url[1]}();
                
                  }
              }
        
         }else{
        
        
            require 'controllers/errors.php';

            $err= new errors();




        
            
        
         }
        
        
    }

}




?>