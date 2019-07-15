<?php  
class settings extends Controller {

    function __construct() 
    { 

        parent::__construct();
        
        echo "<br>";
        echo "Hello.You are in settings<br>";

    }

     function next($value=false) {

        echo "Hello.You are in the next <br> ";
        if($value)echo "Incoming Value: ".$value."<br>";  

    }

}




?>