<?php 
    include 'session.php';
      $apr_date=date('d-m-Y');
			  $query1="update pendingpay set status='1' , apr_date='".$apr_date."' where regno='".$_GET['regno']."'";
			  $query="update emis set status='1', apr_date='".$apr_date."' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query1)==TRUE){		  
				
				  echo '<script>window.location.href="pending.php";</script>';
			  }
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="pending.php";</script>';
			  }
		  

?>
