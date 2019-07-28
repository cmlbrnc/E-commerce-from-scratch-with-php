<?php
class subscriber extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->LoadModel('subscriber');

		Session::init();
	}

	function login()
	{

		$this->view->show("pages/login", array("header" => $this->model->setting()));
	}
	function register()
	{


		$this->view->show("pages/register");
	}



	function registercontrol()
	{

		$name = $this->form->get("name")->isEmpty();
		$lastname = $this->form->get("lastname")->isEmpty();
		$email = $this->form->get("email")->isEmpty();
		$password = $this->form->get("password")->isEmpty();
		$repassword = $this->form->get("repassword")->isEmpty();
		$tel = $this->form->get("tel")->isEmpty();
		$this->form->isRealEmail($email);
		$password = $this->form->passwordMatch($password, $repassword);



		if (!empty($this->form->error)) :


			$this->view->show("pages/register", array("error" => $this->form->error));




		else :



			$result = $this->model->registercontrol(
				"subscribers",
				array("name", "lastname", "email", "password", "phone"),
				array($name, $lastname, $email, $password, $tel)
			);


			if ($result == 1) :


				$this->view->show(
					"pages/register",
					array("info" => $this->response->res("success", "Account has been successfully created."))
				);



			else :

				$this->view->show(
					"pages/register",
					array("info" =>
					$this->response->res("danger", "An error occured whilst registiration."))
				);




			endif;

		endif;
	} // REgister Control



	function logout()
	{

		Session::destroy();
		$this->response->redirect("/store");
	} // logout


	function logincontrol()
	{

		$name = $this->form->get("name")->isEmpty();
		$password = $this->form->get("password")->isEmpty();


		if (!empty($this->form->error)) {

			$this->view->show("pages/login", array("info" => $this->response->res("warning", "Username and Password cant be empty")));
		} else {

			//**db control
			$password = $this->form->encode($password);
			$result = $this->model->LoginController("subscribers", " name='$name' and password='$password' ");
		
			if ($result ) {

				$this->response->redirect("/subscriber/panel");
				Session::init();
				Session::set("username", $result[0]["name"]);
				Session::set("subsid", $result[0]["id"]);
			} else {

				$this->view->show(
					"pages/login",
					array("info" => $this->response->res("warning", "Username and password are wrong"))
				);
			}
		}
	} // login control


	//*********** Subscriber Panel functions

	function deletecomment()
	{
		//echo $_POST["commentid"];
		if ($_POST) :

			echo $this->model->delete("comments", "id=" . $_POST["commentid"]);

		endif;
	} // Delete comment

	function deleteaddress()
	{

		if ($_POST) :

			echo $this->model->Delete("addresses", "id=" . $_POST["addressid"]);

		endif;
	} // delete address

	function updatecomment()
	{

		if ($_POST) :


			echo $this->model->update(
				"comments",
				array("context", "status"),
				array($_POST["comment"], "0"),
				"id=" . $_POST["commentid"]
			);

		endif;
	} // updatecomment 

	function updateaddress()
	{

		if ($_POST) :

			echo $this->model->update(
				"addresses",
				array("name"),
				array($_POST["address"]),
				"id=" . $_POST["addressid"]
			);

		endif;
	} // update Address


	function panel()
	{

		$this->view->show("pages/panel", array(
			"orders" => $this->model->get("orders", "where subsid=" . Session::get("subsid"))
		));	

	} // main panel

	function comments()
	{


		$this->view->show("pages/panel", array(
			"comments" => $this->model->getList("comments", "where subsid=" . Session::get("subsid"))


		));
	} // YORUMLAR

	function address()
	{


		$this->view->show("pages/panel", array(
			"addresses" => $this->model->getList("addresses", "where subsid=" . Session::get("subsid"))


		));
	} // address

	function account()
	{


		echo $result = $this->view->show("pages/panel", array(
			"account" => $this->model->get("subscribers", "where id=" . Session::get("subsid"))
		));
		print_r($result);
	} // account settings

	function password()
	{


		$this->view->show("pages/panel", array(
			"password" => Session::get("subsid")
		));
	} // password  change

	function orders()
	{

		$this->view->show("pages/panel", array(
			"orders" => $this->model->get("orders", "where subsid=" . Session::get("subsid"))
		));
	} // orders

	function updatesettings()
	{
		if ($_POST) :

			$name = $this->form->get("name")->isEmpty();
			$lastname = $this->form->get("lastname")->isEmpty();
			$email = $this->form->get("email")->isEmpty();
			$phone = $this->form->get("phone")->isEmpty();
			$subsid = $this->form->get("subsid")->isEmpty();



			if (!empty($this->form->error)) :
				$this->view->show(
					"pages/panel",
					array(
						"settings" => $this->model->get("subscribers", "where id=" . Session::get("subsid")),
						"info" => $this->response->res("danger", "There are wrongs.")
					)
				);

			else :



				$result = $this->model->update(
					"subscribers",
					array("name", "lastname", "email", "phone"),
					array($name, $lastname, $email, $phone),
					"id=" . $subsid
				);

				if ($result) :

					$this->view->show(
						"pages/panel",
						array(
							"settings" => "ok",
							"info" => $this->response->success("Successfully Updated", "/subscriber/panel")
						)
					);

				else :

					$this->view->show(
						"pages/panel",
						array(
							"settings" => $this->model->get("subscribers", "where id=" . Session::get("subsid")),
							"info" => $this->response->res("danger", "there is an error whilst update.")
						)
					);

				endif;

			endif;


		else :

			$this->response->redirect("/");
		endif;
	} // subs settings updates.

	function updatepassword()
	{

		if ($_POST) :

			$cpassword = $this->form->get("cpassword")->isEmpty();
			$new1 = $this->form->get("new1")->isEmpty();
			$new2 = $this->form->get("new2")->isEmpty();
			$subsid = $this->form->get("subsid")->isEmpty();
			$password = $this->form->passwordMatch($new1, $new2);



			$cpassword = $this->form->encode($cpassword);

			if (!empty($this->form->error)) :
				$this->view->show(
					"pages/panel",
					array(
						"password" => Session::get("subsid"),
						"info" => $this->response->res("danger", "There is wrong info.")
					)
				);

			else :



				$result2 = $this->model->LoginController("subscribers", "name='" . Session::get("username") . "' and password='$cpassword'");

				if ($result2) :

					$result = $this->model->update(
						"subscribers",
						array("password"),
						array($password),
						"id=" . $subsid
					);

					if ($result) :


						$this->view->show(
							"pages/panel",
							array(
								"password" => "ok",
								"info" => $this->response->success("Your password successfully changed", "/subscriber/panel")
							)
						);


					else :

						$this->view->show(
							"pages/panel",
							array(
								"password" => Session::get("subsid"),
								"info" => $this->response->res("danger", "There is an error occured whilst updateding.")
							)
						);

					endif;

				else :





					$this->view->show(
						"pages/panel",
						array(
							"password" => Session::get("subsid"),
							"info" => $this->response->res("danger", "The current password is wrong.")
						)
					);



				endif;

			endif;


		else :

			$this->bilgi->direktYonlen("/");
		endif;
	} // subs password update


	//***********  Subs panel functions ends


	function ordercompleted()
	{

		if ($_POST) :


			$name = $this->form->get("name")->isEmpty();
			$lastname = $this->form->get("lastname")->isEmpty();
			$email = $this->form->get("email")->isEmpty();
			$phone = $this->form->get("phone")->isEmpty();
			$total = $this->form->get("total")->isEmpty();


			$payment = $this->form->get("payment")->isEmpty();
			$addresspref = $this->form->get("addre_prefe")->isEmpty();
			$paymentType = ($payment == 1) ? "Paypal" : "Credit Card";
			$date = date("d.m.Y");


			if (!empty($this->form->error)) :
				$this->view->show(
					"pages/completed",
					array("info" => $this->response->res("danger", "You must fill mising information in the form"))
				);


			else :

				$orderNo = mt_rand(0, 99999999);
			    $subsid = Session::get("subsid");

				$this->model->stackOperationStart();


				if (isset($_COOKIE["product"])) :


					foreach ($_COOKIE["product"] as $id => $quantity) :

					$product = $this->model->get("products", "where id=" . $id);


						$unitPrice = $product[0]["price"] * $quantity;

						
						$this->model->completeorder(
							array(
								$orderNo,
								$addresspref,
								$subsid,
								$product[0]["productname"],
								$quantity,
								$product[0]["price"],
								$unitPrice,
								$payment,
								$date

							)
						);



					endforeach;


				else :
					// cookie  control
					$this->response->redirect("/");

				endif;


				$this->model->stackOperationEnd();


				Cookie::removeAll(); // drop cart


				$deliveryInfo = $this->model->addToDb(
					"deliveryinfo",
					array("order_no", "name", "lastname", "email", "phone"),
					array(
						$orderNo,
						$name,
						$lastname,
						$email,
						$phone
					)
				);



				if ($deliveryInfo) :

					$this->view->show(
						"pages/completed",
						array(
							"order_no" => $orderNo,
							"total" => $total
						)
					);



				else :

					$this->view->show(
						"pages/complete",
						array("info" => $this->response->res("danger", "There is an error occured whilst order transciton"))
					);

				endif;

			endif;



		else :

			$this->response->redirect("/");
		endif;
	} // ORDER COMPLETED

}
