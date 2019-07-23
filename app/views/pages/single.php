<?php require 'views/header.php' ?>


<!-- content-section-starts -->
<div class="container">
    <div class="products-page">
        <div class="products">
            <div class="product-listy">
                <h2>Low Stocks</h2>
                <ul class="product-list">
                    <?php
                    foreach ($data["data2"] as $value) :


                        echo '<li><a href="' . URL . '/products/details/' . $value["id"] . '/' . $settings->seo($value["productname"]) . '">' . $value["productname"] . '</a></li>';



                    endforeach;

                    ?>

                </ul>
            </div>
            <div class="latest-bis">
                <img src="images/l4.jpg" class="img-responsive" alt="" />
                <div class="offer">
                    <p>40%</p>
                    <small>Discount</small>
                </div>
            </div>
            <div class="latest-bis">
                <img src="images/l4.jpg" class="img-responsive" alt="" />
                <div class="offer">
                    <p>10%</p>
                    <small>Discount 2</small>
                </div>
            </div>



        </div>
        <div class="new-product">
            <div class="col-md-5 zoom-grid">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic1"]; ?>">
                            <div class="thumb-image"> <img src="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic1"]; ?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $data["data1"][0]["productname"]; ?>" /> </div>
                        </li>
                        <li data-thumb="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic2"]; ?>">
                            <div class="thumb-image"> <img src="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic2"]; ?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $data["data1"][0]["productname"]; ?>" /> </div>
                        </li>
                        <li data-thumb="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic3"]; ?>">
                            <div class="thumb-image"> <img src="<?php echo URL; ?>/views/design/images/<?php echo $data["data1"][0]["pic3"]; ?>" data-imagezoom="true" class="img-responsive" alt="<?php echo $data["data1"][0]["productname"]; ?>" /> </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-7 dress-info">
                <div class="dress-name">
                    <h3><?php echo $data["data1"][0]["productname"]; ?></h3>
                    <span><?php echo number_format($data["data1"][0]["price"], 2, '.', ',') ?></span>
                    <div class="clearfix"></div>
                    <p><b>Product Description</b> <?php echo $data["data1"][0]["description"]; ?> </p>
                </div>
                <div class="span span1">
                    <p class="left">Fabric</p>
                    <p class="right"> <?php echo $data["data1"][0]["fabric"]; ?></p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span2">
                    <p class="left">Made-in Country</p>
                    <p class="right"><?php echo $data["data1"][0]["madein"]; ?></p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span3">
                    <p class="left">COLOR</p>
                    <p class="right"><?php echo $data["data1"][0]["color"]; ?></p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span4">
                    <p class="left">DIMENSION</p>
                    <p class="right"><span class="selection-box "><select class="form-control" name="domains">
                                <option>M</option>
                                <option>L</option>
                                <option>XL</option>
                                <option>FS</option>
                                <option>S</option>
                            </select></span></p>
                    <div class="clearfix"></div>
                </div>
                <div class="purchase">
                    <input type="submit" class="btn btn-success" value="Add to Cart">

                    <div class="clearfix"></div>
                </div>
                <script src="<?php echo URL; ?>/views/design/js/imagezoom.js"></script>
                <!-- FlexSlider -->
                <script defer src="<?php echo URL; ?>/views/design/js/jquery.flexslider.js"></script>
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
            <div class="reviews-tabs">

            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#info" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">More Infomation bilgi</a></li>
			  <li role="presentation" class=""><a href="#attr" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Attributes</a></li>
			  
              
    			  <li role="presentation" class=""><a href="#comment" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Comments  <?php  echo count ($data["data4"]);?> </a></li>
              
            
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div role="tabpanel" class="tab-pane fade active in" id="info" aria-labelledby="home-tab">
				<p><?php echo $data["data1"][0]["extraInfo"]; ?></p>
			  </div>
			  <div role="tabpanel" class="tab-pane fade " id="attr" aria-labelledby="profile-tab">
				<p><?php echo $data["data1"][0]["attr"]; ?></p>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="comment" aria-labelledby="dropdown1-tab">
              
             
            <div class="row bg-color" id="formresult"></div>
             
             
             
             <input type="button" id="addcomment"  value="Add comment" class="btn btn-sm- btn-info" />
             
             
            
             
             <div class="row" id="formresult">result</div>
             
             <div class="row bg-color" id="mainform">
             
             	<div class="col-lg-12">
                <form id="commentform" >
                <label class="offset_1">Name</label>
                </div>
                
                <div class="col-lg-12">
               
                <input type="text" name="name" class="form-control" maxlength="30"  required="required"/>
                </div>
             
             
             
             	<div class="col-lg-12">
               
                <label class="hizala_1">Comment</label>
                </div>
                
                <div class="col-lg-12">
               
                <textarea name="comment" class="form-control"  required="required" ></textarea>
                </div>
             
             
                 <div class="col-lg-12 text-center">
  <input type="hidden" name="productid"   value="<?php echo $data["data1"][0]["id"]; ?>"/>   
                 
                
               <input type="button" id="sendcomment" value="Send" class="btn offset--2" />
                </form>
               
                </div>
             
             
             </div>
             
              
                        <?php
						
						
						if (count($data["data4"])==0):
						
						
echo '<div class="alert alert-danger text-center">There are comment about this product in the section.</div>';
						
						else:
						
						foreach ($data["data4"] as $value) :
			   

				echo '<div class="media response-info comments">
							<div class="media-left response-text-left" id="commentname">								
								<h5>'.$value["name"].'</h5>
							</div>
                            
                            
							<div class="media-body response-text-right">
								<p>'.$value["context"].'</p>
								<ul>
									<li>'.$value["date"].'</li>
									
								</ul>
							</div>
							<div class="clearfix"> </div>
						</div>';	   
			
			   
			   endforeach;
						
						endif;
						
			   
					
					?>
              
				
                 
                
                
                
			  </div>
			  
			</div>
		   </div>
              
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="other-products products-grid">
    <div class="container">
        <header>
            <h3 class="like text-center">Similar Products</h3>
        </header>

        <?php
        foreach ($data["data3"] as $value) :



            echo '<div class="col-md-4 product simpleCart_shelfItem text-center">
                        <a href="' . URL . '/urunler/detay/' . $value["id"] . '/' . $settings->seo($value["productname"]) . '">

                        <img src="' . URL . '/views/design/images/' . $value["pic1"] . '" alt="' . $value["productname"] . '" /></a>

						<div class="mask">
							<a href="' . URL . '/urunler/detay/' . $value["id"] . '/' . $settings->seo($value["productname"]) . '">More Details</a>
							
						</div>
						
						<a class="product_name" href="' . URL . '/urunler/detay/' . $value["id"] . '/' . $settings->seo($value["productname"]) . '">' . $value["productname"] . '</a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">' . number_format($value["price"], 2, '.', ',') . '</span></a></p>
					</div>';



        endforeach;

        ?>


        <div class="clearfix"></div>
    </div>
</div>
<!-- content-section-ends -->


<?php require 'views/footer.php' ?>