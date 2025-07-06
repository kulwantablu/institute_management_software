<?php 
include 'session.php';
$image_id='';


if(isset($_GET['id'])){
	$image_id=$_GET['id'];
	$userid=$_GET['userid'];
}

     
	 
	 $amount='';
	 
	 $er='';
	  if(isset($_POST['Submit'])){
    
     $amount=$_POST['amount'];    
     

     $save = "update installments set amount='".$amount."' where id='".$image_id."'"; 

	if(mysqli_query($conn,$save)){


		echo '<script>window.location.href="pay.php?id='.$userid.'";</script>';
		
		$er = '<div class="alert alert-success">
                    <strong>Success!</strong> Fee Custimized.
                  </div>';
		
	}else{
		
		//$er="Data Not updated".mysqli_error($conn);
		$er = '<div class="alert alert-danger">
                    <strong>Danger!</strong> Fee not Custimized.
                  </div>' . mysqli_error($conn);
		
	}				
	
	  }
	  	  
$sql1 = "SELECT * from installments where id='$image_id'";
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Edit Fee</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			    
		
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Amount</label>
				 
                    <input type="text" name="amount" value="<?php echo $rowc1['amount']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  
				  
				  <div class="col-sm-6">
				  <label>.</label><br>
				   <input type="submit" name="Submit" value="Save" class="btn btn-success"/>
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
