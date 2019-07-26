<?php require 'views/header.php'; ?>
  

	<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
			<div class="products">
				<div class="product-listy">
					<h2>Other Categories</h2>
					<ul class="product-list">
			                <?php
			   foreach ($data["data2"] as $value) :
			   
	
 echo '<li><a href="'.URL.'/products/category/'.$value["id"].'/'. $settings->seo($value["name"]).'">'.$value["name"].'</a></li>';
					   
			
			   
			   endforeach;
					
					?>
						
					</ul>
				</div>
				
            
				

			</div>
			<div class="new-product">
            
            	<div class="container">
                	<div class="row">
                    
                    <div class="col-md-6"><label>How many you want to see</label>
                  <select >
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> </div>
                  
                  
                     <div class="col-md-6"> <label>Order </label>
			            <select >
			               
			                            <option value="">
			                    Discount              </option>
			                            <option value="">
			                    The most higher                </option>
                                 <option value="">
			                    The most lower                </option>
			            </select></div>
                    
                    
                    </div>
                
                
                </div>
			
				
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    
             
					<div class="clearfix"></div>
                    
               
                    
                    
					<ul>
                    
                    
                              <?php
			   foreach ($data["data1"] as $value) :
			   
			   
			   echo '<li>
							<a class="cbp-vm-image" href="'.URL.'/products/details/'.$value["id"].'/'. $settings->seo($value["productname"]).'">
								<div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
	<img src="'.URL.'/views/design/images/'.$value["pic1"].'" class="img-responsive" alt="'.$value["productname"].'"/>
									<div class="mask">
			                       		<div class="info">Check out</div>
					                  </div>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title">'.$value["productname"].'</p>
									   </div>
			 <div class="pricey"><span class="item_price">'. number_format($value["price"],2,'.',',').'</span></div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
					
							<a class="cbp-vm-icon cbp-vm-add item_add" href="#">Add</a>
							</div>
						</li>';
			   
	

					   
			
			   
			   endforeach;
					
					?>
                    
				
                        
                                               
						
					</ul>
				</div>
				<script src="<?php echo URL; ?>/views/design/js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="<?php echo URL; ?>/views/design/js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Similar products</h3>        			
				     <ul id="flexiselDemo3">
                     
                     
                                 <?php
			   foreach ($data["data3"] as $value) :
			   
			   
			   
			           
                     
					echo'	<li><a href="'.URL.'/products/details/'.$value["id"].'/'. $settings->seo($value["productname"]).'"><img src="'.URL.'/views/design/images/'.$value["pic1"].'" alt="'.$value["productname"].'" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="'.URL.'/products/details/'.$value["id"].'/'. $settings->seo($value["productname"]).'">'.$value["productname"].'</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price">'. number_format($value["price"],2,'.',',').'</span></a></p>
							</div>
						</li>';
			   
	

			   
			   endforeach;
					
					?>
                     
                     
                     
          
                        
                        
                        
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
			   <script type="text/javascript" src="<?php echo URL; ?>/views/design/js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->




<?php require 'views/footer.php'; ?> 		
        
        
        

	
	
   