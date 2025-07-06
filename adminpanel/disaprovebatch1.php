<?php 
    include 'session.php';
     
	       $sql00="select * from batchreq where id='".$_GET['id']."'";
		   $query00=mysqli_query($conn,$sql00);
		   $show00=mysqli_fetch_array($query00);
		   $userid=$show00['userid'];
		   
			  $query="update batchreq set status='2' where id='".$_GET['id']."'";
			  mysqli_query($conn, "update record set batchsts='2' where id='".$userid."'");
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="batchreq.php";</script>';
			  }
		  
?>
