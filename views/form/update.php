<?php require 'views/header.php' ?>

<div class="col-lg-12 text-center">
    <?php


    foreach ($data as $value) {
         
        $id = $value["id"];
        $name = $value["name"];
        $lastname = $value["lastname"];
        $age = $value["age"];
    }


    ?>

    <div class="row col-lg-4 mx-auto m-2 border bg-light">
        <div class="col-lg-12 border-bottom">Update  User Form</div>


        <form action="<?php echo URL;  ?>/user/updateuser" method="post">
            <div class="col-lg-6 p-2"> <label for="">Name:</label> </div>
            <div class="col-lg-6 p-2"> <input type="text" name="name" class="form-control" value=" <?php echo $name  ?>" /> </div>

            <div class="col-lg-6 p-2"> <label for="">Lastname:</label> </div>
            <div class="col-lg-6 p-2"> <input type="text" name="lastname" class="form-control" value=" <?php echo $lastname  ?>" /> </div>

            <div class="col-lg-6 p-2"> <label for="">Age:</label> </div>
            <div class="col-lg-6 p-2"><input type="text" name="age" class="form-control" value=" <?php  echo $age  ?>" /> </div>
            <input type="hidden" name="id" value=" <?php echo $id  ?>" />

            <div class="col-lg-12"> <input type="submit" name="button" value="Update" class="btn btn-success mb-2" /></div>


    </div>

    <?php require 'views/footer.php' ?>