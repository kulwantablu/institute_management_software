<?php 
    include 'session.php';
     
			   $sql00="select * from batchreq where id='".$_GET['id']."'";
			   $query00=mysqli_query($conn,$sql00);
			   $show00=mysqli_fetch_array($query00);
			   $userid=$show00['userid'];
			   $newbatch=$show00['newbatch'];
			   
			  $query="update batchreq set status='1'  where id='".$_GET['id']."'";
			 // echo "update record set batchsts='1' where userid='".$userid."'";
			  mysqli_query($conn, "update record set batchsts='1' ,batchname ='".$newbatch."' where id='".$userid."'");
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="batchreq.php";</script>';
			  }
?>
