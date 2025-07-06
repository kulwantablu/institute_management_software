<?php 

include 'session.php';
$image_id = '';

if (isset($_GET['id'])) {
    $image_id = mysqli_real_escape_string($conn, $_GET['id']);
}

// Fetching record details
$sql1 = "SELECT * FROM record WHERE id='$image_id'";
$result1 = mysqli_query($conn, $sql1);
$rowc1 = mysqli_fetch_assoc($result1);

$regno = $rowc1['regno'] ?? '';

// Fetching batch details
$sql122 = "SELECT * FROM batch WHERE id='" . mysqli_real_escape_string($conn, $rowc1['batchname']) . "'";
$result122 = mysqli_query($conn, $sql122);
$rowc122 = mysqli_fetch_assoc($result122);

// Initialize variables
$image_pic = "";
$file_pdf = "";
$regno = '';
$batchname = '';
$stuname = '';
$fname = '';
$mobno = '';
$email = '';
$address = '';
$category = '';
$dob = '';
$amount = '';
$gst = '';
$mop = '';
$er = '';

if (isset($_POST['Submit'])) {
    $regno = mysqli_real_escape_string($conn, $_POST['regno']);
    $batchname = mysqli_real_escape_string($conn, $_POST['batchname']);
    $stuname = mysqli_real_escape_string($conn, $_POST['stuname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mobno = mysqli_real_escape_string($conn, $_POST['mobno']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $gst = mysqli_real_escape_string($conn, $_POST['gst']);
    $mop = mysqli_real_escape_string($conn, $_POST['mop']);

    // Handling image upload
    if (!empty($_FILES['pic']['name'])) {
        $imageFileType = strtolower(pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION));
        $image_pic = "../upload/" . basename($_FILES['pic']['name']);
        move_uploaded_file($_FILES['pic']['tmp_name'], $image_pic);
    }

    // Handling PDF upload
    if (!empty($_FILES['file']['name'])) {
        $file_pdf = "../upload/pdf/" . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $file_pdf);
    }

    // Preparing update queries
    $updateFields = [
        "regno='$regno'",
        "batchname='$batchname'",
        "stuname='$stuname'",
        "fname='$fname'",
        "mobno='$mobno'",
        "email='$email'",
        "address='$address'",
        "category='$category'",
        "dob='$dob'",
        "amount='$amount'",
        "gst='$gst'",
        "mop='$mop'"
    ];

    if (!empty($image_pic)) {
        $updateFields[] = "pic='$image_pic'";
    }

    if (!empty($file_pdf)) {
        $updateFields[] = "file='$file_pdf'";
    }

    $save = "UPDATE record SET " . implode(", ", $updateFields) . " WHERE id='$image_id'";

    // Updating related tables
    $commonUpdate = "SET stuname='$stuname', fname='$fname' WHERE regno='$regno'";
$pendingPayUpdate = "SET stuname='$stuname', fname='$fname', email='$email' WHERE regno='$regno'";

$saveQueries = [
    "UPDATE concession $commonUpdate",
    "UPDATE concessionreq $commonUpdate",
    "UPDATE emis $commonUpdate",
    "UPDATE pendingpay $pendingPayUpdate", // Updated to include email
    "UPDATE refund $commonUpdate",
    "UPDATE refundreq $commonUpdate"
];

    // Execute the main update query
    if (mysqli_query($conn, $save)) {
        foreach ($saveQueries as $query) {
            mysqli_query($conn, $query);
        }
        echo '<script>window.location.href="records.php";</script>';
    } else {
        $er = "Data not updated: " . mysqli_error($conn);
    }
}


	  
	  

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
  <title>Arrora Classes</title>

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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Edit Record</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			    <input type="hidden" name="mop" value="<?php echo $rowc1['mop']; ?>"    >
			    <input type="hidden" name="gurukukll" value="<?php echo $rowc1['gurukukll']; ?>"    >
			   <div class="form-group row">
				
                  <div class="col-sm-3">
				   <label>Student Pic</label>
                    <input type="file" name="pic"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
				    <div class="col-sm-3">
				   <label>Student Form (Pdf Only) </label>
                    <input type="file" placeholder="Address." name="file" accept=".pdf"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                    <div class="col-sm-3" style="text-align:center;">
				   <a href="../<?php echo $rowc1['pic']?>" target="_blank"><img src="../<?php echo $rowc1['pic']?>" style="width: 100px;height:100px;border: solid 1px black;padding: 15px;" ></a>
				   </div>
				    <div class="col-sm-3" style="text-align:center;">
				   <a href="../<?php echo $rowc1['file']?>" target="_blank"><img src="images/pdf-icon.png" style="width: 100px;height:100px;border: solid 1px black;padding: 15px;" ></a>
				   </div>


                </div>
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Reg No.</label>
                    <input type="text" name="regno" value="<?php echo $rowc1['regno']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
                  <div class="col-sm-6">
				 <label>Batch Name</label>
                    <input type="text" name="batchname_display"  value="<?php echo $rowc122['batchname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
					<input type="hidden" name="batchname" value="<?php echo $rowc122['id']; ?>">
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Student Name</label>
                    <input type="text" name="stuname" value="<?php echo $rowc1['stuname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Father Name</label>
                    <input type="text" name="fname" value="<?php echo $rowc1['fname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Mobile No.</label>
                    <input type="number" name="mobno" value="<?php echo $rowc1['mobno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Email id</label>
                    <input type="email" name="email" value="<?php echo $rowc1['email']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
                </div>
				
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Address.</label>
                    <input type="text" name="address" value="<?php echo $rowc1['address']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Category</label>
                    <input type="text" name="category" value="<?php echo $rowc1['category']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Date of Birth.</label>
                    <input type="date" name="dob" value="<?php echo  $rowc1['dob']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				   <label>GST (%)</label>
                    <input type="number" name="gst" value="<?php echo $rowc1['gst']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
				  
                </div>
			
				<div class="form-group row">
				<div class="col-sm-6">
				  
				 <label>Amount</label>
                    <input type="number" name="amount"  value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
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
    function handleSelectChange() {
        $('.hidden').hide();
        $('#' + $('#selectBox').val()).show();
    }

    $(document).ready(function(){
        $('#selectBox').change(handleSelectChange);
        handleSelectChange(); // Call the function on page load
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
