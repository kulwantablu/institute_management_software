<?php 
    include 'session.php';
      $apr_date = date('d-m-Y');
			  $query="update record set status='0', apr_date = '".$apr_date."' where id='".$_GET['id']."'";
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="slip.php";</script>';
			  }
		  

?>
