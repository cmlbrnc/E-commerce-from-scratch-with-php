<?php  

class Database extends PDO {
    
    protected $array; ///this is our var in our class
    protected $array2; 

    function __construct()
    {
        parent::__construct('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

        $this->res =new _response();
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
       
      
     
      if($query->execute($values)) {
    
        return 1; 
      }
      else {
        return 0; 
      }

    }

    function listing ($tablename,$condition=false) {
        
      if($condition==false) {
    
        
         $query ="select *from ".$tablename;
         
      
      }else {
      
        $query ="select *from ".$tablename." ".$condition;


      }
      // print_r($query);   
     
      $end=$this->prepare($query);
      if($end->execute()){
        return $end->fetchAll();
       
      }else {
        return 0;
      }

     
      

    }
    function search ($tablename,$condition) {

  

        $query ="select *from ".$tablename." where ".$condition;


      $end=$this->prepare($query);
      $end->execute();

      return $end->fetchAll();

    }

    function delete ($tablename,$id) {

      $query ="delete from ".$tablename." where ".$id;

      $end=$this->prepare($query);

    
      if($end->execute())
      {
        return true; 

      }else {

        return false; 

      }
    

    }


    function update ($tablename,$columns,$data,$condition) {

       foreach ($columns as $value) {
         $this->array2[]=$value."=?";
       }

       $lastColumns=join(",",$this->array2);
      


      $query ="update ".$tablename." set ".$lastColumns." where ".$condition;

      $end=$this->prepare($query);
      if($end->execute($data))
      {
        return 1; 

      }else {

      

        return false; 

      }
    

    }

    function logincontrol($tablename,$condition) {

      // important dotos
      $query ="select * from ".$tablename." where ".$condition;


      $final=$this->prepare($query);
     
      if( $final->execute()){
       
        return $final->fetchAll();
      }else {
          return false;
      }

     
    }


    function completeOrder($data=array()) {
     
      
    
     
		
      $query=$this->prepare('insert into orders (order_no,addressid,subsid,name,quantity,price,totalprice,payment_type,date)
      VALUES(?,?,?,?,?,?,?,?,?)'); 
      
      
      $query->execute($data);
      
      
      
    }

}






?>