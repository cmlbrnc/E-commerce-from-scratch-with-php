<div class="footer">
		<div class="container">
		 <div class="footer_top">
			<div class="span_of_4">
				<div class="col-md-3 span1_of_4">
					<h4>The Most Selling</h4>
					<ul class="f_nav">
					  
					<?php
				
			
				foreach ($settings->mostsell as $value):
		
	
				
							echo '<li><a href="'.URL.'/products/details/'.$value["id"].'/'.$settings->seo($value["productname"]).'">'.$value["productname"].'</a></li>';
				
				
				endforeach;
				
				
				?>
					
					</ul>	
				</div>
				
				<div class="col-md-3 span1_of_4">
					<h4>Lower Stocks</h4>
					<ul class="f_nav">
					<?php
				
			
				foreach ($settings->leaststock as $value):
		
	
				
						echo '<li><a href="'.URL.'/products/details/'.$value["id"].'/'.$settings->seo($value["productname"]).'">'.$value["productname"].'</a></li>';
				
				
				endforeach;
				
				
				?>  
						
					</ul>					
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>Popular Categories</h4>
					<ul class="f_nav">
					<?php  
					
					
					foreach ($settings->popularcategory as $value):		
				
						echo '<li><a href="'.URL.'/products/category/'.$value["id"].'/'.$settings->seo($value["name"]).'">'.$value["name"].'</a></li>';
										
										
										endforeach;
					
					?>
					
					</ul>			
				</div>
				<div class="col-md-3 span1_of_4">
					<h4>Help</h4>
					<ul class="f_nav">
						<li><a href="<?php echo URL; ?>/pages/delivery">Delivery</a></li>
						<li><a href="<?php echo URL; ?>/pages/refund">Refund</a></li>
					    <li><a href="<?php echo URL; ?>/pages/customerservice">Customer Service</a></li>
					    <li><a href="<?php echo URL; ?>/pages/privacypolicy">Privacy Policy</a></li>
						<li><a href="<?php echo URL; ?>/pages/termconditions">Term & conditions</a></li>
						<li><a href="<?php echo URL; ?>/pages/contact">Contact us</a></li>
					</ul>	
				</div>
				<div class="clearfix"></div>
				</div>
		  </div>
		  <div class="cards text-center">
				<img src="<?php  echo URL  ?>/views/design/images/cards.jpg" alt="" />
		  </div>
		  <div class="copyright text-center">
				<p>© 2019 Eshop. All Rights Reserved | Design by   <a href="">Firsttech1</a></p>
		  </div>
		</div>
		</div>
	
</body>
</html>