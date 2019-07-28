<?php require 'views/header.php' ?>

<!-- checkout -->
<div class="cart-items">
	<div class="container">

		<?php if (isset($_COOKIE["product"])) : ?>


			<div class="cart-gd">

				<?php




				$totalNumber = 0;
				$totalPrice = 0;

				echo "<form id='itemsform'>";


				foreach ($_COOKIE["product"] as $id => $number) :


					$product = $settings->getProduct($id);

					//	$id db ye ilgili ürünü çekicem ve listelicem

				echo ' <div class="cart-header">
					 <div class="close1">
				      <input type="button" class="btn btn-sm btn-success" data-value="' . $product[0]["id"] . '" value="Update">'; ?>


					<a onclick='Remove("<?php echo $product[0]["id"] ?>","removeproduct")' class="btn btn-sm btn-danger">Remove</a>


					<?php echo '</div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="' . URL . '/views/design/images/' . $product[0]["pic1"] . '" class="img-responsive" alt="' . $product[0]["productname"] . '">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"> ' . $product[0]["productname"] . ' </a></h3>
						
						<ul class="qty">
							<li><h3>Product Price</h3>
							<span>' . number_format($product[0]["price"], 2, '.', ',') . '</span></li>
							<li><h3>items</h3>
							
		  <input type="number" min="1" max="10" value="' . $number . '" name="number' . $product[0]["id"] . '" class="form-control" /> 
	
		  
							</li>
						</ul>
							 <div class="delivery" >
							
							 <span>Total : ' . number_format($product[0]["price"] * $number, 2, ',', '.') . '</span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>';


					$totalNumber  += $number;
					$totalPrice += $product[0]["price"] * $number;


				endforeach;


				echo "</form>";

				echo '
				
				<div class="row total__field-2">
				<div class="col-md-12">
				<span>Total Number : </span>' . count($_COOKIE["product"]) . '<br>
				
				<span>Unit Number : </span>' . $totalNumber . '<br>
				<span>Total Price : </span>' . number_format($totalPrice, 2, ',', '.') . '<br>
				
				</div>
				
				</div>
				
				
				
				<div class="row total__field">
				<div class="col-md-12">
	  <a href="' . URL . '/task/dropcart" class="btn btn-danger">Discard All</a> 
				<a href="' . URL . '" class="btn btn_1 ">Continue shopping...</a>
				<a href="' . URL . '/pages/completeorder" class="btn btn_1 ">Checkout your products</a>
				
				
				
				</div>
				
				</div>';





			else :


				echo '<div class="alert alert-info text-center"><h3>There is no item in your cart.</h3></div>';



				echo '	<div class="row total__field">
				<div class="col-md-12">
				
				<a href="' . URL . '" class="btn btn_1">Continue shopping...</a>
			
				
				
				
				</div>
				
				</div>';

			endif;


			?>






		</div>
	</div>
</div>

<!-- //checkout -->


<?php require 'views/footer.php' ?>