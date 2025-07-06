<?php 
include 'session.php';
$reg='';
$total='';
$totalpending='';


if(isset($_GET['reg'])){
	$reg=$_GET['reg'];
}

     $regno='';
	 
	 $stuname='';
	 $remarks='';
	 
	 $er='';
	  if(isset($_POST['Submit'])){
  

     $stuname=$_POST['stuname'];
     $fname=$_POST['fname'];
	 
	 $date=date('d-m-y');
	 
     $amt=$_POST['refund'];
     $amount=$_POST['amount'];
     $remarks=$_POST['remarks'];

     //$total=$amount-$amt;
	 
	 
	 
	 //echo $total;
	 
	 
     $save2 ="INSERT into refundreq(regno,stuname,fname,amt,remarks,regby,date,status)VALUE('".$reg."','".$stuname."','".$fname."','".$amt."','".$remarks."','".$_SESSION['user']."','".$date."','0')";




mysqli_query($conn,"update record set refundsts ='0',refund ='0' where regno='".$reg."'");
	

	if(mysqli_query($conn,$save2)){
		
		
		
		echo '<script>window.location.href="refund.php";</script>';
		
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Refund Amount</h2>
			
			 		  
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
					<input type="hidden" name="fname" value="<?php echo $rowc1['fname']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  
				  
				   <div class="col-sm-6">
				   <label>Student Name</label>
                    <input type="text" name="stuname" value="<?php echo $rowc1['stuname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
				  
                </div>
				
				
				  <div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Received Fee</label>
                    <input type="number" name="amount" value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly required>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Refund </label>
                    <input type="number" name="refund" min="1" max="<?php echo $rowc1['amount']; ?>" value="<?php echo $rowc1['refund']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
				 
                </div>
				<div class="form-group row">
                 
				   
                  <div class="col-sm-12">
				 <label>Remarks</label>
                    <input type="text" name="remarks" value="<?php echo $rowc1['remarks']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
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
