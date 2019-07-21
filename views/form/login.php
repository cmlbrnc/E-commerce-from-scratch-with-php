<?php require 'views/header.php' ?>

<div class="col-lg-12 text-center">


    <div class="row col-lg-4 mx-auto m-2 border bg-light">
        <div class="col-lg-12 border-bottom">Login </div>


        <form action="<?php echo URL;  ?>/login/logincontrol" method="post">

            <div class="col-lg-6 p-2"> <label for="">Username:</label> </div>
            <div class="col-lg-6 p-2"> <input type="text" name="name" class="form-control" /> </div>
            <div class="col-lg-6 p-2"> <label for="">Password:</label> </div>
            <div class="col-lg-6 p-2"> <input type="password" name="password" class="form-control" /> </div>

            <div class="col-lg-12"> <input type="submit" name="button" value="Log in" class="btn btn-success mb-2" /></div>


    </div>


<?php require 'views/footer.php' ?>