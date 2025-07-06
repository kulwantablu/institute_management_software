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
	  

    .hidden {
      display: none;
    }
  
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
			<form method="get" action="">
                     <div class="container-fluid">
                        <div class="form-group row">
                          
                           <div class="col-sm-12" style="text-align:center;">
          <button type="button" id="showPaid" class="btn btn-danger" >Paid</button>
          <button type="button" id="showUnpaid" class="btn btn-success" >Unpaid</button>
          <!--<button type="button" id="showAll" class="btn btn-primary" style="margin-top: 30px;">Show All</button>-->
        </div>
                        </div>
                     </div>
                  </form>
            <div class="card-body">
              <div class="table-responsive">
			  
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      
                      <th>ID</th>
					   <th>Pay Status</th> 
					  <th>Pay</th> 
					 <th>Reg No. </th>
                    
                     <th>Student Name.</th>
                     <th>Father Name.</th>
                     <th>Mobile No.</th>
                     <th>Batch Name. </th>
                     <th>Pack Name. </th>
                     <th>Pack Fee. </th>
                     <th>Pay Type. </th>
                     
					  <th>Payment Date</th>
                     <th>Pay Fee</th>                  				  
                     <th>Pending Fee</th>                  				  
                     <th>Refund Fee</th>                  				  
                     <th>Concession Fee</th>                  				  
                     <th>GST</th>                  				  
                     <th>Mode of Payment</th>                  				  
                     <th>Transaction No</th>                  				  
                     <th>Cheque No</th> 
 <!--<th>Print</th> 	-->		
 <th>Fee History</th> 			
 
					 <th>Edit</th>
                     
                                      
                    </tr>
					 
                  </thead>
                  <tbody>
				  
				  <?php
				  $msg='';
				  $msg1='';
		   $sql = "SELECT * FROM record where disablests=0  ORDER BY id ASC";

		   $query=mysqli_query($conn,$sql);
		   $i=0;
		   while($show=mysqli_fetch_array($query))
		   {
			   $i++;
			   
			   $reg=$show['regno'];
			   
			   
			   
			   $sql2="select * from pendingpay where regno='$reg'";
			   
			   
		   $query2=mysqli_query($conn,$sql2);
		   $show2=mysqli_fetch_array($query2);
		   
		   

		        if($show2['pendingsts']==='1'){
					
					$msg='<span style="color:green;font-weight:bold;">Paid</span>';
				}else{
					$msg="<span style='color:red;font-weight:bold;'>".$show2['pendingfee']."</span>";
					
				}
				
				if($show['refund']===null){
					
					$msg1='<span style="color:green;font-weight:bold;">No</span>';
				}else{
					$msg1="<span style='color:red;font-weight:bold;'>Rs.".$show['refund']."</span>";
					
				}
				
				if($show['concession']===null){
					
					$msg3='<span style="color:green;font-weight:bold;">No</span>';
				}else{
					$msg3="<span style='color:red;font-weight:bold;'>Rs.".$show['concession']."</span>";
					
				}
				if($show['amount']===null){
					
					$msg2='<span style="color:red;font-weight:bold;">No</span>';
				}else{
					$msg2="<span style='color:green;font-weight:bold;'>Rs.".$show['amount']."</span>";
					
				}
				
				$sql1="select * from batch where id='".$show['batchname']."' ORDER BY id ASC";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		   
		   $sql15="select * from pack where id='".$show['feepack']."' ORDER BY id ASC";
		   $query15=mysqli_query($conn,$sql15);
		   $show15=mysqli_fetch_array($query15);
		   
			  if($show['regby']===$_SESSION['user']){
			  ?>
				    <tr style="<?php if(empty($show['amount'])) { echo 'color:red;'; } ?>"  class="record-row" data-amount="<?php echo $show['amount']; ?>">
					 <td><?php echo $i; ?></td>
					 <td><?php if($show['status']=='0'){ echo '<span style="color:red;font-weight:bold;">Pending</span>';}else{echo '<span style="color:green;font-weight:bold;">Aprroved</span>';}  ?></td>
					 <td><?php if(empty($show['amount'])) {?> <a class="btn btn-success" style="text-decoration:none; color:white " href="pay.php?id=<?php echo $show['id'];  ?>">Pay</a> <?php }else{?> <a style="text-decoration:none; color:inherit " href=""><button class="btn btn-danger">Disable</button></a> <?php } ?></td>
					 <td><?php echo $show['regno']; ?> </td>
                     
                     <td><?php echo $show['stuname']; ?></td>
                     <td><?php echo $show['fname']; ?></td>
                     <td><?php echo $show['mobno']; ?></td>
                     <td><?php echo $show1['batchname']; ?> </td>
                     <td><?php echo $show15['packname']; ?> </td>
                    
                     <td style="color:black;font-weight:bold;">Rs.<?php echo $show['packfee']; ?> </td>
					  <td><?php echo $show['paytype']; ?> </td>
                    
					 
					  <td><?php echo $show['paydate']; ?></td>
					 
                     <td ><?php echo $msg2; ?></td>
                     <td ><?php echo $msg; ?></td>
                     <td ><?php echo $msg1; ?></td>
                     <td ><?php echo $msg3; ?></td>
                    
                    
                     <td><?php echo $show['gst']; ?></td>
                     <td><?php echo $show['mop']; ?></td>
                     <td><?php echo $show['tranno']; ?></td>
                     <td><?php echo $show['cheqno']; ?></td>
					 
					 <!--<?php if(empty($show['amount'])) { ?><td><a style="text-decoration:none; color:inherit " href=""><button class="btn btn-danger">Disable</button></a></td> <?php }else{ ?><td><a style="text-decoration:none; color:inherit " href="print.php?id=<?php echo $show['id'];  ?>"  target="_blank"><button class="btn btn-info">Print</a></td><?php }?>-->
					  <td><a class="btn btn-danger" style="text-decoration:none; color:white " href="feedetail.php?reg=<?php echo $show['regno'];  ?>">Fee Detail</a></td>
                    <td><a style="text-decoration:none; color:white " class="btn btn-info" href="edit.php?id=<?php echo $show['id'];  ?>">Edit</a></td>
					
					 
                    
                    </tr>
		   <?php  } } ?>               
					                   </tbody>
                </table>

              </div>
            </div>     
          </div>

        </div>
            </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('showUnpaid').click();
        });
    </script>
<script>
    document.getElementById('showPaid').addEventListener('click', function() {
      filterTable('paid');
    });

    document.getElementById('showUnpaid').addEventListener('click', function() {
      filterTable('unpaid');
    });

    document.getElementById('showAll').addEventListener('click', function() {
      filterTable('all');
    });

    function filterTable(status) {
      const rows = document.querySelectorAll('.record-row');
      rows.forEach(row => {
        const amount = row.getAttribute('data-amount');
        if (status === 'paid' && amount) {
          row.classList.remove('hidden');
        } else if (status === 'unpaid' && !amount) {
          row.classList.remove('hidden');
        } else if (status === 'all') {
          row.classList.remove('hidden');
        } else {
          row.classList.add('hidden');
        }
      });
    }
  </script>
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
