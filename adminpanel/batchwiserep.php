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
	  
	   <div class="row">
	    
       <div class="col-lg-12">
	   
            <div class="p-5">
			<div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Batchwise Student Report</h2>
			<h1 style="color: red;font-size: 18px;font-weight: bold;text-align: center;margin-top: 15px;
">User Name:<span style="color: black;"> <?php echo $_SESSION['username']; ?></span></h1>
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			 
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top: 14px;margin-bottom: 14px;">
			    <div class="container-fluid">
			   <div class="form-group row">
				 <div class="col-sm-4">
				 <!--<label>Batch Name.</label>-->
				 
                    <select class="form-control form-control-user" name="batch" required>
    <option value=""> -- Select Batch Name -- </option>
    <?php
	$username = $_SESSION['username'];

        // Fetch records based on the submitted username
        if ($username) {
            $sql = "SELECT * FROM admin WHERE username='$username' ORDER BY id ASC";
			 $query = mysqli_query($conn, $sql);
             $showq = mysqli_fetch_array($query);
			 $id=$showq['id'];
			 
			 
			 $sql7777 = "SELECT * FROM batch WHERE username='$id' ORDER BY id ASC";
             
        } else {
             $sql7777 = "SELECT * FROM batch ORDER BY id ASC";
			 
        }
    
$query7777 = mysqli_query($conn, $sql7777);
             
    while($show = mysqli_fetch_array($query7777)) {
    ?>
        <option value="<?php echo $show['id']; ?>"><?php echo $show['batchname']; ?></option>
    <?php
    }
    ?>  
</select>
                  </div>
				   
                 
				  <div class="col-sm-4">
				   
                    <input type="submit" name="Submit" 
 value="Submit" class="btn btn-primary"/>
 <?php if(isset($_POST['batch'])) { ?>
			  <a type="button" href="exportbatch.php?batch=<?php echo $_POST['batch']; ?>"  class="btn btn-danger">Excel Export</a>
			 <?php
        }
    
    ?>  
				   </div>
				   
                </div>
                </div>
				
				
               
			
		
 </div>
              
              </form>
           
            </div>
          </div>
          <!-- DataTales Example -->
          <div class="card  mb-4">
            
			
            <div class="card-body">
              <div class="table-responsive">
			  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      
                      <th>ID</th>
					  
					 <th>Reg By. </th>
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
					

                    
                                  				  

                                        
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
		    if(isset($_POST['batch'])) {
        $selected_batch = $_POST['batch'];
        $sql = "SELECT * FROM record WHERE batchname='$selected_batch' ORDER BY id ASC";
        $query = mysqli_query($conn, $sql);
        $i = 0;
        while($show = mysqli_fetch_array($query)) {
            $i++;
			
			$sql1="select * from batch where id='".$show['batchname']."' ORDER BY id ASC";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
    ?>
			   
			  
				    <tr >
					 <td><?php echo $i; ?></td>
					
					
					   <td><?php echo $show['regby']; ?> </td>
					   <td><?php echo $show['regno']; ?> </td>
					    <td><?php echo $show['stuname']; ?></td>
						<td><?php echo $show['fname']; ?></td>
						<td><?php echo  date('d-m-Y', strtotime($show['dob'])); ?></td>
						 <td><?php echo $show['mobno']; ?></td>
						 <td><?php echo $show['email']; ?></td>
						 <td><?php echo $show['category']; ?></td>
						  <td><?php echo $show['highqual']; ?></td>
                     <td><?php echo $show['otherqual']; ?></td>
					   <td><?php echo $show['address']; ?></td>
					      <td><?php echo $show1['batchname']; ?> </td>
					      <td><?php echo $show['feepack']; ?> </td>
					      <td>Rs.<?php echo $show['packfee']; ?> </td>
					 

                    
                    
					
                      
                    </tr>
		     <?php
        }
    }
    ?>               
					                   </tbody>
                </table>
				
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
