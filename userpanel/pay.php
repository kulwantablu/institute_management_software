<?php 
include 'session.php';
$image_id='';
$pending=0;

if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}

     $regno='';
	 $stuname='';
	 $fname='';
	 $amount='';
	 $gst='';
	 $mop='';
	 $address='';
	 $cheqno='';
	
	 $er='';
	  if(isset($_POST['Submit'])){
     $regno=$_POST['regno'];

     $stuname=$_POST['stuname'];    
     $fname=$_POST['fname'];
	 $amount=$_POST['amount'];    
	 $email=$_POST['email'];    
	 $feepack=$_POST['feepack'];    
	 $packfee=$_POST['packfee'];    
	 $id=$_POST['id'];
	 $concession=$_POST['concession'];
     $gst=$_POST['gst'];
     $mop=$_POST['mop'];
     $tranno=$_POST['tranno'];
     $cheqno=$_POST['cheqno'];
     $paydate=date('d-m-y');
    
	if($packfee==$amount){
		
		$sts=1;
		
	}else{
		$sts=0;
		
	}
	 
	 $sql5 = "SELECT * from record where id='$image_id'";
$result5 = mysqli_query($conn,$sql5);
$rowc5 = mysqli_fetch_assoc($result5);

$pending= $rowc5['packfee']-$amount;
     
      /* $refno = 'AC'; // Initialize with prefix

    // Assuming $conn is your database connection

    // Find the last used reference number
    $query = "SELECT MAX(SUBSTRING(refno, 3)) as max_ref FROM record";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $max_ref = $row['max_ref'];

    if ($max_ref !== null) {
        // Increment the reference number
        $max_ref = (int)$max_ref + 1;
        $refno .= str_pad($max_ref, 4, '0', STR_PAD_LEFT); // Pad with zeros
    } else {
        // If no previous records, start from 1
        $refno .= '0001';
    }*/
	
	
	$query = "SELECT MAX(refno) as max_ref FROM record";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$max_ref = $row['max_ref'];

if ($max_ref !== null) {
    // Increment the reference number
    $new_ref = (int)$max_ref + 1;
} else {
    // If no previous records, start from 3000
    $new_ref = 3000;
}
     

	$save = "update record set regno='".$regno."' ,stuname ='".$stuname."',fname ='".$fname."',amount ='".$amount."',pending ='".$pending."',gst ='".$gst."',mop ='".$mop."',tranno ='".$tranno."',cheqno ='".$cheqno."',paydate ='".$paydate."',refno ='0' where id='".$image_id."'";


$save2 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,amt,paydate,mop,tranno,cheqno,regby)VALUE('".$regno."','".$stuname."','".$fname."','".$amount."','".$paydate."','".$mop."','".$tranno."','".$cheqno."','".$_SESSION['user']."' )");
 
$save3 =mysqli_query($conn,"update installments set status='1'  where id='".$id."'");
		
		$save1 =mysqli_query($conn,"INSERT into pendingpay(regno,stuname,fname,email,feepack,packfee,paidamt,pendingfee,pendingpaydate,pendingsts,regby)VALUE('".$regno."','".$stuname."','".$fname."','".$email."','".$feepack."','".$packfee."','".$amount."','".$pending."','".$paydate."','".$sts."','".$_SESSION['user']."')");
		
	/*if (isset($concession) && $concession != 0) {
		
	$total22=$pending-$concession;
		
		 $save2 =mysqli_query($conn,"INSERT into concession(regno,stuname,fname,amt,date,status)VALUE('".$regno."','".$stuname."','".$fname."','".$concession."','".$paydate."','0')");
	 
	 $save3 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,concession,paydate)VALUE('".$regno."','".$stuname."','".$fname."','".$concession."','".$paydate."')");

$save1=mysqli_query($conn,"update record set pending ='".$total22."', concession ='".$concession."',constatus ='0' where regno='".$regno."'");

$save4=mysqli_query($conn,"update pendingpay set pendingfee ='".$total22."',concession ='".$concession."' where regno='".$regno."'");


	}*/	
		
		


	
	
	if(mysqli_query($conn,$save)){
		
		
		
		
		echo '<script>window.location.href="slip.php";</script>';
		
	}else{
		
		$er="Data Not updated".mysqli_error($conn);
		
	}				
	
	  }
	  
	  
$sql1 = "SELECT * from record where id='$image_id'";
$result1 = mysqli_query($conn,$sql1);
$rowc1 = mysqli_fetch_assoc($result1);



   
?>

<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="images/favicon.png" rel="icon" />
  <title>Digital Dreams</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
	  

.btn-primary:hover {

    background-color: black;
    border-color: black;
}
	  .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #009e4a;
    border-color: #009e4a;
}
	  
	  </style>
   <style>
   #mainlink{
	   color:white;
	   font-size:20px;	   
   }
    #mainlink:hover{
	   color:white;
	   text-decoration:none;
	   color:blue;   
   }
   .bg-primary{
	      background-color:#2d7752!important;
	   
   }
   .btn-success {
    color: #fff;
    background-color:#2d7752;
    border-color:#2d7752;
	    margin: 5px;

}
   .btn-success:hover {
    color: #fff;
    background-color:black;
    border-color: black;
}
.border-left-primary {
    border-left: .25rem solid #2d7752!important;
}
.border-left-success {
    border-left: .25rem solid #2d7752!important;
}
.text-success {
    color: black!important;
}
.p-5 {
    padding: 0px!important;
}
label{
     font-weight:bold;
	 color:black;
}
.form-control{
border:solid 1px black;
}

 th{
	 
	    text-align: center;
    padding: 10px;
 }
  td{
	 
	    text-align: center;
    padding: 10px;
 }
 

   </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
       <!-- End of Topbar -->


<?php include("header.php"); ?>
        <!-- Begin Page Content -->
        <div class="container">

          <!-- Page Heading -->

          <!-- Content Row -->

				  <div class="row">
       <div class="col-lg-12">
            <div class="p-5">
			<div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Pay Fee</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php if($rowc1['paytype']!='Full Advance'){?>
			  
			   <table border='1' style="margin:auto;">
          
			<tr style="background: #216b77;color: white;">
            <th>Sr.No</th>
            <th>Batch Name</th>
            <th>Pack Name</th>
            <th>Amount</th>
            <th>Payment Date</th>
           <!-- <th>Concession</th>
            <th>Fine</th>-->
            <th>Pay Type</th>
            <th>Get</th>
            <th>Customize</th>
          </tr>
		 <?php  
		   $sql="select * from installments where user_id='" . $image_id . "' ";
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		  
		   while($show=mysqli_fetch_array($query))
		   {
			   $i++;
			 $originalDate = $show['paydate']; // Assuming $show['paydate'] is in 'd-m-Y' format

             $newFormat = date('d-m-Y', strtotime($originalDate)); // Change 'Y-m-d' to your desired format

//echo $newFormat;

			   $sql1="select * from batch where id='".$show['batch_id']."'";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		   
		       
		   $sql3="select * from pack where id='".$show['pack_id']."' ORDER BY id ASC";
		   $query3=mysqli_query($conn,$sql3);
		   $show3=mysqli_fetch_array($query3);
		   
		   
			   ?>
		  <tr style="color: #216b77;font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td><?php echo $show1['batchname'];?></td>
                <td><?php echo $show3['packname'];?></td>
                <td>Rs.<?php echo $show['amount'];?>/-</td>
                <td><?php echo $newFormat;?></td>
                <!--<td><?php echo $show['concession'];?></td>
                <td><?php echo $show['fine'];?></td>-->
                <td><?php echo $show['paytype'];?></td>
				<td>
			<?php if($show['status']=='0'){?> <button class="btn btn-success" onclick="fetchAmount(<?php echo htmlspecialchars(json_encode($show['amount'])); ?>, <?php echo htmlspecialchars(json_encode($show['id'])); ?>)">Fetch Fee</button> <?php }else{?>  
<button class="btn btn-danger" >Paid</button>

			<?php } ?>
                
            
        </td>
		<td>
			<?php if($show['status']=='0'){?><a href="customefee1.php?userid=<?php echo $_GET['id']; ?>&id=<?php echo $show['id']; ?>" class="btn btn-primary">Customize Fee</a><?php }else{?> 
 <button class="btn btn-danger" >Unable Customize</button>

			<?php } ?>
        </td>
                
              </tr>
            <?php  }  ?>  
        </table>
			  <?php } 
			  if($rowc1['paytype']!='Full Advance'){
			$sql = "SELECT SUM(amount) AS total_amount FROM installments WHERE user_id='" .$image_id. "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_amount = $row['total_amount'];
			  echo '<h1 style="text-align:center;"><span style="color: red;font-weight: bold;font-size: 20px;margin-top: 20px;display: inline-block;">EMI Total: ' . $total_amount . '</span><br><span style="color: red;font-weight: bold;font-size: 20px;margin-top: 20px;display: inline-block;">Total Pack Fee: ' . $rowc1['packfee'] . '</span></h1>';}?>
			  
			  
			  <?php echo $er; ?>
               <form role="form" action="" method="post"  enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			   
			   
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Registration No.</label>
                    <input type="text" name="regno" value="<?php echo $rowc1['regno']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  readonly>
					
					<input type="hidden" name="email" value="<?php echo $rowc1['email']; ?>"  >
					<input type="hidden" name="feepack" value="<?php echo $rowc1['feepack']; ?>"  >
					<input type="hidden" name="packfee" value="<?php echo $rowc1['packfee']; ?>"  >
				   </div>
                  
				  
				   <div class="col-sm-6">
				   <label>Student Name</label>
                    <input type="text" name="stuname" value="<?php echo $rowc1['stuname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
				  
                </div>
				
				<div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Father Name</label>
                    <input type="text" name="fname" value="<?php echo $rowc1['fname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Mobile No.</label>
                    <input type="text" name="mobno"  value="<?php echo $rowc1['mobno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
				  </div>
				  <div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Total Pack Fee</label>
                    <input type="number" name="packfee" value="<?php echo $rowc1['packfee']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Pay Fee</label>
                    <input type="number" name="amount" id="payFeeInput" min="1" max="<?php echo $rowc1['packfee']; ?>" value="<?php echo $rowc1['packfee']; ?>" class="form-control form-control-user" readonly>
					<input type="hidden" name="id" id="payFeeid" value="" class="form-control form-control-user">
					<input type="hidden" name="concession" id="concession" value="" class="form-control form-control-user">
                  </div>
				  
				 
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>GST (%)</label>
                    <input type="number" name="gst" value="18" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
                  <div class="col-sm-6">
				 <label>Mode of Payment</label>
				 
				 <select class="form-control form-control-user" name="mop" id="selectBox" required>
				   <option Value="">-- select --</option>
				   <option Value="Online">Online</option>
				   <option Value="Cash">Cash</option>
				   <option Value="Cheque">Cheque</option>
				 </select>
                    
                  </div>
                </div>
				<div id="Online" class="hidden">
				<div class="form-group row">
            <div class="col-sm-12">
                <label>Transaction No.</label>
                <input type="text" name="tranno" value="" class="form-control form-control-user" id="bank_date_incorporation">
            </div>
        </div>
                </div>
				
				<div id="Cheque" class="hidden">
				<div class="form-group row">
                 
                  <div class="col-sm-12">
				 <label>Cheque No.</label>
                    <input type="text" name="cheqno" value="" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
                    
				  
                </div>
                </div>
				
				<?php if($rowc1['paytype']!='Full Advance'){?>
               <!--<div class="form-group row" id="btnssa" style="display:none;">
			   
                  <div class="col-sm-12 mb-3 mb-sm-0" style="text-align: center;">
				   <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
                </a>
                  </div> 
				 
                </div>-->
				
				<div style="text-align:center;">
				<?php 
if ($total_amount == $rowc1['packfee']) { ?>
    <div class="form-group row" id="btnssa" style="display:none;">
        <div class="col-sm-12 mb-3 mb-sm-0" style="text-align: center;">
            <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
        </div> 
    </div> 
<?php } else { 
    echo '<p style="color:red;font-size:18px;"><span style="color:red;font-size:23px;font-weight:bold;">Warning!</span> Total Pack Fee and EMI Total are not equal, please check the custom fee again.</p>';
} 
?>
</div>

				<?php }else{?>				
               
			   <div class="form-group row" >
			   
                  <div class="col-sm-12 mb-3 mb-sm-0" style="text-align: center;">
				   <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
                </a>
                  </div> 
				 
                </div>
				
				<?php }?>
              </form>
           
            </div>
          </div>
              </div>
            </div>
            </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
           
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

 <script>
function fetchAmount(amount, id, concession) {
    document.getElementById('payFeeInput').value = amount;
    document.getElementById('payFeeid').value = id;
    document.getElementById('concession').value = concession;
	 document.getElementById('btnssa').style.display = 'block';
}
</script>

   <script>
        $(document).ready(function(){
            $('#selectBox').change(function(){
                $('.hidden').hide();
                $('#' + $(this).val()).show();
            });
        });
    </script>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
