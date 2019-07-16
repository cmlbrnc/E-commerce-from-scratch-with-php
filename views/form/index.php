<?php require 'views/header.php' ?>
      
      <div class="col-lg-12">
          <form action="<?php  echo URL;  ?>/create/control" method="post">
              <input type="text" name="name" class="form-control">
              <input type="text" name="lastname" class="form-control">
              <input type="text" name="age" class="form-control">
              <input type="submit" name="button" Value="ADD" class="btn btn-success">
          </form>
      </div>
<?php require 'views/footer.php' ?>
     

