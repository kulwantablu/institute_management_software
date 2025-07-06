<?php 
    include 'session.php';
     
			  $query1="update pendingpay set status='0' where regno='".$_GET['regno']."'";
			  $query="update emis set status='0' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query1)==TRUE){		  
				
				  echo '<script>window.location.href="pending.php";</script>';
			  }
			  
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="pending.php";</script>';
			  }
		  

?>
