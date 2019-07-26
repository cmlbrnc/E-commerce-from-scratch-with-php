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
}
