<?php 
    include 'session.php';
     
	 $sql0004 = "SELECT * from installments where id='".$_GET['emi_id']."'";
$result0004 = mysqli_query($conn,$sql0004);
$rowc0004 = mysqli_fetch_assoc($result0004);

$amount=$rowc0004['amount'];

	           $sql00="select * from record where regno='".$_GET['regno']."'";
			   $query00=mysqli_query($conn,$sql00);
			   $show00=mysqli_fetch_array($query00);
			   $stuname=$show00['stuname'];
			   $fname=$show00['fname'];
			   $pending=$show00['pending'];
			   
			   
			   $sql001="select * from concessionreq where id='".$_GET['id']."'";
			   $query001=mysqli_query($conn,$sql001);
			   $show001=mysqli_fetch_array($query001);
			   $amt=$show001['amt'];
			   $date=$show001['date'];
			   $regby=$show001['regby'];
			  
			   $total=$pending-$amt;
			   $remarks=$show001['remarks'];
			   
			   
			   $pencon=$amount-$amt;
			   
			  $query1="update concessionreq set status='1' where id='".$_GET['id']."'";
			$save2 =mysqli_query($conn,"INSERT into concession(regno,stuname,fname,amt,remarks,date,regby)VALUE('".$_GET['regno']."','".$stuname."','".$fname."','".$amt."','".$remarks."','".$date."','".$regby."')");
	 
	 $save3 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,concession,paydate,regby)VALUE('".$_GET['regno']."','".$stuname."','".$fname."','".$amt."','".$date."','".$regby."')");

$save1=mysqli_query($conn,"update record set pending ='".$total."',concession ='".$amt."',constatus='1' where regno='".$_GET['regno']."'");

mysqli_query($conn,"update pendingpay set pendingfee ='".$total."',concession ='".$amt."' where regno='".$_GET['regno']."'");

	mysqli_query($conn,"update installments set amount ='".$pencon."',concession ='".$amt."' where id='".$_GET['emi_id']."'");
	
			  if(mysqli_query($conn,$query1)==TRUE){		  
				
				  echo '<script>window.location.href="concessionreq.php";</script>';
			  }
			  if(mysqli_query($conn,$query)==TRUE){		  
				
				  echo '<script>window.location.href="concessionreq.php";</script>';
			  }

?>
