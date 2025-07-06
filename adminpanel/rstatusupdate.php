<?php 
    include 'session.php';
     
	 $sql00="select * from record where regno='".$_GET['regno']."'";
			   $query00=mysqli_query($conn,$sql00);
			   $show00=mysqli_fetch_array($query00);
			   $stuname=$show00['stuname'];
			   $fname=$show00['fname'];
			   $amount=$show00['amount'];
			   
			   
			   $sql001="select * from refundreq where id='".$_GET['id']."'";
			   $query001=mysqli_query($conn,$sql001);
			   $show001=mysqli_fetch_array($query001);
			   $amt=$show001['amt'];
			   $date=$show001['date'];
			   $regby=$show001['regby'];
			   
			    $total=$amount-$amt;
			   $remarks=$show001['remarks'];
			   
			   
			   $save2 ="INSERT into refund(regno,stuname,fname,amt,remarks,date,status,regby)VALUE('".$_GET['regno']."','".$stuname."','".$fname."','".$amt."','".$remarks."','".$date."','1','".$regby."')";
	 
	 $save3 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,refund,remarks,paydate,regby)VALUE('".$_GET['regno']."','".$stuname."','".$fname."','".$amt."','".$remarks."','".$date."','".$regby."')");

$save1=mysqli_query($conn,"update record set amount ='".$total."',refund ='".$amt."',remarks ='".$remarks."',refundsts ='1' where regno='".$_GET['regno']."'");


	$save = mysqli_query($conn,"update pendingpay set paidamt ='".$total."',refund ='".$amt."' where regno='".$_GET['regno']."'");
	
	$query=mysqli_query($conn,"update refundreq set status='1' where id='".$_GET['id']."'");
			   
			   
			  
			  
			  if(mysqli_query($conn,$save2)==TRUE){		  
				
				  echo '<script>window.location.href="refundreq.php";</script>';
			  }
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="refundreq.php";</script>';
			  }
		  

?>
