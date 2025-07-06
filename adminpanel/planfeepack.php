<?php include('session.php');

if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}
     
	  
	
	  
$sql1 = "SELECT * from pack where id='$image_id'";
$result1 = mysqli_query($conn,$sql1);
$rowc1 = mysqli_fetch_assoc($result1);


$sql2 = "SELECT * from batch where id='".$rowc1['batchname']."'";
$result2 = mysqli_query($conn,$sql2);
$rowc2 = mysqli_fetch_assoc($result2);


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
            
			<div class="card-header py-3">
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Plan Setup</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			
				
				<table class="table table-bordered">
    <thead>
      <tr>
        <th>Batch Name.</th>
        <th>Duration(Monthly).</th>
        <th>Pack Name.</th>
        <th>Pack Price.</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $rowc2['batchname']; ?></td>
        <td><?php echo $rowc2['duration']; ?> Month</td>
        <td><?php echo $rowc1['packname']; ?></td>
        <td>Rs.<?php echo $rowc1['packprice']; ?></td>
      </tr>
      
      
    </tbody>
  </table>
                </div>
				
				
               
			
		

           
            </div>
			
			
			<div class="row">
       <div class="col-lg-12">
            
			
            <h2 class="m-0 font-weight-bold text-primary" style="padding-bottom:20px;text-align:center;color: #000000!important;font-size: 18px;">Installment Plan</h2>
				<form role="form" action="" method="post" enctype="multipart/form-data">
    <div style="text-align:center;padding-bottom:20px;">
        
        <?php
        for ($i = 2; $i <= 5; $i++) {
    if (isset($image_id) && isInstallmentSaved($i, $image_id)) {
        echo '<button type="button" class="btn btn-danger" disabled>' . $i . '</button> &nbsp;';
    } else {
        echo '<button type="submit" name="Installment" value="' . $i . '" class="btn btn-success">' . $i . '</button> &nbsp;';
    }
}
        ?>
    </div>
</form>
<table class='table table-bordered'>
<tr>
                <th>Sr.No</th>
                <th>Batch Name</th>
                <th>Pack Name</th>
                <th>Amount (Monthly)</th>
                
              </tr>
				<?php

function isInstallmentSaved($installment, $image_id) {
    global $conn; // Use the global database connection

    // Prepare the query to prevent SQL injection
    $query = "SELECT COUNT(*) FROM installments WHERE emis = ? AND pack_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $installment, $image_id); // Assuming both are integers

    // Execute the query and get the result
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    // Return whether the installment is saved
    return $count > 0;
}

				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Installment'])) {
    $installments = $_POST['Installment'];
    
    // Assuming $rowc1['packprice'] and $rowc2['batchname'] are defined
    $date = date('Y-m-d');
    $amount = $rowc1['packprice'] / $installments;

    // Insert installment payments
    
    for ($i = 1; $i <= $installments; $i++) {
        //$payment_date = date('Y-m-d', strtotime("+$i month", strtotime($date)));
        echo "<tr>
                <td>".$i."</td>
                <td>".$rowc2['batchname']."</td>
				<td>".$rowc1['packname']."</td>
                <td>Rs.".$amount."</td>
                
              </tr>";
    }
   
}
?>
			</table>	
				
				<form role="form" action="save_installments.php" method="post" enctype="multipart/form-data">
    <div style="text-align:center;padding-bottom:20px;">
        
       <?php
            if (isset($_POST['Installment'])) {
                echo '
				<input type="hidden" name="batch_id" value='.$rowc2['id'].'>
        <input type="hidden" name="pack_id" value='.$rowc1['id'].'>
        <input type="text" name="amount"  value='.$amount.'>
        <input type="hidden" name="installments" value='.$installments.'>
				<button type="submit" name="submit" class="btn btn-success">Save Installments</button>';
            }
            ?>
    </div>
</form>
				
				
                </div>
				
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
