<?php 
include 'session.php';
$reg='';
$total='';
$totalpending='';
//$concession=0;


if(isset($_GET['reg'])){
	$reg=$_GET['reg'];
}

     $regno='';
	 
	 $stuname='';
	 
	 $er='';
	  if(isset($_POST['Submit'])){
  
 $mop=$_POST['mop'];
     $tranno=$_POST['tranno'];
     $cheqno=$_POST['cheqno'];
     $stuname=$_POST['stuname'];
     $fname=$_POST['fname'];
	 
	 $paydate=date('d-m-y');
	 
     $amount=$_POST['amount'];
     $packfee=$_POST['packfee'];
    $pending=$_POST['pending'];
	
	if(empty($_POST['concession'])){
		
		$concession=0;
	}else{
		
		$concession=$_POST['concession'];
	}
      
	  
	  
	  
     $total=$amount+$pending;
     $total1=$amount+$pending+$concession;
	 
	 $totalpending=$packfee-$total1;
	 
	 //echo $total;
	 
	 if($packfee==$total){
		
		$sts=1;
		
	}else{
		$sts=0;
		
	}
	 
	 
     $save2 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,amt,paydate,mop,tranno,cheqno)VALUE('".$reg."','".$stuname."','".$fname."','".$pending."','".$paydate."','".$mop."','".$tranno."','".$cheqno."')");

$save1=mysqli_query($conn,"update record set amount ='".$total."',pending ='".$totalpending."' where regno='".$reg."'");


	$save = "update pendingpay set pendingpaydate ='".$paydate."',paidamt ='".$total."',pendingfee ='".$totalpending."',pendingsts ='".$sts."' where regno='".$reg."'";

	if(mysqli_query($conn,$save)){
		
		
		
		echo '<script>window.location.href="pending.php";</script>';
		
	}else{
		
		$er="Data Not updated".mysqli_error($conn);
		
	}				
	
	  }
	  
	  
$sql1 = "SELECT * from record where regno='$reg'";
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Register</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			   
			   
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Reg No.</label>
                    <input type="text" name="regno" value="<?php echo $rowc1['regno']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  readonly>
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
                 
				   
                  <div class="col-sm-4">
				 <label>Total Pack Fee</label>
                    <input type="number" name="packfee" value="<?php echo $rowc1['packfee']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-4">
				  
				  <label>Paid Fee</label>
                    <input type="number" name="amount" min="1" max="<?php echo $rowc1['packfee']; ?>" value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				   <div class="col-sm-4">
				  
				  <label>Concession Fee</label>
                    <input type="number" name="concession"  value="<?php echo $rowc1['concession']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
				 
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				  
				  <label>Pending Fee</label>
                    <input type="number" name="pending" min="1" max="<?php echo $rowc1['pending']; ?>" value="<?php echo $rowc1['pending']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
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
