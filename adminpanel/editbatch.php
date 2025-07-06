<?php include('session.php');

if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}
     $batchname='';

	
	 $er='';
	  if(isset($_POST['Submit'])){
     $batchname=$_POST['batchname'];
	     $username=$_POST['username'];
    $duration=$_POST['duration'];
        
     
	 
	 
	
	
	
	
	
	$save = "update batch set batchname='".$batchname."',username='".$username."',duration='".$duration."'  where id='".$image_id."'";
	
	
	//echo $save;
	if(mysqli_query($conn,$save)){
		
		
		$er='<div class="alert alert-success">
  <strong>Success!</strong> Data Updated.
</div>';
		echo '<script>window.location.href="Batch.php";</script>';
	}else{
		
		$er='<div class="alert alert-danger">
  <strong>Danger!</strong> Data not Updated.
</div>'.mysqli_error($conn);
		
	}				
	
	  }
	  
	  
	  $sql1 = "SELECT * from batch where id='$image_id'";
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Edit Batch Name</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data" style="margin-top:50px;margin-bottom:50px;">
			    <div class="container-fluid">
			   <div class="form-group row">
				 <div class="col-sm-3">
				 <label>Batch Name.</label>
                    <input type="text" placeholder="Batch Name" name="batchname" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['batchname']; ?>" >
                  </div>
				  <div class="col-sm-3">
    <label>Users<span style="color:red">*</span></label>
    <select class="form-control form-control-user" name="username" required>
        <option value="">-- Select user --</option>
        <?php
        $sql = "SELECT * FROM admin WHERE type='user' ORDER BY id ASC";
        $query = mysqli_query($conn, $sql);

        while ($show = mysqli_fetch_array($query)) {
        ?>
            <option value="<?php echo $show['id']; ?>" <?php if($rowc1['username'] == $show['id']) echo 'selected'; ?>>
                <?php echo $show['username']; ?>
            </option>
        <?php
        }
        ?>
    </select>
</div>

				   <div class="col-sm-3">
				 <label>Duration(Monthly).</label>
                    <input type="number" placeholder="Duration(Monthly)" name="duration" maxlength="36" class="form-control form-control-user" id="bank_date_incorporation"  value="<?php echo $rowc1['duration']; ?>">
                  </div>
				   
                 
				  <div class="col-sm-3">
				   
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
