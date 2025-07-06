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
      <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card  mb-4">
            <div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Full Received Fee Report</h2>
			
			 		  
            </div>
			 <div class="col-xl-12 col-md-6 mb-4">
  <h1 style="float: right;color: red;font-size: 18px;font-weight: bold;">User Name:<span style="color: black;"> <?php echo $_SESSION['username']; ?></span></h1>
 
  </div>
            <div class="card-body">
              <div class="table-responsive">
			  <a type="button" href="exportrecreg.php" style="float:right;" class="btn btn-danger">Excel Export</a>
			  <form name="form1" method="post" action="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      
                      <th>ID</th>
					  
					 <th>Reg By. </th>
					 <th>Reg No. </th>
					  <th>Student Name.</th>
					   <th>Father Name.</th>
					   
						 <th>Email id</th>
						 
					
					 <th>Batch Name. </th>
					 <th>Pack Fee. </th>
					 <th>Pack Fee. </th>
					 <th>Date. </th>
					

                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
				  $username = $_SESSION['username'];

        // Fetch records based on the submitted username
        if ($username) {
            $sql="select * from pendingpay where pendingsts='1' and regby='$username' ORDER BY id ASC";
        } else {
            $sql = "SELECT * FROM pendingpay where pendingsts='1' ORDER BY id ASC";
        }
		
		   
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		   while($show=mysqli_fetch_array($query))
			   
		   {
			   $i++;
			   
		   $sql1="select * from record where regno='".$show['regno']."' ORDER BY id ASC";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		   
		   $sql2="select * from batch where id='".$show1['batchname']."' ORDER BY id ASC";
		   $query2=mysqli_query($conn,$sql2);
		   $show2=mysqli_fetch_array($query2);
		   
		   
			   
			  ?>
				    <tr >
					 <td><?php echo $i; ?></td>
					
					
					   <td><?php echo $show['regby']; ?> </td>
					   <td><?php echo $show['regno']; ?> </td>
					    <td><?php echo $show['stuname']; ?></td>
						<td><?php echo $show['fname']; ?></td>
						
						 <td><?php echo $show['email']; ?></td>
						 
					      <td><?php echo $show2['batchname']; ?> </td>
					      <td><?php echo $show['feepack']; ?> </td>
					      <td>Rs.<?php echo $show['packfee']; ?> </td>
					 <td><?php echo $show['pendingpaydate']; ?> </td>

                     
                    
                    
					
                      
                    </tr>
		   <?php  }  ?>               
					                   </tbody>
                </table>
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

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
