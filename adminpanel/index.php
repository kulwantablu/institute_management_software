<?php include('session.php');
echo '<script>window.location.href="dashboard.php";</script>';
     
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
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- Content Row -->

				  <div class="row">
       <div class="col-lg-12">
            <div class="p-5">
			<div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Dashboard</h2>
			
			 		  
            </div>
              <div class="row">
<?php

$result = mysqli_query($conn, 'SELECT SUM(paidamt) AS total FROM pendingpay'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['total'];

$query = mysqli_query($conn,"SELECT * FROM record ");
$number=mysqli_num_rows($query);

$query1 = mysqli_query($conn,"SELECT * FROM pendingpay where pendingsts='1'");
$number1=mysqli_num_rows($query1);

$query2 = mysqli_query($conn,"SELECT * FROM pendingpay where pendingsts='0'");
$number2=mysqli_num_rows($query2);

 ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Received Payment</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:green;">Rs.<?php echo $sum; ?>/</div>
                    </div>
                    <div class="col-auto">
                      <a href="" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Student</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $number; ?></div>
                    </div>
                    <div class="col-auto">
                      <a href="regreport.php" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Full Fee Received Student</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $number1; ?></div>
                    </div>
                    <div class="col-auto">
                      <a href="" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Fee Student</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $number2; ?></div>
                    </div>
                    <div class="col-auto">
                      <a href="" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
            </div>
			 
            
           
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
	<script>
        $(document).ready(function(){
            $('#selectBoxss').change(function(){
                $('.hiddenss').hide();
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
