<?php require 'views/header.php' ?>

<div class="registration-form">
	<div class="container">
		<div class="dreamcrub">
			<ul class="breadcrumbs">
				<li class="home">
					<a href="<?php echo URL; ?>" title="Go to Home Page">Home</a>&nbsp;
					<span>&gt;</span>
				</li>
				<li class="women">
					Registration
				</li>
			</ul>
			<ul class="previous">
				<li><a href="<?php echo URL; ?>">Back to Previous Page</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>




		<?php

		// if (isset($data["info"])) {
		// 	if (is_array($data["info"])) {
		// 		foreach ($data["info"] as $value) {
		// 			echo $value . " <br>";
		// 		}
		// 	} else {
		// 		echo $data["info"] . "<br>";
		// 	}
		// } else {

		if (isset($data["info"])) {
			
			echo $data["info"] . "<br>";
			
		} 
		else {

			?>
			<h2>Registration</h2>
			<div class="registration-grids">

			<?php  
			
			
		if (isset($data["error"])) {
				
			foreach ($data["error"] as $value) {
					
			echo $value . " <br>";
					
			} 
				
		
				
		} 
	    ?>

				<div class="reg-form">
					<div class="reg">
						<p>Welcome, please enter the following details to continue.</p>
						<p>If you have previously registered with us, <a href="<?php echo URL; ?>/subscriber/login">click here</a></p>
						<form action="<?php echo URL  ?>/subscriber/registercontrol" method="POST">
							<ul>
								<li class="text-info">First Name: </li>
								<li><input type="text" name="name"></li>
							</ul>
							<ul>
								<li class="text-info">Last Name: </li>
								<li><input type="text" name="lastname"></li>
							</ul>
							<ul>
								<li class="text-info">Email: </li>
								<li><input type="text" name="email"></li>
							</ul>
							<ul>
								<li class="text-info">Password: </li>
								<li><input type="password" name="password"></li>
							</ul>
							<ul>
								<li class="text-info">Re-enter Password:</li>
								<li><input type="password" name="repassword"></li>
							</ul>
							<ul>
								<li class="text-info">Mobile Number:</li>
								<li><input type="text" name="tel"></li>
							</ul>
							<input type="submit" value="REGISTER NOW">
							<p class="click">By clicking this button, you are agree to my <a href="#">Policy Terms and Conditions.</a></p>
						</form>
					</div>
				</div>
				<div class="reg-right">
					<h3>Completely Free Account</h3>
					<div class="strip"></div>
					<p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
						libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
					<h3 class="lorem">Lorem ipsum dolor.</h3>
					<div class="strip"></div>
					<p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- registration-form -->
<?php
}
require 'views/footer.php' ?>