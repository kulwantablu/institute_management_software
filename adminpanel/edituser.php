<?php include('session.php');

if(isset($_GET['id'])){
	$id=$_GET['id'];
}
     

	
	 $er='';
	  if(isset($_POST['Submit'])){
         $username=$_POST['username'];
     $password=$_POST['password'];
     $name=$_POST['name'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
    // $role=$_POST['role'];
     $date=date('d-m-y'); 
        
     
	 
	 
	
	
	
	
	
	$save = "update admin set username='".$username."' ,password='".$password."',name='".$name."',phone='".$phone."',email='".$email."',date='".$date."'  where id='".$id."'";
	
	
	//echo $save;
	if(mysqli_query($conn,$save)){
		
		
		$er='<div class="alert alert-success">
  <strong>Success!</strong> User Data Updated.
</div>';
		echo '<script>window.location.href="users.php";</script>';
	}else{
		
		$er='<div class="alert alert-danger">
  <strong>Danger!</strong>User Data not Updated.
</div>'.mysqli_error($conn);
		
	}				
	
	  }
	  
	  
	  $sql1 = "SELECT * from admin where id='$id'";
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Edit User</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			    <div class="container-fluid">
			   <div class="form-group row">
				 <div class="col-sm-4">
				 <label>User Name.</label>
                    <input type="text" placeholder="Batch Name" name="username" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['username']; ?>" >
                  </div>
				  
				   <div class="col-sm-4">
				 <label>Password.</label>
                    <input type="text" placeholder="password" name="password" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['password']; ?>" >
                  </div>
				  <div class="col-sm-4">
				 <label>Name.</label>
                    <input type="text" placeholder="Name" name="name" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['name']; ?>" >
                  </div>
				  
				  <div class="col-sm-4">
				 <label>Phone.</label>
                    <input type="number" placeholder="Phone" name="phone" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['phone']; ?>" >
                  </div>
				  <div class="col-sm-4">
				 <label>Email.</label>
                    <input type="email" placeholder="Email" name="email" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" value="<?php echo $rowc1['email']; ?>" >
                  </div>
				  
				 
				   
                 
				  <div class="col-sm-4">
				   
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
