<?php 
include 'session.php';
$image_id='';


if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}

     $regno='';
	 $batchname='';
	 $stuname='';
	 $fname='';
	 $mobno='';
	 $email='';
	 $address='';
	 $category='';
	 $dob='';
	 $gurukukll='';
	 $gurukulid='';
	 $roomno='';
	 $entrydate='';
	 $leftdate='';
	 $amount='';
	 $gst='';
	 $mop='';
	 $address='';
	 $cheqno='';
	 $er='';
	  if(isset($_POST['Submit'])){
     $regno=$_POST['regno'];
     //$batchname=$_POST['batchname'];    
     $stuname=$_POST['stuname'];    
     $fname=$_POST['fname'];
     $mobno=$_POST['mobno'];
     $email=$_POST['email'];
     $address=$_POST['address'];
     $category=$_POST['category'];
     $dob=$_POST['dob'];
     $gurukukll=$_POST['gurukukll'];
     $gurukulid=$_POST['gurukulid'];
     $roomno=$_POST['roomno'];
     $entrydate=$_POST['entrydate'];
     $leftdate=$_POST['leftdate'];
	 $amount=$_POST['amount'];    
     $gst=$_POST['gst'];
     $mop=$_POST['mop'];
     $tranno=$_POST['tranno'];
     $cheqno=$_POST['cheqno'];
	
	$imageFileType = strtolower(pathinfo($_FILES['pic']['tmp_name'],PATHINFO_EXTENSION));
	 @$image_base64=addslashes(file_get_contents($_FILES['pic']['tmp_name']));
	 move_uploaded_file($_FILES["pic"]["tmp_name"],"../upload/" .$_FILES["pic"]["name"]);	 
	 $pic="upload/" .$_FILES["pic"]["name"];
	 
	 $imageFileType = strtolower(pathinfo($_FILES['file']['tmp_name'],PATHINFO_EXTENSION));
	 @$image_base64=addslashes(file_get_contents($_FILES['file']['tmp_name']));
	 move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/pdf/" .$_FILES["file"]["name"]);	 
	 $file="upload/pdf/" .$_FILES["file"]["name"];
	 
	 
	 if(!empty($_FILES['pic']['name'])) {
	  
	  $save = "update record set regno='".$regno."',pic='".$pic."' ,batchname ='".$batchname."',stuname ='".$stuname."',fname ='".$fname."',mobno ='".$mobno."',email ='".$email."',address ='".$address."',category ='".$category."',dob ='".$dob."',gurukukll ='".$gurukukll."',gurukulid ='".$gurukulid."',roomno ='".$roomno."',entrydate ='".$entrydate."',leftdate ='".$leftdate."',amount ='".$amount."',gst ='".$gst."',mop ='".$mop."',tranno ='".$tranno."',cheqno ='".$cheqno."' where id='".$image_id."'";
	  
	  }elseif(!empty($_FILES['file']['name'])){
	  
	  
	  
	  $save = "update record set regno='".$regno."',file='".$file."' ,stuname ='".$stuname."',fname ='".$fname."',mobno ='".$mobno."',email ='".$email."',address ='".$address."',category ='".$category."',dob ='".$dob."',gurukukll ='".$gurukukll."',gurukulid ='".$gurukulid."',roomno ='".$roomno."',entrydate ='".$entrydate."',leftdate ='".$leftdate."',amount ='".$amount."',gst ='".$gst."',mop ='".$mop."',tranno ='".$tranno."',cheqno ='".$cheqno."' where id='".$image_id."'";
	  }else{
		  
		  
		  $save = "update record set regno='".$regno."',pic='".$pic."',file='".$file."' ,stuname ='".$stuname."',fname ='".$fname."',mobno ='".$mobno."',email ='".$email."',address ='".$address."',category ='".$category."',dob ='".$dob."',gurukukll ='".$gurukukll."',gurukulid ='".$gurukulid."',roomno ='".$roomno."',entrydate ='".$entrydate."',leftdate ='".$leftdate."',amount ='".$amount."',gst ='".$gst."',mop ='".$mop."',tranno ='".$tranno."',cheqno ='".$cheqno."' where id='".$image_id."'"; 
	  }
	
	
	
	
	
	
	if(mysqli_query($conn,$save)){
		
		
		
		echo '<script>window.location.href="records.php";</script>';
		
	}else{
		
		$er="Data Not updated".mysqli_error($conn);
		
	}				
	
	  }
	  
	  
$sql1 = "SELECT * from record where id='$image_id'";
$result1 = mysqli_query($conn,$sql1);
$rowc1 = mysqli_fetch_assoc($result1);

$sql122 = "SELECT * from batch where id='".$rowc1['batchname']."'";
$result122 = mysqli_query($conn,$sql122);
$rowc122 = mysqli_fetch_assoc($result122);
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;">Edit Record</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			    <input type="hidden" name="mop" value="<?php echo $rowc1['mop']; ?>"    >
			    <input type="hidden" name="gurukukll" value="<?php echo $rowc1['gurukukll']; ?>"    >
			   <div class="form-group row">
				
                  <div class="col-sm-3">
				   <label>Student Pic</label>
                    <input type="file" name="pic"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
				    <div class="col-sm-3">
				   <label>Student Form (Pdf Only) </label>
                    <input type="file" placeholder="Address." name="file" accept=".pdf"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                    <div class="col-sm-3" style="text-align:center;">
				   <a href="../<?php echo $rowc1['pic']?>" target="_blank"><img src="../<?php echo $rowc1['pic']?>" style="width: 100px;height:100px;border: solid 1px black;padding: 15px;" ></a>
				   </div>
				    <div class="col-sm-3" style="text-align:center;">
				   <a href="../<?php echo $rowc1['file']?>" target="_blank"><img src="images/pdf-icon.png" style="width: 100px;height:100px;border: solid 1px black;padding: 15px;" ></a>
				   </div>


                </div>
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Reg No.</label>
                    <input type="text" name="regno" value="<?php echo $rowc1['regno']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
                  <div class="col-sm-6">
				 <label>Batch Name</label>
                    <input type="text" name="batchname"  value="<?php echo $rowc122['batchname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Student Name</label>
                    <input type="text" name="stuname" value="<?php echo $rowc1['stuname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Father Name</label>
                    <input type="text" name="fname" value="<?php echo $rowc1['fname']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Mobile No.</label>
                    <input type="number" name="mobno" value="<?php echo $rowc1['mobno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Email id</label>
                    <input type="email" name="email" value="<?php echo $rowc1['email']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
                </div>
				
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Address.</label>
                    <input type="text" name="address" value="<?php echo $rowc1['address']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				 <label>Category</label>
                    <input type="text" name="category" value="<?php echo $rowc1['category']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
				  
                </div>
				
				<div class="form-group row">
                  <div class="col-sm-6">
				   <label>Date of Birth.</label>
                    <input type="date" name="dob" value="<?php echo $rowc1['dob']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                  <div class="col-sm-6">
				   <label>GST (%)</label>
                    <input type="number" name="gst" value="<?php echo $rowc1['gst']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
				   </div>
				  
                </div>
			
				<div class="form-group row">
				<div class="col-sm-6">
				  
				 <label>Amount</label>
                    <input type="number" name="amount"  value="<?php echo $rowc1['amount']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  readonly>
                  </div>
                  <!--<div class="col-sm-6">
				   <label>Gurukul.</label>
                   
					
					<select name="gurukukll" class="form-control form-control-user" id="selectBox">
    <?php if($rowc1['gurukukll'] === 'Yes') { ?>
        <option value="Yes" selected>Yes</option>
        <option value="No">No</option>
    <?php } else { ?>
        <option value="Yes">Yes</option>
        <option value="No" selected>No</option>
    <?php } ?>
</select>

				   </div>-->
				   
				   
				   </div>
				   
				    <div id="Yes" class="hidden">
				   <div class="form-group row">
                 
				  <div class="col-sm-6">
				   <label>Gurukul id.</label>
                    <input type="text" name="gurukulid" value="<?php echo $rowc1['gurukulid']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
              
                  
                  <div class="col-sm-6">
				 <label>Room No..</label>
                   <input type="text" name="roomno" value="<?php echo $rowc1['roomno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				   <div class="col-sm-6">
				   <label>Entry Date</label>
                    <input type="date" name="entrydate" value="<?php echo $rowc1['entrydate']; ?>"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
           
				
				
			
                 
                  <div class="col-sm-6">
				 <label>Left Date.</label>
                   <input type="date" name="leftdate" value="<?php echo $rowc1['leftdate']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
                  </div>
                  
				   
                  </div>
				  
                </div>
				<?php //}?>
				<div class="form-group row">
                 
                 
				  <?php if($rowc1['mop']==='chq'){ ?>
				
                 
                  <div class="col-sm-6">
				 <label>Cheque No.</label>
                    <input type="text" name="cheqno" value="<?php echo $rowc1['cheqno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
				  
                
				<?php  }?>
<?php if($rowc1['mop']==='online'){ ?>
				  
				
                  <div class="col-sm-6">
				   <label>Transaction No.</label>
                    <input type="text" name="tranno" value="<?php echo $rowc1['tranno']; ?>" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                 
             
				<?php  }?>
				
				 
                </div>
				
				
				
				
				 
               <div class="form-group row">
			   <div class="col-sm-2">
				   </div>
                  <div class="col-sm-8 mb-3 mb-sm-0" style="text-align: center;">
				   <input type="submit" name="Submit" value="Submit" class="btn btn-success"/>
                </a>
                  </div> 
				  <div class="col-sm-2">
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
