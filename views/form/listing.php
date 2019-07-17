<?php require 'views/header.php' ?>

<table class="table table-bordered mt-2">
    <thead>
        <tr class="font-weight-bold">
            <td>#İD</td>
            <td>Name</td>
            <td>Lastname</td>
            <td>Age</td>
            <td>Operation</td>

        </tr>
    </thead>
    <tbody>


        <?php 
        if (is_array($data)) {
            foreach ($data as $value) {
                echo '<tr>

            <td>'.$value["id"].'</td>
            <td>'.$value["name"].'</td>
            <td>'.$value["lastname"].'</td>
            <td>'.$value["age"].'</td>
            <td>  <a href="'.URL.'/user/update/'.$value["id"].'" class="btn btn-success">Update</a> |
            <a href="'.URL.'/user/delete/'.$value["id"].'" class="btn btn-danger">Delete</a>  </td>
                        </tr>';
            }
        }





        ?>

    


    </tbody>


</table>

<div class="col-lg-12 text-center">








</div>




<?php require 'views/footer.php' ?>