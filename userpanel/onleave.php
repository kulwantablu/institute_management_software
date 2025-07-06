<?php include('session.php');


if(isset($_GET['regno'])){
	$regno=$_GET['regno'];
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
	  	  <div class="row">
       <div class="col-lg-12">
           
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;padding:30px;">On Leave</h2>


 
              
          
           
            </div>
          </div>
          <!-- DataTales Example -->
          <div class="card  mb-4">
            
			
            <div class="card-body">
              <div class="table-responsive">
			  <form name="form1" method="post" action="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
					 <th>ID</th>
					  <th>Status</th>
					  <th>Status</th>
					  <th>Status</th>
                  
                       <th>Image</th>
                       <th>Reg No. </th>
                       <th>Name. </th>
					 
                     
					 
					 <th>Leave Reason </th>
					  <th>From Date.</th>
					   <th>To Date</th>
					   
                     
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
				  
				  if(isset($regno)){
					  $sql="select * from applyleave where regno='".$regno."' and disablests=0";
				  }else{
					  $sql="select * from applyleave where disablests=0 ORDER BY id ASC"; 
				  }
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		   while($show=mysqli_fetch_array($query))
		   {
			   $i++;
			   if($show['status']=='0'){
				   
				   $st='<span style="color:red;font-weight:bold;">Pending</span>';
				   
			   }elseif($show['status']=='1'){
				   $st='<span style="color:green;font-weight:bold;">Accept</span>';
				    
			   }else{
				   
				   
				   $st='<span style="color:red;font-weight:bold;">Reject</span>';
				   
			   }
			   
			   
			   if($show['returns']=='0'){
				   
				   $rt='<span style="color:red;font-weight:bold;">Not Return</span>';
				   $rtbn='<a style="text-decoration:none; color:white " class="btn btn-success" href="returnsupdate.php?id='.$show['id'].'">Return</a>';
			   }else{
				   $rt='<span style="color:green;font-weight:bold;">Return</span>';
				    $rtbn='<a style="text-decoration:none; color:white " class="btn btn-danger" href="returndisaprove.php?id='.$show['id'].'">Not Return</a>';
			   }
		   $sql1="select * from record where regno='".$show['regno']."' ORDER BY id ASC";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		    if($show1['regby']===$_SESSION['user']){
			  ?>
				    <tr >
					<td><?php echo $i; ?></td>
					
					  <td><?php echo $st; ?></td>
<td><?php echo $rt; ?></td>
<td><?php echo $rtbn; ?></td>					  
              
					 
					   <td><img style="width: 100px;height: 100px;" src="../<?php echo $show['image']; ?>"> </td>
					   <td><?php echo $show['regno']; ?> </td>
					    <td><?php echo $show1['stuname']; ?></td>
						<td><?php echo $show['leavereason']; ?></td>
						<td><?php echo date('d-m-Y', strtotime($show['fromdate'])); ?></td>
						 <td><?php echo  date('d-m-Y', strtotime($show['todate'])); ?></td>
						 
					
                      
                    </tr>
		   <?php  }}  ?>                 
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
