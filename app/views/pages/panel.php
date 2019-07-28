<?php require 'views/header.php';  ?>


<?php 

	echo  @$_POST["commentid"];
	
	

if (Session::get("username") && Session::get("subsid")) {
	Session::sessionControl(Session::get("username"),Session::get("subsid")); ?>

	<div class="container" id="subscont">
    
    	<div class="row">
        
        	<div class="col-md-2" id="menu">
            
            	<div class="row" id="subspanel">
                
                	<div class="col-md-12" id="hdr">Settings</div>
                    <ul>
           <li><a href="<?php echo URL; ?>/subscriber/orders">Orders</a></li>
           <li><a href="<?php echo URL; ?>/subscriber/account">Account</a></li>
           <li><a href="<?php echo URL; ?>/subscriber/password">Password </a></li>
           <li><a href="<?php echo URL; ?>/subscriber/address">Address</a></li>
           <li><a href="<?php echo URL; ?>/subscriber/comments">Comments</a></li>
           <li><a href="<?php echo URL; ?>/subscriber/logout">Logout</a></li>
                        
                    </ul>
                
                
                </div>
            	
            
            
            </div>
            
            
        <div class="col-md-10">
          <div class="alert alert-success text-center" id="panelresult"></div>
        <?php
        
    
        
        
        foreach ($data as $key => $values) :
        
        
        		switch ($key) :
                
        		case "comments":
        	
        		$settings->getSubsComments($data["comments"]);
        		break;
                
        		case "addresses":
        		$settings->getSubsAddresses($data["addresses"]);
        		break;
                
        		case "account":
        		if (isset($data["info"])) :
        		echo $data["info"];
        		endif;
        		$settings->getAccountSettings($data["account"]);
        		break;
                
        		case "password":
        		if (isset($data["info"])) :
        		echo $data["info"];
        		endif;
        		$settings->changeSubsPassword($data["password"]);
        		break;
                                
        		case "orders":
        		$settings->getSubsOrders($data["orders"]);
        		break;
                
                                
                
                
        		endswitch;
        
        
        endforeach;
        
        
        
        ?>
        
        
        </div>

        
        </div>
    
    
	
</div>

<?php
}else{
  	
	header("Location:".URL);
}


?>


<?php require 'views/footer.php'; ?> 		
        
        
        
       