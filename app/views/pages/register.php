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
		} else {

			?>
			<h2>Registration</h2>
			<div class="registration-grids">

				<?php


				if (isset($data["error"])) {
					echo '<div class="alert alert-danger mt-5">';
					foreach ($data["error"] as $value) {

						echo ucFirst($value) . " <br>";
					}
					echo "</div>";
				}
				?>

				<div class="reg-form">
					<div class="reg">
						<p>Welcome, please enter the following details to continue.</p>
						<p>If you have previously registered with us, <a href="<?php echo URL; ?>/subscriber/login">click here</a></p>

						<?php Form::element_init(1, array(
							"action" => URL . "/subscriber/registercontrol",
							"method" => "POST"

						));  ?>

						<ul>
							<li class="text-info"><span class="text-danger">*</span>Name: </li>
							<li>

								<?php
								Form::element_init("2", array("type" => "text", "name" => "name", "required" => "required")); ?>
							</li>
						</ul>
						<ul>
							<li class="text-info"><span class="text-danger">*</span> Surname: </li>
							<li> <?php
									Form::element_init("2", array("type" => "text", "name" => "lastname", "required" => "required")); ?></li>
						</ul>
						<ul>
							<li class="text-info"><span class="text-danger">*</span> Email: </li>
							<li> <?php
									Form::element_init("2", array("type" => "text", "name" => "email", "required" => "required")); ?></li>
						</ul>
						<ul>
							<li class="text-info"><span class="text-danger">*</span> Password: </li>
							<li> <?php
									Form::element_init("2", array("type" => "password", "name" => "password", "required" => "required")); ?></li>
						</ul>
						<ul>
							<li class="text-info"><span class="text-danger">*</span> Sifre Tekrar:</li>
							<li><?php
								Form::element_init("2", array("type" => "password", "name" => "repassword", "required" => "required")); ?></li>
						</ul>
						<ul>
							<li class="text-info"><span class="text-danger">*</span> Tel:</li>
							<li> <?php
									Form::element_init("2", array("type" => "text", "name" => "tel", "required" => "required")); ?></li>
						</ul>

						<ul>
							<li class="text-success">* is required field</li>
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