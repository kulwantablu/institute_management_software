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
     
       $refno = 'AC'; // Initialize with prefix

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
    }
     

	$save = "update record set regno='".$regno."' ,stuname ='".$stuname."',fname ='".$fname."',amount ='".$amount."',pending ='".$pending."',gst ='".$gst."',mop ='".$mop."',tranno ='".$tranno."',cheqno ='".$cheqno."',paydate ='".$paydate."',refno ='".$refno."' where id='".$image_id."'";


$save2 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,amt,paydate,mop,tranno,cheqno)VALUE('".$regno."','".$stuname."','".$fname."','".$amount."','".$paydate."','".$mop."','".$tranno."','".$cheqno."' )");


		
		$save1 =mysqli_query($conn,"INSERT into pendingpay(regno,stuname,fname,email,feepack,packfee,paidamt,pendingfee,pendingpaydate,pendingsts,regby)VALUE('".$regno."','".$stuname."','".$fname."','".$email."','".$feepack."','".$packfee."','".$amount."','".$pending."','".$paydate."','".$sts."','".$_SESSION['user']."')");
		
	
	
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
			  <?php if ($rowc1['paytype']=='Installment'  && isset($rowc1['Installment']))  {
				  
				  echo '<h1  style="text-align: center;font-size: 18px;font-weight: bold;color: #216b77;">Installment Plan ('.$rowc1['Installment'].')</h1>';
				  }elseif($rowc1['paytype']=='Monthly'){
					  
					  echo '<h1  style="text-align: center;font-size: 18px;font-weight: bold;color: #216b77;">Monthly Plan </h1>';
					  
				  }?>
			  
			   <table border='1' style="margin:auto;">
          
			<?php 
			if ($rowc1['paytype']=='Monthly')  {
		   $batchname = $rowc1['batchname'];
		   $sql34="select * from batch WHERE id='$batchname'";
		   $query34=mysqli_query($conn,$sql34);
		   $show34=mysqli_fetch_array($query34);
		   $duration=$show34['duration'];
		  


    $batchname = $rowc1['batchname'];
    $feepack = $rowc1['feepack'];

           $sql33="select * from pack WHERE packname='$feepack'";
		   $query33=mysqli_query($conn,$sql33);
		   $show33=mysqli_fetch_array($query33);
		   $pack_id=$show33['id'];
		   
		   $sql34="select * from batch WHERE id='$batchname'";
		   $query34=mysqli_query($conn,$sql34);
		   $show34=mysqli_fetch_array($query34);
		  //echo $duration=$show34['duration'];
		   
		
    echo '<tr style="background: #216b77;color: white;">
            <th>Sr.No</th>
            <th>Batch Name</th>
            <th>Pack Name</th>
            <th>Amount</th>
            <th>Payment Date</th>
            
          </tr>';


$monthly_amount = $rowc1['packfee']/$duration;
$date=date('d-m-Y');
    // Insert monthly payments (for one year)
    for ($i = 1; $i <= $duration; $i++) {
		 $payment_date = date('d-m-Y', strtotime("+$i month", strtotime($date)));
        echo '<tr style="color: #216b77;font-weight: bold;">
                <td>' . $i . '</td>
                <td>' . $show34['batchname'] . '</td>
                <td>' . $show33['packname'] . '</td>
                <td>Rs.' . $monthly_amount . '</td>
                <td>' .$payment_date . '</td>
                
              </tr>';
    }


  

			}
?>

            
        </table>
		
			  
			  <table border='1' style="margin:auto;">
          
			<?php 
			if ($rowc1['paytype']=='Installment'  && isset($rowc1['Installment']))  {
if (isset($rowc1['Installment']) && isset($rowc1['batchname'])) {
    $installments = $rowc1['Installment'];
    $batchname = $rowc1['batchname'];
    $feepack = $rowc1['feepack'];

           $sql33="select * from pack WHERE packname='$feepack'";
		   $query33=mysqli_query($conn,$sql33);
		   $show33=mysqli_fetch_array($query33);
		   $pack_id=$show33['id'];
		   
		   $sql34="select * from batch WHERE id='$batchname'";
		   $query34=mysqli_query($conn,$sql34);
		   $show34=mysqli_fetch_array($query34);
		  //echo $duration=$show34['duration'];
		   
		
    echo '<tr style="background: #216b77;color: white;">
            <th>Sr.No</th>
            <th>Batch Name</th>
            <th>Pack Name</th>
            <th>Amount</th>
            
          </tr>';

    $sql = "SELECT * FROM installments WHERE emis='$installments' AND batch_id='$batchname' AND pack_id='$pack_id'";
    $query = mysqli_query($conn, $sql);
    $i = 0;
	if (mysqli_num_rows($query) > 0) {
    while ($show = mysqli_fetch_array($query)) {
        $i++;
        echo '<tr style="color: #216b77;font-weight: bold;">
                <td>' . $i . '</td>
                <td>' . $show34['batchname'] . '</td>
                <td>' . $show33['packname'] . '</td>
                <td>Rs.' . $show['amount'] . '</td>
                
              </tr>';
    }
}else{
	
	
	echo '<tr>
            <td colspan="5">Installment Not Available</td>
          </tr>';
}
}
			}
?>

            
        </table>
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			   
			   
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
				  
				  <label>Fee Pack</label>
                    <input type="text" name="feepack"  value="<?php echo $rowc1['feepack']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
				  </div>
				  <div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Total Pack Fee</label>
                    <input type="number" name="packfee" value="<?php echo $rowc1['packfee']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Pay Fee</label>
                    <input type="number" name="amount" min="1" max="<?php echo $rowc1['packfee']; ?>" value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  required>
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
				   <label>Trasaction No.</label>
                    <input type="text" name="tranno" value="<?php echo $rowc1['tranno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                 
				  
                </div>
                </div>
				
				<div id="Cheque" class="hidden">
				<div class="form-group row">
                 
                  <div class="col-sm-12">
				 <label>Cheque No.</label>
                    <input type="text" name="cheqno" value="<?php echo $rowc1['cheqno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
                    
				  
                </div>
                </div>
				
				
               <div class="form-group row">
			   <div class="col-sm-2">
				   </div>
                  <div class="col-sm-8 mb-3 mb-sm-0" style="text-align: center;">
				   <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
                </a>
                  </div> 
				  <div class="col-sm-2">
				   </div>
                </div>   
               
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
