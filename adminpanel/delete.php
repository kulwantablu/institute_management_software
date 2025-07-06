<?php 
   include'connect.php';
   
   if(isset($_GET['id'])){
	   
	   $query=mysqli_query($conn,"delete from record where id='".$_GET['id']."'");
	   $query1=mysqli_query($conn,"delete from installments where user_id='".$_GET['id']."'");
	    
		echo '<script>window.location.href="records.php";</script>';  
   } 
?>
  