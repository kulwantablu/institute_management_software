<?php 
include 'session.php';
$reg='';
$total='';
$totalpending='';
//$concession=0;


if(isset($_GET['reg'])){
	$reg=$_GET['reg'];
}


$sql66 = "SELECT * from concession where regno='$reg'";
$result66 = mysqli_query($conn,$sql66);
$rowc66 = mysqli_fetch_assoc($result66);
$conce= $rowc66['amt'];

     $regno='';
	 
	 $stuname='';
	 
	 $er='';
if(isset($_POST['Submit'])){
  
     $mop=$_POST['mop'];
     $tranno=$_POST['tranno'];
     $cheqno=$_POST['cheqno'];
     $stuname=$_POST['stuname'];
     $fname=$_POST['fname'];
     $id=$_POST['id'];
     $concession=$_POST['concession'];
	 
	 $paydate=date('d-m-y');
	 
     $amount=$_POST['amount'];
     $packfee=$_POST['packfee'];
    $pending=$_POST['pending'];
	
	if(empty($_POST['concession'])){
		
		$concession=0;
	}else{
		
		$concession=$_POST['concession'];
	}
	
     $total=$amount+$pending;
     $total1=$amount+$pending+$concession;
	 $totalpending=$packfee-$total1;

	 if($packfee==$total){
		
		$sts=1;
		
	}else{
		$sts=0;
		
	}
	
	if(empty($_POST['concession'])){
		
		$pend=$totalpending-$conce;
	}else{
		
		$pend=$totalpending;
	}
		 
		  
		
	 
	 
     $save2 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,amt,paydate,mop,tranno,cheqno,status,regby)VALUE('".$reg."','".$stuname."','".$fname."','".$pending."','".$paydate."','".$mop."','".$tranno."','".$cheqno."','0','".$_SESSION['user']."')");

$save1=mysqli_query($conn,"update record set amount ='".$total."',pending ='".$pend."' where regno='".$reg."'");

$save3 =mysqli_query($conn,"update installments set status='1'  where id='".$id."'");



//if(isset($concession!=0)){
		
		 //$save2 =mysqli_query($conn,"INSERT into concession(regno,stuname,fname,amt,date,status)VALUE('".$regno."','".$stuname."','".$fname."','".$concession."','".$paydate."','0')");
	 
	 //$save3 =mysqli_query($conn,"INSERT into emis(regno,stuname,fname,concession,paydate)VALUE('".$regno."','".$stuname."','".$fname."','".$concession."','".$paydate."')");

//$save1=mysqli_query($conn,"update record set concession ='".$concession."',constatus ='0' where regno='".$regno."'");

	//}
	
//"update installments set status='1'  where id='".$id."'";



	$save = "update pendingpay set pendingpaydate ='".$paydate."',paidamt ='".$total."',pendingfee ='".$pend."',pendingsts ='".$sts."',status ='0' where regno='".$reg."'";

	if(mysqli_query($conn,$save)){

		echo '<script>window.location.href="pending.php";</script>';
		
	}else{
		
		$er="Data Not updated".mysqli_error($conn);
		
	}				
	
	  }
	  
	  
$sql1 = "SELECT * from record where regno='$reg'";
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

 th{
	 
	    text-align: center;
    padding: 10px;
 }
  td{
	 
	    text-align: center;
    padding: 10px;
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Register</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			   <table border='1' style="margin:auto;">
          
			<tr style="background: #216b77;color: white;">
            <th>Sr.No</th>
            <th>Batch Name</th>
            <th>Pack Name</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Concession</th>
            <!--<th>Fine</th>-->
            <th>Pay Type</th>
			<th>Get</th>
			<th>Customize</th>
            
          </tr>
		 <?php  
		   $sql5="select * from record where regno='".$reg."'";
		   $query5=mysqli_query($conn,$sql5);
		   $show5=mysqli_fetch_array($query5);
		   
		   $sql="select * from installments where user_id='" . $show5['id'] . "' ";
		   $query=mysqli_query($conn,$sql);
		   $i=0;
		  
		   while($show=mysqli_fetch_array($query))
		   {
			   $i++;
			 $originalDate = $show['paydate']; // Assuming $show['paydate'] is in 'd-m-Y' format

             $newFormat = date('d-m-Y', strtotime($originalDate)); // Change 'Y-m-d' to your desired format

//echo $newFormat;

			   $sql1="select * from batch where id='".$show['batch_id']."'";
		   $query1=mysqli_query($conn,$sql1);
		   $show1=mysqli_fetch_array($query1);
		   
		       
		   $sql3="select * from pack where id='".$show['pack_id']."' ORDER BY id ASC";
		   $query3=mysqli_query($conn,$sql3);
		   $show3=mysqli_fetch_array($query3);
		   
		   
			   ?>
		  <tr style="color: #216b77;font-weight: bold;">
                <td><?php echo $i; ?></td>
                <td><?php echo $show1['batchname'];?></td>
                <td><?php echo $show3['packname'];?></td>
                <td>Rs.<?php echo $show['amount'];?>/-</td>
                <td><?php echo $newFormat;?></td>
               <td>Rs.<?php echo $show['concession'];?></td>
                <!--<td><?php echo $show['fine'];?></td>-->
                <td><?php echo $show['paytype'];?></td>
				<td>
			<?php if($show['status']=='0'){?> <button class="btn btn-success" onclick="fetchAmount(<?php echo htmlspecialchars(json_encode($show['amount'])); ?>, <?php echo htmlspecialchars(json_encode($show['id'])); ?>, <?php echo htmlspecialchars(json_encode($show['concession'])); ?>)">Fetch Fee</button> <?php }else{?>  
<button class="btn btn-danger" >Paid</button>

			<?php } ?>
                
            
        </td>
		
		<td>
			<?php if($show['status']=='0'){?><a href="customefee.php?reg=<?php echo $_GET['reg']; ?>&id=<?php echo $show['id']; ?>" class="btn btn-primary">Customize Fee</a><?php }else{?> 
 <button class="btn btn-danger" >Unable Customize</button>

			<?php } ?>
        </td>
                
              </tr>
            <?php  }
			
			?>  
        </table>
		<?php $sql = "SELECT SUM(amount) AS total_amount FROM installments WHERE user_id='" .$show5['id']. "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $total_amount = $row['total_amount'];
             echo '<h1 style="text-align:center;"><span style="color: red;font-weight: bold;font-size: 20px;margin-top: 20px;display: inline-block;">EMI Total: ' . $total_amount . '</span><br><span style="color: red;font-weight: bold;font-size: 20px;margin-top: 20px;display: inline-block;">Total Pack Fee: ' . $rowc1['packfee'] . '</span></h1>';?>
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			   
			   
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Reg No.</label>
                    <input type="text" name="regno" value="<?php echo $rowc1['regno']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
                  
				  
				   <div class="col-sm-6">
				   <label>Student Name</label>
                    <input type="text" name="stuname" value="<?php echo $rowc1['stuname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
				  
                </div>
				
				<div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Father Name</label>
                    <input type="text" name="fname" value="<?php echo $rowc1['fname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Mobile No.</label>
                    <input type="text" name="mobno"  value="<?php echo $rowc1['mobno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
				  </div>
				  <div class="form-group row">
                 
				   
                  <div class="col-sm-6">
				 <label>Total Pack Fee</label>
                    <input type="number" name="packfee" value="<?php echo $rowc1['packfee']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  <div class="col-sm-6">
				  
				  <label>Paid Fee</label>
                    <input type="number" name="amount" min="1" max="<?php echo $rowc1['packfee']; ?>" value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
				  
				 
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				  
				  <label>Pending Fee</label>
        <input type="number" name="pending" id="payFeeInput" min="1" max="<?php echo $rowc1['pending']; ?>" value="" class="form-control form-control-user" readonly>
        <input type="hidden" name="id" id="payFeeid" value="" class="form-control form-control-user">
        <input type="hidden" name="concession" id="concession" value="" class="form-control form-control-user">
                  </div>
                  <div class="col-sm-6">
				 <label>Mode of Payment</label>
				 
				 <select class="form-control form-control-user" name="mop" id="selectBox" required>
				   <option Value="">-- select --</option>
				   <option Value="Online">Online</option>
				   <option Value="Cash">Cash</option>
				   <option Value="Cheque">Cheque</option>
				 </select>
                    
                  </div>
				  
                </div>
				<div id="Online" class="hidden">
				 <div class="form-group row">
            <div class="col-sm-12">
                <label>Transaction No.</label>
                <input type="text" name="tranno" value="" class="form-control form-control-user" id="bank_date_incorporation">
            </div>
        </div>
                </div>
				
				<div id="Cheque" class="hidden">
				<div class="form-group row">
                 
                  <div class="col-sm-12">
				 <label>Cheque No.</label>
                    <input type="text" name="cheqno" value="" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
                    
				  
                </div>
                </div>
				<div style="text-align:center;">
				<?php 
if (($conce + $total_amount) == $rowc1['packfee']) { ?>
    <div class="form-group row" id="btnssa" style="display:none;">
        <div class="col-sm-12 mb-3 mb-sm-0" style="text-align: center;">
            <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
        </div> 
    </div> 
<?php } else { 
    echo '<p style="color:red;font-size:18px;"><span style="color:red;font-size:23px;font-weight:bold;">Warning!</span> Total Pack Fee and EMI Total are not equal, please check the custom fee again.</p>';
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
            <!-- Earnings (Monthly) Card Example -->
           
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
        function clearTransactionNo() {
            document.getElementById('bank_date_incorporation').value = '';
        }
    </script>
	
 <script>
function fetchAmount(amount, id, concession) {
    document.getElementById('payFeeInput').value = amount;
    document.getElementById('payFeeid').value = id;
    document.getElementById('concession').value = concession;
	 document.getElementById('btnssa').style.display = 'block';
}
</script>
   <script>
        $(document).ready(function(){
            $('#selectBox').change(function(){
                $('.hidden').hide();
                $('#' + $(this).val()).show();
            });
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
