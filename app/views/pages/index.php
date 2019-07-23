<?php require 'views/header.php' ?>

<div class="banner">
	<div class="container">
		<div class="banner-bottom">
			<div class="banner-bottom-left">
				<h2>B<br>U<br>Y</h2>
			</div>
			<div class="banner-bottom-right">
				<div class="callbacks_container">
					<ul class="rslides" id="slider4">
						<li>
							<div class="banner-info">
								<h3> <?php  echo $settings->sloganUp1;  ?></h3>
								<p> <?php  echo $settings->sloganDown1;  ?> </p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h3><?php  echo $settings->sloganUp2;  ?></h3>
								<p> <?php  echo $settings->sloganDown2;  ?> </p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h3>  <?php  echo $settings->sloganUp3;  ?></h3>
								<p>  <?php  echo $settings->sloganDown3;  ?></p>
							</div>
						</li>
					</ul>
				</div>
				<!--banner-->
				<script src="js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
					$(function() {
						// Slideshow 4
						$("#slider4").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function() {
								$('.events').append("<li>before event fired.</li>");
							},
							after: function() {
								$('.events').append("<li>after event fired.</li>");
							}
						});

					});
				</script>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="shop">
			<a href="single.html">Shop Now</a>
		</div>
	</div>
</div>
<!-- content-section-starts-here -->
<div class="container">
	<div class="main-content">




		<div class="products-grid">
			<header>
				<h3 class="head text-center">New Brands</h3>
			</header>

			<?php
			foreach ($data["data1"] as $value) {
				?>

				<div class="col-md-4 product simpleCart_shelfItem text-center">
					<a href="<?php  echo URL;  ?>/products/details/<?php  echo $value["id"]   ?>/<?php echo $settings->seo(  $value["productname"])  ?>">
					<img src="<?php echo URL  ?>/views/design/images/<?php echo $value["pic1"]  ?>" alt="<?php  echo $value["productname"]  ?>"/></a>
					<div class="mask">
						<a href="<?php  echo URL;  ?>/products/details/<?php  echo $value["id"]   ?>/<?php  echo $settings->seo( $value["productname"] ) ?>">Check out</a>
					</div>
					<a class="product_name" href="<?php  echo URL;  ?>/products/details/<?php  echo $value["id"]   ?>/<?php  echo $settings->seo( $value["productname"] ) ?>"><?php  echo $value["productname"]  ?></a>
					<p><a class="item_add" href="#"><i></i> <span class="item_price"><?php  echo $value["price"]   ?></span></a></p>
				</div>
				<?php
			}
			?>
			<div class="clearfix"></div>
		</div>
	</div>

</div>
<div class="other-products">
	<div class="container">
		<h3 class="like text-center">The Most Selling</h3>
		<ul id="flexiselDemo3">

		<?php
			foreach ($data["data2"] as $value2) {

			
				?>

			<li><a href="<?php  echo URL;  ?>/products/details/<?php  echo $value2["id"]   ?>/<?php  echo $settings->seo( $value2["productname"] ) ?>">
			<img src="<?php echo URL  ?>/views/design/images/<?php  echo $value2["pic2"]   ?>" class="img-responsive" alt="<?php  echo $value2["productname"]   ?>" /></a>
				<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="<?php  echo URL;  ?><?php  echo $value2["id"]   ?>"><?php  echo $value2["productname"]   ?></a>
					<p><a class="item_add" href="#"><i></i> <span class=" item_price"><?php  echo $value2["price"]   ?></span></a></p>
				</div>
			</li>

				
				<?php
			}
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
							changePoint: 480,
							visibleItems: 1
						},
						landscape: {
							changePoint: 640,
							visibleItems: 2
						},
						tablet: {
							changePoint: 768,
							visibleItems: 3
						}
					}
				});

			});
		</script>
		<script type="text/javascript" src="<?php echo URL  ?>/views/design/js/jquery.flexisel.js"></script>
	</div>
</div>
<!-- content-section-ends-here -->
<div class="news-letter">
	<div class="container">
		<div class="join">
			<h6>NEWSLETTER</h6>
			<div class="sub-left-right">
				<form>
					<input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
					<input type="submit" value="Subscribe" />
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<?php require 'views/footer.php' ?>