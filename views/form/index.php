<?php require 'views/header.php' ?>

<div class="col-lg-12 text-center">
 	
    
     <div class="row col-lg-4 mx-auto m-2 border bg-light">
            <div class="col-lg-12 border-bottom">Add New User Form</div>
       
           
                <form  action="<?php  echo URL;  ?>/user/addnew" method="post">
                <div class="col-lg-6 p-2"> <label for="">Name:</label>  </div>
                <div class="col-lg-6 p-2">  <input type="text" name="name"   class="form-control"/> </div>
          
                <div class="col-lg-6 p-2">  <label for="">Lastname:</label> </div>
                    <div class="col-lg-6 p-2"> <input type="text" name="lastname"   class="form-control"/> </div>
          
                    <div class="col-lg-6 p-2">   <label for="">Age:</label>  </div>
                    <div class="col-lg-6 p-2"><input type="text" name="age"   class="form-control"/> </div>
          
          <div class="col-lg-12"> <input type="submit" name="button" value="ADD"  class="btn btn-success mb-2"  /></div>

     
     </div>
      
  
<?php require 'views/footer.php' ?>





     

