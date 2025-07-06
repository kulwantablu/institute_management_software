<?php 
    include 'session.php';
     
			  $query1="update record set constatus='2' where regno='".$_GET['regno']."'";
			  
			 // echo  $query1;
			  $query="update concessionreq set status='2' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query1)==TRUE){		  
				
				  echo '<script>window.location.href="concessionreq.php";</script>';
			  }
			  
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="concessionreq.php";</script>';
			  }
		  

?>
