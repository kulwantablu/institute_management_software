<?php 
    include 'session.php';
     
			  $query="update applyleave set status='1' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="leavereq.php";</script>';
			  }
		  

?>
