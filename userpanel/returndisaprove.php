<?php 
    include 'session.php';
     
			  $query="update applyleave set returns='0' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="onleave.php";</script>';
			  }
		  

?>
