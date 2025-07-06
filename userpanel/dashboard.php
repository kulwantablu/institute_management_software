<?php include('session.php');
 
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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




        <!-- Topbar -->
     <?php include('header.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-0 text-gray-800" style="text-align: center;padding-bottom: 30px;padding-top: 30px;"></h1>
            
         

          <!-- Content Row -->
          <div class="row">
		  
<?php
     
$currentdate = date('Y-m-d');
$two_days_after = date('Y-m-d', strtotime($currentdate . ' +2 days'));

$sql = "SELECT a.id, a.regno, a.leavereason, a.fromdate, a.todate, r.stuname 
        FROM applyleave a
        JOIN record r ON a.regno = r.regno
        WHERE a.todate BETWEEN '$currentdate' AND '$two_days_after' AND r.regby = '" . $_SESSION['user'] . "' and a.disablests=0
        ORDER BY a.id ASC";

$query = mysqli_query($conn, $sql);
$number=mysqli_num_rows($query);



$currentdate1 = date('Y-m-d');
$two_days_after1 = date('Y-m-d', strtotime($currentdate1 . ' +2 days'));

$sql1 = "SELECT a.id, a.user_id, a.amount, a.paydate, a.concession, r.regno, r.stuname, r.fname, r.mobno, a.regby 
        FROM installments a
        JOIN record r ON a.user_id = r.id
        WHERE a.paydate BETWEEN '$currentdate1' AND '$two_days_after1'
        AND a.regby = '" . $_SESSION['user'] . "' AND a.status = 0 and a.disablests=0
        ORDER BY a.id ASC";

$query1 = mysqli_query($conn, $sql1);
$number1=mysqli_num_rows($query1);



$currentdate2 = date('Y-m-d');

$sql2 = "SELECT a.id, a.user_id, a.amount, a.paydate, a.concession, r.regno, r.stuname, r.fname, r.mobno, a.regby 
        FROM installments a
        JOIN record r ON a.user_id = r.id
        WHERE a.paydate < '$currentdate2'
        AND a.status = 0
        AND a.regby = '" . $_SESSION['user'] . "' and a.disablests=0 
        ORDER BY a.id ASC";

$query2 = mysqli_query($conn, $sql2);
$number2 = mysqli_num_rows($query2);


 ?>
            <!-- Earnings (Monthly) Card Example -->
			 
           <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Leave Dues After 2 day</div>
                      <a href="#leavedues"> <div class="h5 mb-0 font-weight-bold " style="color:red;font-weight:bold;"><?php echo $number; ?></div></a>
                    </div>
                    <div class="col-auto">
                      <a href="#leavedues" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
			<div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Fee Dues After 2 day</div>
                      <a href="#feedues"> <div class="h5 mb-0 font-weight-bold " style="color:red;font-weight:bold;"><?php echo $number1; ?></div></a>
                    </div>
                    <div class="col-auto">
                      <a href="#feedues" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Expire Pay Date</div>
                     <a href="#expire"> <div class="h5 mb-0 font-weight-bold" style="color:red;font-weight:bold;"><?php echo $number2; ?></div></a>
                    </div>
                    <div class="col-auto">
                      <a href="#expire" class="btn btn-success btn-circle">
                    <i class="fas fa-check"></i>
                  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			
            </div>

				 
			 <div class="row"  id="leavedues">
			 <div class="col-md-12">
			<div class="card  mb-4">
            
			  <h1 class="h3 mb-0 text-gray-800" style="text-align: center;padding-bottom: 10px;padding-top: 10px;font-size: 20px;">Leave Dues Report After 2 Days</h1>
            <div class="card-body">
              <div class="table-responsive">
			  <form name="form1" method="post" action="">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr  style="background: #216b77;color: white;">
					 <th>ID</th>
					
                  
                       <th>Reg No. </th>
                       <th>Name. </th>
					 
                     
					 
					 <th>Leave Reason </th>
					  <th>From Date.</th>
					   <th>To Date</th>
					   
                     
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
				 $currentdate = date('Y-m-d');
$two_days_after = date('Y-m-d', strtotime($currentdate . ' +2 days'));

$sql = "SELECT a.id, a.regno, a.leavereason, a.fromdate, a.todate, r.stuname 
        FROM applyleave a
        JOIN record r ON a.regno = r.regno
        WHERE a.todate BETWEEN '$currentdate' AND '$two_days_after' AND r.regby = '" . $_SESSION['user'] . "' and a.disablests=0
        ORDER BY a.id ASC";

$query = mysqli_query($conn, $sql);
$i = 0;

while ($show = mysqli_fetch_array($query)) {
    $i++;
    ?>
			
				    <tr >
					<td><?php echo $i; ?></td>
					
				                
              
					 
					   <td><?php echo $show['regno']; ?> </td>
					    <td><?php echo $show['stuname']; ?></td>
						<td><?php echo $show['leavereason']; ?></td>
						<td><?php echo date('d-m-Y', strtotime($show['fromdate'])); ?></td>
						 <td><?php echo date('d-m-Y', strtotime($show['todate'])); ?></td>
						 
					
                      
                    </tr>
		 <?php
}
?>                
					                   </tbody>
                </table>
				 </form>
              </div>
            </div>
          </div>
          </div>
          </div>
				
		<div class="row"  id="feedues">
			 <div class="col-md-12">
			<div class="card  mb-4">
            
			  <h1 class="h3 mb-0 text-gray-800" style="text-align: center;padding-bottom: 10px;padding-top: 10px;font-size: 20px;">Fee Dues  Report After 2 Days</h1>
            <div class="card-body">
              <div class="table-responsive">
			  <form name="form1" method="post" action="">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr style="background: #216b77;color: white;">
					 <th>ID</th>
					
                  
                       <th>Reg No. </th>
                       <th>Name. </th>
					 
                     
					 
					 <th>Father Name </th>
					 <th>Phone </th>
					  <th>Fee</th>
					  <th>Concession</th>
					   <th>Fee Date</th>
					   
                     
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				 <?php
$currentdate = date('Y-m-d');
$three_days_after = date('Y-m-d', strtotime($currentdate . ' +2 days'));

$sql = "SELECT a.id, a.user_id, a.amount, a.paydate, a.concession, r.regno, r.stuname, r.fname, r.mobno, a.regby 
        FROM installments a
        JOIN record r ON a.user_id = r.id
        WHERE a.paydate BETWEEN '$currentdate' AND '$three_days_after'
        AND a.regby = '" . $_SESSION['user'] . "' AND a.status = 0 and a.disablests=0
        ORDER BY a.id ASC";

$query = mysqli_query($conn, $sql);
$i = 0;

while ($show = mysqli_fetch_array($query)) {
    $i++;
    ?>
    <tr  style="background: #aec530bd;color: black;">
        <td><?php echo $i; ?></td>
        <td><?php echo $show['regno']; ?></td>
        <td><?php echo $show['stuname']; ?></td>
        <td><?php echo $show['fname']; ?></td>
        <td><?php echo $show['mobno']; ?></td>
        <td><?php echo $show['amount']; ?></td>
        <td><?php echo $show['concession']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($show['paydate'])); ?></td>
    </tr>
    <?php
}
?>             
					                   </tbody>
                </table>
				 </form>
              </div>
            </div>
          </div>
          </div>
          </div>
		  
		  
		  <div class="row"  id="expire">
			 <div class="col-md-12">
			<div class="card  mb-4">
            
			  <h1 class="h3 mb-0 text-gray-800" style="text-align: center;padding-bottom: 10px;padding-top: 10px;font-size: 20px;">Expire Fee date</h1>
            <div class="card-body">
              <div class="table-responsive">
			  <form name="form1" method="post" action="">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr style="background: #216b77;color: white;">
					 <th>ID</th>
					
                  
                       <th>Reg No. </th>
                       <th>Name. </th>
					 
                     
					 
					 <th>Father Name </th>
					 <th>Phone </th>
					  <th>Fee</th>
					  <th>Concession</th>
					   <th>Fee Date</th>
					   
                     
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				 <?php
$currentdate2 = date('Y-m-d');

$sql = "SELECT a.id, a.user_id, a.amount, a.paydate, a.concession, r.regno, r.stuname, r.fname, r.mobno, a.regby 
        FROM installments a
        JOIN record r ON a.user_id = r.id
        WHERE a.paydate < '$currentdate2'
        AND a.status = 0
        AND a.regby = '" . $_SESSION['user'] . "'  and a.disablests=0
        ORDER BY a.id ASC";

$query = mysqli_query($conn, $sql);
$i = 0;

while ($show = mysqli_fetch_array($query)) {
    $i++;
    ?>
    <tr style="background: red;color: white;">
        <td><?php echo $i; ?></td>
        <td><?php echo $show['regno']; ?></td>
        <td><?php echo $show['stuname']; ?></td>
        <td><?php echo $show['fname']; ?></td>
        <td><?php echo $show['mobno']; ?></td>
        <td><?php echo $show['amount']; ?></td>
        <td><?php echo $show['concession']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($show['paydate'])); ?></td>
    </tr>
    <?php
}
?>             
					                   </tbody>
                </table>
				 </form>
              </div>
            </div>
          </div>
          </div>
          </div>
            </div>
            </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
           
 


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
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
