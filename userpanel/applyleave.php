<?php include('session.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$er = '';
if (isset($_POST['Submit'])) {
    $regno = $_POST['regno'];
    $leavereason = $_POST['leavereason'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
    $date = date('d-m-Y');
    $status = '0';
    $image = '';

    if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["tmp_name"])) {
        // Handle picture upload
        $picUploadPath = "../upload/" . basename($_FILES["image"]["name"]);
        $isImage = getimagesize($_FILES["image"]["tmp_name"]);
        if ($isImage !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $picUploadPath)) {
                $image = "upload/" . basename($_FILES["image"]["name"]);
            }
        }
    }

    // Check for overlapping leave dates
    $query = "SELECT COUNT(*) as count FROM applyleave 
              WHERE regno = ? 
              AND (
                  (fromdate BETWEEN ? AND ?) OR
                  (todate BETWEEN ? AND ?) OR
                  (? BETWEEN fromdate AND todate) OR
                  (? BETWEEN fromdate AND todate)
              )";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $regno, $fromdate, $todate, $fromdate, $todate, $fromdate, $todate);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] == 0) {
        // No overlapping leave dates, proceed with the insert
        $save = "INSERT INTO applyleave (regno, image, leavereason, fromdate, todate, date, status,regby) 
                 VALUES (?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($save);
        $stmt->bind_param("ssssssss", $regno, $image, $leavereason, $fromdate, $todate, $date, $status,$_SESSION['user']);

        if ($stmt->execute()) {
            $er = '<div class="alert alert-success">
                      <strong>Success!</strong> Leave sent for approval.
                   </div>';
            echo '<script>window.location.href="onleave.php";</script>';
        } else {
            $er = '<div class="alert alert-danger">
                      <strong>Danger!</strong> Leave not applied.
                   </div>' . $conn->error;
        }
    } else {
        // Overlapping leave dates found
        $er = '<div class="alert alert-danger">
                  <strong>Danger!</strong> You have already requested leave for some or all of these dates.
               </div>';
    }
}

$sql1 = "SELECT * FROM record WHERE id = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("i", $id);
$stmt1->execute();
$result1 = $stmt1->get_result();
$rowc1 = $result1->fetch_assoc();
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Apply Leave</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			    <div class="container">
			   <div class="form-group row">
				 <div class="col-sm-4">
				 <label>From Date. <span style="color:red;">*</span></label>
				 
				    <input type="hidden"  name="regno" value="<?php echo $rowc1['regno'];?> " >
					
                    <input type="date" placeholder="From Date" name="fromdate" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="" required>
                  </div>
				  <div class="col-sm-4">
				 <label>To Date. <span style="color:red;">*</span></label>
                    <input type="date" placeholder="To Date" name="todate" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="" required>
                  </div>
				  <div class="col-sm-4">
				 <label>Image <span style="color:red;">*</span></label>
                    <input type="file"  name="image"  class="form-control form-control-user" id="bank_date_incorporation" value="" required>
                  </div>
                  </div>
				     <div class="form-group row">
				   <div class="col-sm-12">
				 <label>Leave Reason <span style="color:red;">*</span></label>
				 <textarea name="leavereason" class="form-control form-control-user" required></textarea>
				 
                    
                  </div>
                  </div>
				   
                    <div class="form-group row">
				  <div class="col-sm-12">
				   
                    <input type="submit" name="Submit" style="margin-top: 33px;"
 value="Submit" class="btn btn-primary"/>
				   </div>
				   </div>
                 
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
