<?php require 'views/header.php';  ?>


<?php

/* BU SAYFANIN GÖRÜNTÜLENMESİNDE OTURUM KONTROLÜ YANI SIRA SEPETTE ÜRÜN VARMI DİYE KONTROL
EDİLECEK VE SEPETTE ÜRÜN YOK İSE BU SAYFA GÖRÜNTÜLENEMEYECEK */

if (isset($_COOKIE["product"])) :




    if (Session::get("username") && Session::get("subsid")) :




      Session::sessionControl(Session::get("username"),Session::get("subsid"));

        ?>

        <div class="container" id="#complete-order">

            <div class="row">

                <div class="col-md-7" id="left-side">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="row" id="subscription">
                                <div class="col-md-12">
                                    <h4>Account Info</h4>
                                </div>
                                <?php Form::element_init("1", array("method" => "POST", "action" => URL . "/subscriber/ordercompleted")) ?>


                                <?php $result = $settings->getSubsInfo(); ?>
                                <div class="col-md-3" id="label">Name</div>
                                <div class="col-md-9" id="input"><?php Form::element_init("2", array("type" => "text", "id" => "name", "name" => "name", "value" => $result[0]["name"], "class" => "form-control")) ?></div>
                                <div class="col-md-3" id="label">Lastname</div>
                                <div class="col-md-9" id="input"><?php Form::element_init("2", array("type" => "text", "id" => "lastname", "name" => "lastname", "value" => $result[0]["lastname"], "class" => "form-control")) ?></div>

                                <div class="col-md-3" id="label">Email</div>
                                <div class="col-md-9" id="input"><?php Form::element_init("2", array("type" => "text", "id" => "email", "name" => "email", "value" => $result[0]["email"], "class" => "form-control")) ?></div>
                                <div class="col-md-3" id="label">Phone</div>
                                <div class="col-md-9" id="input"><?php Form::element_init("2", array("type" => "text", "id" => "phone", "name" => "phone", "value" => $result[0]["phone"], "class" => "form-control")) ?></div>




                                <div class="col-md-12" id="radioBtn"><?php Form::element_init("2", array("type" => "radio", "name" => "preference", "checked" => "checked", "value" => 0)) ?> Subscriber information</div>

                                <div class="col-md-12" id="radioBtn"><?php Form::element_init("2", array("type" => "radio", "name" => "preference", "value" => 1)) ?> Different Person information </div>




                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="row" id="subscription">
                                <div class="col-md-12">
                                    <h4>Addresses</h4>
                                </div>



                                <?php

                                foreach ($settings->getAdresses() as $value) :
                                    echo ' <div class="col-md-12" id="addressrow">
								 
								 <div class="row" id="addresspref">
								 <div class="col-md-9">' . $value["name"] . '</div>
								 <div class="col-md-3">';

                                    if ($value["add_default"] == 1) :
                                        Form::element_init("2", array("type" => "radio", "value" => $value["id"], "name" => "addre_prefe", "checked" => "checked", "id" => "radioBtn"));

                                        echo "Default";


                                    else :

                                        Form::element_init("2", array("type" => "radio", "value" => $value["id"], "name" => "addre_prefe", "id" => "radioBtn"));
                                    endif;



                                    echo '</div>
								 
								 </div>
								 
								 
								 
								 
								  </div>';
                                endforeach;


                                ?>


                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="row" id="subsciption">
                                <div class="col-md-12">
                                    <h4>How would you like to pay ?</h4>
                                </div>

                                <div class="col-md-6" id="addressrow">

                                    <label>
                                        <?php Form::element_init("2", array("type" => "radio", "value" => "1", "name" => "payment", "checked" => "checked")); ?> PAYPAL
                                    </label>

                                </div>

                                <div class="col-md-6" id="addressrow">

                                    <label>
                                        <?php Form::element_init("2", array("type" => "radio", "enabled" => "enabled")); ?> CREDİT CARD 
                                    </label>




                                </div>

                            </div>


                        </div>

                    </div>



                </div>



                <div class="col-md-5">

                    <div class="row" id="right-side">

                        <div class="col-md-12" id="hdr">
                            <h3>Product in the cart</h3>
                        </div>
                        <div class="col-md-3" id="innerhdr">Name</div>
                        <div class="col-md-3" id="innerhdr">Quantity</div>
                        <div class="col-md-3" id="innerhdr">Unit Price</div>
                        <div class="col-md-3" id="innerhdr">Total</div>
                        <!-- SEPETTEKİ ÜRÜNLER BURADA LİSTELENECEK -->
                        <?php
                        $Totalquantity = 0;
                        $Total = 0;


                        foreach ($_COOKIE["product"] as $id => $quantity) :


                            $product = $settings->getProduct($id);

                            echo '  <div class="col-md-3" id="innerproduct">' . $product[0]["productname"] . '</div>
                        <div class="col-md-3" id="innerproduct">' . $quantity . '</div>
                        <div class="col-md-3" id="innerproduct">' . number_format($product[0]["price"], 2, '.', ',') . '</div>
                        <div class="col-md-3" id="innerproduct">' . number_format($product[0]["price"] * $quantity, 2, ',', '.') . '</div>';





                            $Totalquantity  += $quantity;
                            $Total += $product[0]["price"] * $quantity;


                        endforeach;


                        echo '<div class="col-md-3" id="total">Total quantity</div>
                        <div class="col-md-3" id="total">' . $Totalquantity . '</div>
                        <div class="col-md-3" id="total">Total</div>
                        <div class="col-md-3" id="total">' . number_format($Total, 2, ',', '.') . '</div>';


                        ?>


                    </div>

                    <div class="row">


                        <div class="col-md-12">
                            <?php
                            Form::element_init("2", array("type" => "hidden", "value" => $Total, "name" => "total"));

                            Form::element_init("2", array("type" => "submit", "value" => "Complete Order", "class" => "btn btn_1"));
                           // Form::element_init("close");


                            if (isset($data["info"])) :
                                echo $data["info"];

                            endif;
                            ?>

                        </div>



                    </div>



                </div>








            </div>



        </div>

    <?php
    else :
    // session is active ?
    header("Location:".URL);
    endif;



else :
// product in your cart ?
header("Location:".URL);
	



endif;


?>


<?php require 'views/footer.php'; ?>