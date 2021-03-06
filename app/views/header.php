<?php $settings = new Settings(); ob_start();  ?>
<!DOCTYPE html>
<html>

<head>
	<title> <?php echo $settings->title;  ?></title>
	<link href="<?php echo URL  ?>/views/design/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery necessary for Bootstrap's JavaScript plugins -->
	<script src="<?php echo URL  ?>/views/design/js/jquery.min.js"></script>
	<script src="<?php echo URL  ?>/views/design/js/main.js"></script>
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



	
</head>

<body>

	<!-- header-section-starts -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>

						<?php


						if (Session::get("username") == true) :  Session::sessionControl(Session::get("username"),Session::get("subsid")); ?>

							<a href="<?php echo URL; ?>/subscriber/panel">My Account</a>

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