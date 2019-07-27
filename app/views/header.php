<?php $settings = new Settings();   ?>
<!DOCTYPE html>
<html>

<head>
	<title> <?php echo $settings->title;  ?></title>
	<link href="<?php echo URL  ?>/views/design/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo URL  ?>/views/design/js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<link href="<?php echo URL  ?>/views/design/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->

	<link href="<?php echo URL  ?>/views/design/css/component.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="description" content="<?php echo $settings->description;  ?>" />
	<meta name="keywords" content="<?php echo $settings->keywords;  ?>" />

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--webfont-->
	<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo URL  ?>/views/design/js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<!-- cart -->
	<script src="<?php echo URL  ?>/views/design/js/simpleCart.min.js"> </script>
	<!-- cart -->
	<link rel="stylesheet" href="<?php echo URL  ?>/views/design/css/flexslider.css" type="text/css" media="screen" />



	<script>
		$(document).ready(function() {
           
		    $("#cartstatus").load("<?php echo URL; ?>/task/checkoutcontrol");



			$("#mainform").hide();
			$("#addcomment").click(function(e) {

				$("#mainform").slideToggle();

			});

			$("#sendcomment").click(function(e) {

				$.ajax({
					type: "POST",
					url: '<?php echo URL  ?>/task/commentcontrol',
					data: $('#commentform').serialize(),

					success: function(response) {
						$("#commentform").trigger("reset");

						$('#result').html(response);

						if ($('#ok').html() == "Your comment is successfully added") {
							$("#mainform").fadeOut();
						}
					},

				});
				e.preventDefault();

			});

			$("[type='number']").keypress(function(evt) {
				evt.preventDefault();


			});


			$("#newsletterbtn").click(function(e) {

				$.ajax({
					type: "POST",
					url: '<?php echo URL  ?>/task/newslettercontrol',
					data: $('#newsletterform').serialize(),

					success: function(response) {
						$("#newsletterform").trigger("reset");

						$('#newsletterresult').html(response);

						if ($('#newsletterok').html() == "You have been succesfully registered our newsletter") {
							$(".join").fadeOut();
						}
					},

				});
				e.preventDefault();

			});
			$("#contactsubmit").click(function(e) {

				$.ajax({
					type: "POST",
					url: '<?php echo URL  ?>/task/contact',
					data: $('#contactform').serialize(),

					success: function(response) {
						$("#contactform").trigger("reset");

						$('#contactresult').html(response);

						if ($('#contactok').html() == "Your message has been sent") {
							$("#contactform").fadeOut();
						}
					},

				});
				e.preventDefault();

			});

			$("#cartbtn").click(function(e) {

				$.ajax({
					type: "POST",
					url: '<?php echo URL  ?>/task/AddtoCart',
					data: $('#cartform').serialize(),

					success: function(response) {

						$("html,body").animate({scrollTop:0},"slow");

						$("#cartstatus").load("<?php echo URL; ?>/task/checkoutcontrol");
						$("#cartform").trigger("reset");

						$('#cartresult').html(response);

						$('#avaiable').html('<div class="alert alert-success">Added to Cart</div>');



					},

				});
				e.preventDefault();

			});

			$('#itemsform input[type="button"]').click(function (e) { 
			
			var id=$(this).attr('data-value');
				
		    var number=$('#itemsform input[name="number'+id+'"]').val();
			

			$.post("<?php echo URL; ?>/task/updatecart",{"productid":id,"number":number},() => {
				 window.location.reload();
			 })
			
		});



		});
     
		function RemoveProduct(value) {
             
			 $.post("<?php echo URL; ?>/task/removeproduct",{"productid":value},() => {
				 window.location.reload();
			 })
		

		}
	</script>
</head>

<body>

	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>

						<?php


						if (Session::get("username") == true) : ?>

							<a href="<?php echo URL; ?>/subscriber/logout">Log Out</a>

						<?php else : ?>


							<li><a href="<?php echo URL; ?>/subscriber/login"><span class="glyphicon glyphicon-user">
									</span>Log In </a></li>
							<li><a href="<?php echo URL; ?>/subscriber/register"><span class="glyphicon glyphicon-lock">

									</span>Register</a></li>



						<?php
						endif;


						?>

					</ul>
				</div>
				<div class="header-right">
					<div class="cart box_1" id="cartstatus">
						
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<div class="banner-top">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="logo">
						<h1><a href="<?php echo URL; ?>"><span>E</span> E-Commerce</a></h1>
					</div>
				</div>
				<!--/.navbar-header-->

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo URL; ?>">Home</a></li>

						<?php $settings->getLinks();  ?>

						<li><a href="<?php echo URL; ?>/pages/contact">Contact</a></li>
					</ul>
				</div>
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
	</div>
	</div>