<?php

class  Cookie {
	

	
	
	public static function addtoCart($id,$number){
		
		if (isset($_COOKIE["product"])) :
		
		
					if (array_key_exists($id,$_COOKIE["product"])) :
						
					$getnumber=$_COOKIE["product"][$id]; 
					$finalnumber=$getnumber + $number; 
						
					setcookie('product['.$id.']',$finalnumber, time()+ 60*60*24,"/");
					
					else:
					
					setcookie('product['.$id.']',$number, time()+ 60*60*24,"/");
					
					endif;
					
	else:
	
	setcookie('product['.$id.']',$number, time()+ 60*60*24,"/");
		
		
	endif;
		
	
	
			
		
	
		
	}
	
		
	public static function getCart(){
		
		if (isset($_COOKIE["product"])) :
		
		
				foreach ($_COOKIE["product"] as $id => $number) :
				
				echo "Product İd : ". $id. " the number of items : ". $number."<br>";
				
				endforeach;
		
		
		
		
		else:
		
		// eğer ki ürün yok ise buradan uytarı döndürebilirz.
		return false;
		
		endif;
		
		
		
		
	
		
	}
	
	
	public static function removeProduct($id){
		
		if (isset($_COOKIE["product"])) :
		
		setcookie('product['.$id.']',false, time()-2 ,"/");
				
		
		endif;		
		
		
	
		
	}
	
		public static function UpdateCart($id,$number){
		
		if (isset($_COOKIE["product"])) :
		
		/*$numberal=$_COOKIE["product"][$id]; // burada mevcut numberi alıyorum
		$sonadet=$adetal + $adet; // 8 rakamı ulaştım
		
		// 17   adet 6
		// 17   adet 2*/
		
		setcookie('product['.$id.']',$number, time()+ 60*60*24,"/");
				
		
		endif;		
		
		
	
		
	}
	
	
	
	
		public static function removeAll(){
		
		if (isset($_COOKIE["product"])) :
		
		
				foreach ($_COOKIE["product"] as $id => $number) :
				
				setcookie('product['.$id.']',$number, time()-2 ,"/");
				
				endforeach;
		
		
		
		
		endif;
		
		
		
		if (!isset($_COOKIE["product"])) :
		
		// SEPET BOŞALINCA BURADA DÖNECEK
		return true;
		
		endif;
		
		
		
		
	
		
	}
		
	
	
	
	
	

	
}




?>