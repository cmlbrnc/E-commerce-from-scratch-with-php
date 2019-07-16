<?php  

class Database extends PDO {
    
    protected $array; ///this is our var in our class

    function __construct()
    {
        parent::__construct('mysql:host=127.0.0.1;dbname=db_mvcproject','root','');
    }


     function add($tablename,$keys,$values) {

      $columnlenght =count($keys);

      for ($i=0; $i <$columnlenght ; $i++) { 

          $this->array[]='?';
        
      }
      //print_r($this->array);
      $columnValues=join(",",$this->array);
     // echo $columnValues;

      $columnnames=join(",",$keys);

      

      $query=$this->prepare('insert into '.$tablename.' ('.$columnnames.') VALUES('.$columnValues.')');

      $query->execute($values);
      if($query) {

        return "success"; 
      }
      else {
        return "failed";
      }

    }

}






?>