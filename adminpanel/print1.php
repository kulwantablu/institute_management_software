<?php include('session.php');

$image_id='';


if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}


$sql1 = "SELECT * from emis where id='$image_id'";
$result1 = mysqli_query($conn,$sql1);
$rowc1 = mysqli_fetch_assoc($result1);

$regno = $rowc1['regno'];
$sql2 = "SELECT * from record where regno='$regno'";
$result2 = mysqli_query($conn,$sql2);
$rowc2 = mysqli_fetch_assoc($result2);


  


$gst_percentage = $rowc2['gst'];

//$gst_amount = ($rowc1['amt'] * $gst_percentage) / 100;
$formatted_number1 = ($rowc1['amt'] / 118) * 100;

$formatted_number = number_format($formatted_number1, 2);


$total_amount1 = $rowc1['amt'] - $formatted_number1;

$total_amount = number_format($total_amount1, 2);


$paysts='';


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
  <title>Arrora Classes</title>

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
.page {
            width: 21cm;
            min-height: 29.7cm;
            padding: 0.5cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
			 padding: 10px;
        margin: auto;
        background-image: url('images/bg.png');
        background-size: cover;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 256mm;
            outline: 2cm #FFEAEA solid;
        }

        @page {
            size: A4;
            margin: 0;
        }

      @media print {
            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
              
                page-break-after: always;
				background-image: url('images/bg.png');
        background-size: cover;

            }
        }
        th,td{
            
            color:black;
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


     

		
		
    <button onclick="printPage()" id="printbtn" style="position: fixed; top: 50px; right: 10px; padding: 10px; background: #0F2B52; color: white; border: 1px solid #0F2B52; width: 100px;">Print</button>
      <div class="container"  >
          <!-- DataTales Example -->
		 <div  id="appform" class="page" >
			<div style="border:solid 1px black;padding: 15px;">
		 
		 <img style="width: 75%;margin: auto;display: inherit;    margin-bottom: 50px !important;" src ="images/header.png">
		 <hr>
		   <div class="row">
		  <div class="col-md-6">
		  <table   style="float:left;">
		  <tr><th style="padding-right:26px;text-align:left;">Student Name:</th><td style="padding:5px;"><?php echo $rowc1['stuname']; ?> </td></tr>
		  <tr><th style="padding-right:26px;text-align:left;">Father Name:</th><td style="padding:5px;"><?php echo $rowc1['fname']; ?> </td></tr>
		  <tr><th style="padding-right:26px;text-align:left;"> Mobile No:</th><td style="padding:5px;"><?php echo $rowc2['mobno']; ?> </td></tr>
		  <tr><th style="padding-right:26px;text-align:left;"> Email Id:</th><td style="padding:5px;"><?php echo $rowc2['email']; ?> </td></tr>
		  
		  </table>
		  </div>
		  <div class="col-md-2">
		   </div>
		  
		  <div class="col-md-4">
		  <table  style="float:right;">
		  <tr><th style="padding-right:26px;text-align:left;">Reference No:</th><td style="padding:5px;"><?php echo $rowc2['refno']; ?></td></tr>
		  
		  <tr><th style="padding-right:26px;text-align:left;">Payment Date:</th><td style="padding:5px;"><?php echo $rowc1['paydate']; ?> </td></tr>
		 
		  
		  </table>
		   </div>
		   </div>
		   <hr>
		    <div class="row">
     <table  style="margin-top:30px;width:100%;">
    <thead>
          <tr> <th style="width: 170px;float: right;padding:5px;text-align:right;">Mode of Payment &nbsp :</th><td style="padding:5px;text-align:center;width: 200px;"><?php echo $rowc1['mop']; ?></td> </tr>
       
      <?php if(!empty($rowc1['tranno'])){ ?>
       <tr> <th style="padding:5px;text-align:right;width: 170px;float: right;">Transaction No &nbsp :</th>  <td style="padding:5px;text-align:center;width: 200px;"><?php echo $rowc1['tranno']; ?></td> </tr>
     <?php } elseif(!empty($rowc1['cheqno'])){?>
       <tr> <th style="padding:5px;text-align:right;width: 170px;float: right;">Cheque  No &nbsp :</th>   <td style="padding:5px;text-align:center; width: 200px;"><?php echo $rowc1['cheqno']; ?></td> </tr>
       
       <?php }?>
       
      </tr>
      <tr>
      
        <th style="padding:5px;text-align:right;width: 170px;float: right;">Amount &nbsp : </th> <td style="padding:5px;text-align:center;    width: 200px;">Rs.<?php echo $formatted_number; ?>/-</td></tr>
       <tr> <th style="padding:5px;text-align:right;width: 170px;float: right;">GST(<?php echo $rowc2['gst']; ?>%) &nbsp :</th>    <td style="padding:5px;text-align:center;width: 200px;">Rs.<?php echo $total_amount; ?>/-</td></tr>
       <tr> <th style="padding:5px;text-align:right;width: 170px;float: right;">Total &nbsp :</th>  <td style="padding:5px;text-align:center;width: 200px;font-weight:bold;">Rs.<?php echo $rowc1['amt']; ?>/-</td></tr>
     
    </thead>

  </table>
 
  <hr/>
<h1 style="width: 100%;text-align: right;margin-right: 70px;margin-top: 50px;"><img src="images/stamp.png" style="width: 160px;"/></h1>
<p style="width: 100%;text-align: center;color: black;font-weight: bold;">Note. This is computer genrated pay receipt and does not require a signature.</p>
        </div>
        </div>
        </div>
        </div>
            </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
           
 <script>
                function printPage() {
                    document.getElementById("printbtn").style.display = "none";
                    
                    window.print();
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
