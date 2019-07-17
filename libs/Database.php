<?php  

class Database extends PDO {
    
    protected $array; ///this is our var in our class

    function __construct()
    {
        parent::__construct('mysql:host=127.0.0.1;dbname=db_mvcproject','root','');

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

      $query->execute($values);
      if($query) {

        return $this->res->success("Succesfully Added","/user/add"); 
      }
      else {
        return $this->res->failed("Db error has been occured","/user/add"); 
      }

    }

    function listing ($tablename,$condition=false) {

      if($condition=false) {

        $query ="select *from ".$tablename;

      }else {

        $query ="select *from ".$tablename." ".$condition;



      }

      $end=$this->prepare($query);
      $end->execute();

      return $end->fetchAll();

    }

    function delete ($tablename,$id) {

      $query ="delete from ".$tablename." where id=".$id;

      $end=$this->prepare($query);
      if($end->execute())
      {
        return $this->res->success("Succesfully Deleted","/user/listing"); 

      }else {

        $query->errorInfo();

        return $this->res->failed($query,"/user/listing"); 

      }
    

    }

}






?>