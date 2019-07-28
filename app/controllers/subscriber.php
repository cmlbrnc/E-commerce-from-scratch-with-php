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
			print_r($result);
			if (count($result) > 0) {

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



				$sonuc = $this->model->update(
					"subscribers",
					array("name", "lastname", "email", "phone"),
					array($name, $lastname, $email, $phone),
					"id=" . $subsid
				);

				if ($sonuc) :

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


	function siparisTamamlandi()
	{

		if ($_POST) :


			$ad = $this->form->get("ad")->bosmu();
			$soyad = $this->form->get("soyad")->bosmu();
			$mail = $this->form->get("mail")->bosmu();
			$telefon = $this->form->get("telefon")->bosmu();
			$toplam = $this->form->get("toplam")->bosmu();


			$odeme = $this->form->get("odeme")->bosmu();
			$adrestercih = $this->form->get("adrestercih")->bosmu();
			$odemeturu = ($odeme == 1) ? "Nakit" : "Hata";
			$tarih = date("d.m.Y");


			if (!empty($this->form->error)) :
				$this->view->goster(
					"sayfalar/siparistamamla",
					array("bilgi" => $this->bilgi->uyari("danger", "Bilgiler eksiksiz doldurulmalıdır"))
				);


			else :

				$siparisNo = mt_rand(0, 99999999);
				$uyeid = Session::get("uye");

				$this->model->TopluislemBaslat();


				if (isset($_COOKIE["urun"])) :


					foreach ($_COOKIE["urun"] as $id => $adet) :

						$GelenUrun = $this->model->SiparisTamamlamaUrunCek("urunler", "where id=" . $id);


						$birimfiyat = $GelenUrun[0]["fiyat"] * $adet;

						$this->model->SiparisTamamlama(
							array(
								$siparisNo,
								$adrestercih,
								$uyeid,
								$GelenUrun[0]["urunad"],
								$adet,
								$GelenUrun[0]["fiyat"],
								$birimfiyat,
								$odemeturu,
								$tarih

							)
						);



					endforeach;


				else :
					// cookie  tanımlı değilse diye bir knotrol
					$this->bilgi->direktYonlen("/");

				endif;


				$this->model->TopluislemTamamla();


				Cookie::SepetiBosalt(); // sepeti boşalttık


				$TeslimatBilgileri = $this->model->Ekleİslemi(
					"teslimatbilgileri",
					array("siparis_no", "ad", "soyad", "mail", "telefon"),
					array(
						$siparisNo,
						$ad,
						$soyad,
						$mail,
						$telefon
					)
				);



				if ($TeslimatBilgileri) :

					$this->view->goster(
						"sayfalar/siparistamamlandi",
						array(
							"siparisno" => $siparisNo,
							"toplamtutar" => $toplam
						)
					);



				else :

					$this->view->goster(
						"sayfalar/siparisitamamla",
						array("bilgi" => $this->bilgi->uyari("danger", "Sipariş oluşturulurken hata oluştu"))
					);

				endif;

			endif;



		else :

			$this->bilgi->direktYonlen("/");
		endif;
	} // SİPARİŞ TAMAMLANDI

}
