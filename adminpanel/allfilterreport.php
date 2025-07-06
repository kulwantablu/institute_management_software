<?php 
include('session.php');

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$mop = isset($_GET['mop']) ? $_GET['mop'] : '';
$today = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day'));
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
      #mainlink {
         color: white;
         font-size: 20px;
      }
      #mainlink:hover {
         color: white;
         text-decoration: none;
         color: blue;
      }
      .bg-primary {
         background-color: #2d7752 !important;
      }
      .btn-success {
         color: #fff;
         background-color: #2d7752;
         border-color: #2d7752;
         margin: 5px;
      }
      .btn-success:hover {
         color: #fff;
         background-color: black;
         border-color: black;
      }
      .border-left-primary {
         border-left: .25rem solid #2d7752 !important;
      }
      .border-left-success {
         border-left: .25rem solid #2d7752 !important;
      }
      .text-success {
         color: black !important;
      }
      .p-5 {
         padding: 0px !important;
      }
      label {
         font-weight: bold;
         color: black;
      }
      .form-control {
         border: solid 1px black;
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
            <div class="container-fluid">
               <!-- DataTales Example -->
               <div class="card mb-4">
                  <div class="card-header py-3">
                     <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Received Fee Report</h2>
                  </div>
                  <form method="get" action="">
                     <div class="container-fluid">
                        <div class="form-group row">
                          
                           <div class="col-sm-4" style="text-align:right;">
						  
                              <a href="?start_date=<?php echo $today; ?>&end_date=<?php echo $today; ?>" class="btn btn-success"  style="margin-top: 30px;">Today</a>
                              
                              <a href="?start_date=<?php echo $yesterday; ?>&end_date=<?php echo $yesterday; ?>" class="btn btn-success" style="margin-top: 30px;">Yesterday</a>
                           </div>
                           <div class="col-sm-2">
                              <label for="start_date">Start Date:</label>
                              <input type="date" id="start_date" name="start_date" class="form-control form-control-user">
                           </div>
                           <div class="col-sm-2">
                              <label for="end_date">End Date:</label>
                              <input type="date" id="end_date" name="end_date" class="form-control form-control-user">
                           </div>
                           <div class="col-sm-2">
                              <label for="mop">Mode of Payment:</label>
                              <select id="mop" name="mop" class="form-control form-control-user">
                                 <option value="">Select Payment Mode</option>
                                 <option value="Cash">Cash</option>
                                 <option value="Online">Online</option>
                              </select>
                           </div>
                           <div class="col-sm-2">
                             
                              <input style="margin-top:30px;" type="submit" value="Search" class="btn btn-success">
                           </div>
                        </div>
                     </div>
                  </form>
				  
				  <?php
				   $username = $_SESSION['username'];
                        // Initialize the base SQL query
                        $sql = "SELECT * FROM emis ";

                        // Add date range filtering if both dates are provided
                        if ($start_date && $end_date) {
                           $formatted_start_date = date('d-m-y', strtotime($start_date));
                           $formatted_end_date = date('d-m-y', strtotime($end_date));
                           $sql .= " WHERE paydate BETWEEN '$formatted_start_date' AND '$formatted_end_date'  ";
                        }

                        // Add mode of payment filtering if provided
                        if ($mop) {
                           if (strpos($sql, 'WHERE') !== false) {
                              $sql .= " AND mop='$mop'";
                           } else {
                              $sql .= " WHERE mop='$mop' ";
                           }
                        }

                        // Add ordering
                        $sql .= " ORDER BY id ASC";

                        $query = mysqli_query($conn, $sql);
                        $i = 0;
                        $total_amt = 0;
                        ?>
                       <div style="text-align: center;color: black;font-weight: bold;font-size: 25px;"> Total Rs. <span style="color: red;font-weight: bold;"><?php 
                        while ($show = mysqli_fetch_array($query)) {
                           $total_amt += $show['amt'];
                        }
                        echo $total_amt;
                        ?></span>
						</div>
						
						
                  <div class="card-body">
                     <div class="table-responsive">
					  
                        <?php 
                        $export_url = "exportrecivedall.php";
                        if ($start_date && $end_date) {
                           $export_url .= "?start_date=$start_date&end_date=$end_date";
                        } elseif ($mop) {
                           $export_url .= "?mop=$mop";
                        }
                        ?>
                        <a type="button" href="<?php echo $export_url; ?>" style="float:right;" class="btn btn-danger">Excel on Mail</a>
                       
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Reg No.</th>
                                 <th>Reg By.</th>
                                 <th>Student Name</th>
                                 <th>Father Name</th>
                                 <th>Amount</th>
                                 <th>Refund</th>
                                 <th>Concession</th>
                                 <th>Mode of Payment</th>
                                 <th>Trans. No.</th>
                                 <th>Cheq. No.</th>
                                 <th>Pay Date</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              // Reset query to fetch data again
                              $query = mysqli_query($conn, $sql);
                              while ($show = mysqli_fetch_array($query)) {
                                 $i++;
                              ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $show['regno']; ?></td>
                                    <td><?php echo $show['regby']; ?></td>
                                    <td><?php echo $show['stuname']; ?></td>
                                    <td><?php echo $show['fname']; ?></td>
                                    <td>Rs.<?php echo $show['amt']; ?></td>
                                    <td><?php echo $show['refund']; ?></td>
                                    <td><?php echo $show['concession']; ?></td>
                                    <td><?php echo $show['mop']; ?></td>
                                    <td><?php echo $show['tranno']; ?></td>
                                    <td><?php echo $show['cheqno']; ?></td>
                                    <td><?php echo $show['paydate']; ?></td>
                                 </tr>
                              <?php } ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
   </div
