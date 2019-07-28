<?php

class Settings  extends Model
{

	public $result, $title, $description, $keywords, $sloganUp1, $sloganDown1, $sloganUp2, $sloganDown2, $sloganUp3, $sloganDown3;




	function __construct()
	{

		parent::__construct();

		$this->result = $this->db->listing("settings");



		$this->title = $this->result[0]["title"];
		$this->description = $this->result[0]["description"];
		$this->keywords = $this->result[0]["keywords"];
		$this->sloganUp1 = $this->result[0]["sloganUp1"];
		$this->sloganDown1 = $this->result[0]["sloganDown1"];
		$this->sloganUp2 = $this->result[0]["sloganUp2"];
		$this->sloganDown2 = $this->result[0]["sloganDown2"];
		$this->sloganUp3 = $this->result[0]["sloganUp3"];
		$this->sloganDown3 = $this->result[0]["sloganDown3"];
	}


	function seo($s)
	{
		$tr = array('ş', 'Ş', 'ı', 'I', 'İ', 'ğ', 'Ğ', 'ü', 'Ü', 'ö', 'Ö', 'Ç', 'ç', '(', ')', '/', ':', ',');
		$eng = array('s', 's', 'i', 'i', 'i', 'g', 'g', 'u', 'u', 'o', 'o', 'c', 'c', '', '', '-', '-', '');
		$s = str_replace($tr, $eng, $s);
		$s = strtolower($s);
		$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
		$s = preg_replace('/\s+/', '-', $s);
		$s = preg_replace('|-+|', '-', $s);
		$s = preg_replace('/#/', '', $s);
		$s = str_replace('.', '', $s);
		$s = trim($s, '-');
		return $s;
	}
	function getLinks()
	{

		$result = $this->db->prepare("select * from main_category");
		$result->execute();


		while ($transfer = $result->fetch(PDO::FETCH_ASSOC)) :


			echo ' <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $transfer["name"] . ' <b class="caret"></b></a>
		            <ul class="dropdown-menu multi-column columns-3">
			            <div class="row">';



			$result2 = $this->db->prepare("select * from child_category where main_cat_id=" . $transfer["id"]);
			$result2->execute();

			while ($transfer2 = $result2->fetch(PDO::FETCH_ASSOC)) :


				echo '<div class="col-sm-4">
					            <ul class="multi-column-dropdown">
									<h6>' . $transfer2["name"] . '</h6>';

				$result3 = $this->db->prepare("select * from 
					alt_category where child_cat_id=" . $transfer2["id"]);
				$result3->execute();

				while ($transfer3 = $result3->fetch(PDO::FETCH_ASSOC)) :

					echo  '<li><a href="' . URL . '/products/category/' . $transfer3["id"] . '/' . $this->seo($transfer3["name"]) . '">' . $transfer3["name"] . '</a></li>';

				endwhile;



				echo '</ul> </div>';



			endwhile;



			echo '<div class="clearfix"></div>
			          	  </div>
		           			 </ul>
		        			</li>';


		endwhile;


		/*	
	
	We are going to update join query
	
	join left right MYSQL	
	dasdas dasdasd anakategori JOİN altkategori ON anaktegori.id=altkatgori.id	
	
	*/
	}


	function newsletter()
	{

		?>
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>NEWSLETTER</h6>
					<div class="sub-left-right">
						<form id="newsletterform" method="POST">
							<input type="text" name="email" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
							<input type="submit" id="newsletterbtn" class="btn " value="Subscribe" />
						</form>

					</div>
					<div class="clearfix"> </div>
				</div>
				<div id="newsletterresult"></div>
			</div>
		</div>
	<?php
	}


	function getProduct($id)
	{

		return $this->db->listing("products", "where id=" . $id);
	} // get Products


	function getSubsOrders($myarray)
	{


		?>

		<div class="row">
			<div class="col-md-12 text-center">



				<?php

				if (count($myarray) != 0) :
					?>

					<table class="table">
						<tbody>


							<tr id="hdr">
								<td>ORDER NO</td>
								<td>PRODUCT NAME</td>
								<td>PRODUCT Quantity</td>
								<td>PRODUCT Price</td>
								<td>TOPLAM Price</td>
								<td>CARGO STATUS</td>
								<td>DATE</td>

							</tr>

							<?php

							foreach ($myarray as $value) :

								echo '<tr id="address-elements">
						
						<td>' . $value["order_no"] . '</span></td>
						<td>' . $value["name"] . '</td>
						<td>' . $value["quantity"] . '</td>
						<td>' . $value["price"] . '</td>
						<td>' . $value["totalprice"] . '</td>
						<td>' . $value["cargostatus"] . '</td>
						<td>' . $value["date"] . '</td>
						
					   
						</tr>';


							endforeach;

							?>
						</tbody>

					</table>


				<?php endif; ?>

			</div>


		</div>



	<?php


	} // PANEL - ÜYENİN SİPARİŞLERİNİ GETİRİYOR

	function getSubsComments($myarray)
	{

		echo '<div class="row"><div class="col-md-12 text-center">';
		echo count($myarray) > 0 ? '<div class="alert alert-info">You have '.count($myarray) . " comments </div>" : '<div class="alert alert-info">There is no comment.</div>';

		if (count($myarray) != 0) :
			echo '<table class="table">
						<tbody> 
						<tr id="hdr">
						<td>Your Comment</td>
						<td>Product</td>
						<td>Date</td>
						<td>Status</td>
						<td>Update</td>
						<td>Delete</td>                   
						</tr>';

			foreach ($myarray as $value) :

				$product = $this->getProduct($value["productid"]);
				echo '<tr id="adresElemanlar">
						<td><span class="sp' . $value["id"] . '">' . $value["context"] . '</span></td>
						<td>' . $product[0]["productname"] . '</td>
						<td>' . $value["date"] . '</td>
						<td>';
				echo ($value["status"] == 0) ? "<span class='approved'>Approved</span>" : "<span class='unapproved'>unapproved</span>";
				echo '</td>					
						<td id="mainupdatebtn">					
						<input type="button" class="btn btn-sm btn-success" data-value="' . $value["id"] . '" value="Update"></td> <td>'; ?>

				<a onclick='Remove("<?php echo $value["id"] ?>","deletecomment")' class="btn btn-sm btn-danger">Delete</a> <?php echo '</td> </tr>';

			endforeach;

				echo '</tbody></table>';
				endif;

			echo '</div></div>';
						} // PANEL - Subscriber comments coming




	function getSubsAddresses($myarray)
							{

		echo ' <div class="row"><div class="col-md-12 text-center">';

		echo count($myarray) > 0 ? '<div class="alert alert-info">You have' . count($myarray) . " address(es)</div>" : '<div class="alert alert-info">There is no registered address .</div>';
		echo '</div>';

		foreach ($myarray as $value) :
		echo '<div class="col-md-2 text-center" id="address-structure">

		<div class="row" id="address-elements">
			<div class="col-md-12" id="addressid">
				<span class="addressSp' . $value["id"] . '">' . $value["name"] . '</span></div>
					<div class="col-md-6" id="addressupdatebtn">
								
		<input type="button" class="btn btn-sm btn-success" data-value="' . $value["id"] . '" id="address-updatebtn" value="Update">					
								
				</div>						
				<div class="col-md-6">'; ?>

			<a onclick='Remove("<?php echo $value["id"] ?>","deleteaddress")' class="btn btn-sm btn-danger" id="address-deletebtn">Delete</a> <?php echo '</div>                        
			</div></div>';
			endforeach;


			echo '</div>';
	} // PANEL -  get the addresses of subs

	function getAccountSettings($myarray){

			if ($myarray != "ok") :
			?>
			<div class="row text-center">
				<div class="col-md-4"></div>
				<div class="col-md-4 text-center" id="cntr">

					<!--  Rows starts-->

					<div class="row text-center" id="rws">
						<div class="col-md-12" id="rwshdr">Account Settings</div>


						<div class="col-md-5">
							<?php Form::element_init("1", array(
								"action" => URL . "/subscriber/updatesettings",
								"method" => "POST"
							));   ?>
							<label>Name</label></div>
						<div class="col-md-7"><?php
												Form::element_init("2", array("type" => "text", "name" => "name", "value" => $myarray[0]["name"], "class" => "form-control")); ?>
						</div>

						<!--  --------->
						<div class="col-md-5"><label>Surname</label></div>
						<div class="col-md-7"> <?php
												Form::element_init("2", array("type" => "text", "name" => "lastname", "value" => $myarray[0]["lastname"], "class" => "form-control")); ?>
						</div>

						<!--  --------->
						<div class="col-md-5"><label>Email</label></div>
						<div class="col-md-7"> <?php
												Form::element_init("2", array("type" => "text", "name" => "email", "value" => $myarray[0]["email"], "class" => "form-control")); ?>
						</div>

						<!--  --------->
						<div class="col-md-5"><label>Phone</label></div>
						<div class="col-md-7"><?php
												Form::element_init("2", array("type" => "text", "name" => "phone", "value" => $myarray[0]["phone"], "class" => "form-control")); ?>
						</div>

						<!--  --------->
						<div class="col-md-12">
							<?php
							Form::element_init("2", array("type" => "hidden", "name" => "subsid", "value" => $myarray[0]["id"]));
							Form::element_init("2", array("type" => "submit", "class" => "btn", "value" => "Update"));
							//Form::element_init("close");
							?>
						</div>


					<?php

					endif;
					?>



				</div>

				<!--  Rows end-->


			</div>
			<div class="col-md-4"></div>
		</div>






	<?php



	}  // PANEL - Subscriber settings

	function changeSubsPassword($myarray)
	{

		if ($myarray != "ok") :




			?>




			<div class="row text-center">
				<div class="col-md-4"></div>
				<div class="col-md-6 text-center" id="cntr">

					<!--  Rows start-->

					<div class="row text-center" id="rows">
						<div class="col-md-12" id="rowshdr">CHANGE PASSWORD</div>


						<div class="col-md-5">
							<?php
							Form::element_init("1", array(
								"action" => URL . "/subscriber/updatepassword",
								"method" => "POST"
							));


							?>

							<label>Current Password</label></div>
						<div class="col-md-7">
							<?php
							Form::element_init("2", array("type" => "password", "name" => "cpassword", "class" => "form-control")); ?>
						</div>
						<!--  --------->
						<div class="col-md-5"><label>New Password</label></div>
						<div class="col-md-7">
							<?php
							Form::element_init("2", array("type" => "password", "name" => "new1", "class" => "form-control")); ?>
						</div>

						<!--  --------->
						<div class="col-md-5"><label>Password(recap)</label></div>
						<div class="col-md-7">
							<?php
							Form::element_init("2", array("type" => "password", "name" => "new2", "class" => "form-control")); ?>
						</div>


						<!--  --------->
						<div class="col-md-12">
							<?php
							Form::element_init("2", array("type" => "hidden", "name" => "subsid", "value" => $myarray)); ?>

							<?php
							Form::element_init("2", array("type" => "submit", "class" => "btn", "value" => "Change")); ?>
						</div>

					<?php endif; ?>


				</div>

				<!--  Rows End-->


			</div>
			<div class="col-md-4"></div>
		</div>






	<?php

	} // PANEL - ÜYENİN ŞİFRE DEĞİŞTİRME

	//*****************************************************

	function UyeBilgileriniGetir()
	{

		return $this->db->listele("uye_panel", "where id=" . Session::get("uye"));
	} // SİPARİŞ TAMAMLA - ÜYE BİLGİLERİNİ GETİRİYOR

	function UyeAdresleriniGetir()
	{

		return $this->db->listele("adresler", "where uyeid=" . Session::get("uye"));
	} // SİPARİŞ TAMAMLA - ÜYE ADRESLERİ GETİRİYOR	
}
