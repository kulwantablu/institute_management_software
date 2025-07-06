<?php include('session.php');?>

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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Records</h2>
			
			 		  
            </div>
			
            <div class="card-body">
              <div class="table-responsive">
			  <!--<a type="button" href="export.php" style="float:right;" class="btn btn-danger">Excel Export</a>-->
			  <form name="form1" method="post" action="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                       <th>Image </th>
					 <th>File </th>
                      <th>ID</th>
					 
					 <th>Reg No. </th>
					  <th>Student Name.</th>
					   <th>Father Name.</th>
					   <th>DOB</th>
					    <th>Mobile No.</th>
						 <th>Email id</th>
						 <th>Category</th>
						 <th>Highqual</th>
                     <th>Other qual</th>
					  <th>Address</th>
					 <th>Batch Name. </th>
					 <th>Fee Pack. </th>
					 <th>Pack Fee. </th>
					 <th>Reg by </th>
					 <th>Pay Type </th>
					

                     <!--<th>Gurukull</th>
                     <th>Gurukul id</th>
                     <th>Room No</th>
                     <th>Entry Date</th>
                     <th>Left Date</th>-->
                     <th>Edit</th>
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
				   
		   $sql="select * from record where disablests=0 ORDER BY id ASC";
		  // echo $sql;
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		   while($show=mysqli_fetch_array($query))
		   {
			   $i++;
			   
			   $sql1="select * from batch where id='".$show['batchname']."' ORDER BY id ASC";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		   
		   $sql5="select * from pack where id='".$show['feepack']."' ORDER BY id ASC";
		   $query5=mysqli_query($conn,$sql5);
		   $show5=mysqli_fetch_array($query5);
		   
		   
		   if($show['regby']===$_SESSION['user']){
			  ?>
				    <tr style="<?php if(empty($show['amount'])) { echo 'color:red;'; } ?>">
					<td><img src="../<?php echo $show['pic']?>" width="50px"></td>
					 <td><a href="../<?php echo $show['file']?>" target="_blank"><img src="images/pdf-icon.png" width="50px"></a></td>
					 <td><?php echo $i; ?></td>
					   <td><?php echo $show['regno']; ?> </td>
					    <td><?php echo $show['stuname']; ?></td>
						<td><?php echo $show['fname']; ?></td>
						<td><?php echo date('d-m-Y', strtotime($show['dob'])); ?></td>
						 <td><?php echo $show['mobno']; ?></td>
						 <td><?php echo $show['email']; ?></td>
						 <td><?php echo $show['category']; ?></td>
						  <td><?php echo $show['highqual']; ?></td>
                     <td><?php echo $show['otherqual']; ?></td>
					   <td><?php echo $show['address']; ?></td>
					      <td>
    <?php 
    if ($show['batchsts'] == '1') {
        echo '<span style="color:green;font-weight:bold;">' . $show1['batchname'] . '</span>';
    } else {
        echo $show1['batchname'];
    }
    ?> 
</td>
					      <td><?php echo $show5['packname']; ?> </td>
					      <td><?php echo $show['packfee']; ?> </td>
					      <td><?php echo $show['regby']; ?> </td>
					      <td><?php echo $show['paytype']; ?> </td>
					 

                     <!--<td><?php echo $show['gurukukll']; ?></td>
                     <td><?php echo $show['gurukulid']; ?></td>
                     <td><?php echo $show['roomno']; ?></td>
                     <td><?php echo $show['entrydate']; ?></td>
                     <td><?php echo $show['leftdate']; ?></td>-->
                    <td><a style="text-decoration:none; color:white "  class="btn btn-info" href="edit.php?id=<?php echo $show['id'];  ?>">Edit</a></td>
                    
					
                      
                    </tr>
		   <?php  } } ?>               
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
