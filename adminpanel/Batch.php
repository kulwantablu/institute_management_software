<?php include('session.php');
    $batchname='';
	 $date='';

	
	 $er='';
	  if(isset($_POST['Submit'])){
     $batchname=$_POST['batchname'];
     $username=$_POST['username'];
     $duration=$_POST['duration'];
     $date=date('d-m-y');    
       
     
	 
	 
	 $sql = "SELECT * FROM batch WHERE batchname='$batchname' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Record already exists
 
	
	$er='<div class="alert alert-danger">
  <strong>Danger!</strong> Batch Name already exists!.
</div>';
} else {
	
	
	$save ="INSERT into batch(batchname,username,duration,date)VALUE('".$batchname."','".$username."','".$duration."','".$date."')";
	
	//echo $save;
	if(mysqli_query($conn,$save)){
		
		
		$er='<div class="alert alert-success">
  <strong>Success!</strong> Data Inserted.
</div>';
		
	}else{
		
		$er='<div class="alert alert-danger">
  <strong>Danger!</strong> Data not Inserted.
</div>'.mysqli_error($conn);
		
	}				
	
	  }}
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Add Batch Name</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:14px;margin-bottom:14px;">
			    <div class="container-fluid">
			   <div class="form-group row">
				 <div class="col-sm-3">
				 <label>Batch Name.<span style="color:red">*</span></label>
                    <input type="text" placeholder="Batch Name" name="batchname" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation"  required>
                  </div>
				   <div class="col-sm-3">
				 <label>Users<span style="color:red">*</span></label>
                    
                    
					
					<select class="form-control form-control-user" name="username"   required>
					<option value=""> -- Select user -- </option>
					
					<?php
		   $sql="select * from admin where type='user' ORDER BY id ASC";
		   $query=mysqli_query($conn,$sql);
		   
		   while($show=mysqli_fetch_array($query))
		   {
			  
			  ?>
					<option value="<?php echo $show['id']; ?>"> <?php echo $show['username']; ?> </option>
 <?php  }  ?>  
					
					</select>
                  </div>
				   <div class="col-sm-3">
				 <label>Duration(Monthly).<span style="color:red">*</span></label>
                    <input type="number" placeholder="Duration(Monthly)" name="duration" maxlength="36" class="form-control form-control-user" id="bank_date_incorporation"  required>
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
          <!-- DataTales Example -->
          <div class="card  mb-4">
            
			
            <div class="card-body">
              <div class="table-responsive">
			  <form name="form1" method="post" action="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      
                      <th>ID</th>
					 <th>Batch Name</th>
					 <th>User Name</th>
					 <th>Duration(Monthly)</th>
					 
                    
                    
                     
					 <th>Edit</th>
					
                     
                                      
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
		   $sql="select * from batch ORDER BY id ASC";
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		   while($show=mysqli_fetch_array($query))
		   {
		   $i++;
		   $sql77="select * from admin WHERE id='".$show['username']."' ORDER BY id ASC";
		   $query77=mysqli_query($conn,$sql77);
		   $show77=mysqli_fetch_array($query77);
			   
			  ?>
				    <tr >
					 <td><?php echo $i; ?></td>
					 <td><?php echo $show['batchname']; ?> </td>
					 <td><?php echo $show77['username']; ?> </td>
					 <td><?php echo $show['duration']; ?> Month</td>
					
                     
                     
                     
					 
					  <td><a style="text-decoration:none; color:white " class="btn btn-success" href="editbatch.php?id=<?php echo $show['id'];  ?>">Edit</a></td>
                    
					
					 
                    
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
