<?php require 'views/header.php';  ?>


<?php


 if (isset($data["order_no"]) && isset($data["total"])) :
 
 
 


 if (Session::get("username") && Session::get("subsid")) :
 
  Session::sessionControl(Session::get("username"),Session::get("subsid"));
 
  ?>

	<div class="container" id="sipTamamlaİskelet" >
    
    	<div class="row" id="tamamlandi">
        
        <div class="col-md-12">
        
        
        
        
        <h3 class="alert alert-success">Thank you.You order has been successfully completed.</h3>
        
        <p class="sipno">Order Number : 
		<?php   if (isset($data["order_no"])) :			
			echo $data["order_no"];		
			
            endif; ?><br />Total : 
            <?php   if (isset($data["total"])) :			
			echo number_format($data["total"],2,',','.')." £";		
			
            endif; ?>
            
            </p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quasi eos expedita maxime aperiam est veniam libero esse, unde doloribus ea repellendus possimus odit nihil accusamus impedit assumenda ipsum tempora optio asperiores molestias alias. Aut veritatis exercitationem voluptatibus numquam culpa magnam autem incidunt, maiores atque quibusdam nisi commodi sint inventore? Magnam maiores corrupti culpa quia quam pariatur nostrum eligendi maxime nulla porro nemo suscipit explicabo eaque, repellendus natus consequuntur libero. Illum expedita pariatur adipisci non ad velit! Eligendi culpa placeat alias unde consequatur suscipit optio porro molestias quo eveniet ex, nam dolor fugiat repellendus modi quasi sit explicabo! Illo, libero asperiores.</p>
        		

        </div>
        
        
        
                  <!-- <div class="col-md-12" id="bankalarinAnasi">
                  		<div class="row">
                        
                        		  <div class="col-md-4" id="Bankcerceve">
                                  
                                  			<div class="row" >
                                            		<div class="col-md-12" id="Bankbaslik">İŞ BANKASI</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  
                                  		
                                  
                                  
                                  
                                  </div>
                                  
                                  
                                  
                                  <div class="col-md-4" id="Bankcerceve">
                       			<div class="row" >
                                            		<div class="col-md-12"  id="Bankbaslik">AKBANK</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  </div>
                                  
                                  
                                     <div class="col-md-4" id="Bankcerceve"> 
                               			<div class="row" >
                                            		<div class="col-md-12"  id="Bankbaslik">GARANTİ</div>
                                                    <div class="col-md-3">Hesap Adı</div> 
                                                    <div class="col-md-9">MVC PROJE-OLCİ</div> 
                                               <div class="col-md-3">İBAN</div> 
                                                    <div class="col-md-9">TR06 0000 0000 0000 0000 0000 0000  </div>      
                                          
                                          
                                          
                                            </div>
                                  
                                  </div>
                                  
                                  
                        
                        </div>
                  
                
                 </div> -->
        
        </div>
    
    
	
</div>

<?php
else:
	// controling session
	header("Location:".URL);
	
	endif;
	
	
	
				
 else:
// data is empty?
header("Location:".URL);
 
 endif;
	
?>


<?php require 'views/footer.php'; ?> 		
        
        
        
       