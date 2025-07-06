<?php include('session.php');
     $regno='';
	 $batchname='';
	 $stuname='';
	 $fname='';
	 $mobno='';
	 $email='';
	 $address='';
	 $highqual='';
	 $feepack='';
	 $packfee='';
	 $category='';
	 $dob='';
	 $gurukukll='';
	 $gurukulid='';
	 $roomno='';
	 $entrydate='';
	 $leftdate='';
	 $er='';
	 $month = date('M');
	 $sql_max = "SELECT MAX(regno) AS max_regno FROM record WHERE regno LIKE 'AC$month%'";
    $query_max = mysqli_query($conn, $sql_max);
    $row_max = mysqli_fetch_assoc($query_max);
    $last_regno = $row_max['max_regno'];

    // Increment the last regno for the current month
    if ($last_regno) {
        $last_number = intval(substr($last_regno, -5)); // Extract the numeric part
        $next_number = $last_number + 1;
        $next_regno = 'AC'.$month.str_pad($next_number, 5, '0', STR_PAD_LEFT); // Format the new regno
    } else {
        $next_regno = 'AC'.$month.'00001';
    }
	
	  if(isset($_POST['Submit'])){
		  
	
     $regno=$next_regno;
     $batchname=$_POST['batchname'];    
     $stuname=$_POST['stuname'];    
     $fname=$_POST['fname'];
     $mobno=$_POST['mobno'];
     $email=$_POST['email'];
     $highqual=$_POST['highqual'];
     $feepack=$_POST['feepack'];
     $paytype=$_POST['paytype'];
     //$packfee=$_POST['packfee'];
     $otherqual=$_POST['otherqual'];
     $address=$_POST['address'];
     $category=$_POST['category'];
     $Installment=$_POST['Installment'];
     $dob=$_POST['dob'];
     //$gurukukll=$_POST['gurukukll'];
     //$gurukulid=$_POST['gurukulid'];
     //$regnoroomno=$_POST['roomno'];
     //$entrydate=$_POST['entrydate'];
     //$leftdate=$_POST['leftdate'];
	 
	       $sql22="select * from pack where packname='$feepack'";
		   $query22=mysqli_query($conn,$sql22);
		   $show22=mysqli_fetch_array($query22);
		   
		   $packfee=$show22['packprice'];



if(isset($_FILES["pic"]["name"]) && !empty($_FILES["pic"]["tmp_name"])){
    $picUploadPath = "../upload/" . basename($_FILES["pic"]["name"]);
    $imageFileType = strtolower(pathinfo($picUploadPath, PATHINFO_EXTENSION));
    
    // Check if the file is an image
    $isImage = getimagesize($_FILES["pic"]["tmp_name"]);
    if($isImage !== false){
        if (move_uploaded_file($_FILES["pic"]["tmp_name"], $picUploadPath)) {
            $pic = "upload/" . basename($_FILES["pic"]["name"]);
        } else {
            // Handle file upload error
            $pic = "images/icon.png";
        }
    } else {
        // Handle non-image file type
        $pic = "images/icon.png";
    }
} else {
    $pic = "images/icon.png";
}

if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["tmp_name"])){

    $fileUploadPath = "../upload/file" . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($fileUploadPath, PATHINFO_EXTENSION));
    
    // Check if the file is a valid file type (you may want to add additional checks here)
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileUploadPath)) {
        $file = "upload/file" . basename($_FILES["file"]["name"]);
    } else {
        // Handle file upload error
        $file = "images/pdf-icon.png";
    }
} else {
    $file = "images/pdf-icon.png";
}





		 $sql = "SELECT * FROM record WHERE regno='$regno'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Record already exists
 
	
	$er='<div class="alert alert-danger">
  <strong>Danger!</strong> Reg No. Already Exists!.
</div>';
} else {
	
	
	$save ="INSERT into record(regno,batchname,pic,file,stuname,fname,mobno,email,address,highqual,feepack,paytype,packfee,otherqual,category,dob,Installment,regby)VALUE('".$regno."','".$batchname."','".$pic."','".$file."','".$stuname."','".$fname."','".$mobno."','".$email."','".$address."','".$highqual."','".$feepack."','".$paytype."','".$packfee."','".$otherqual."','".$category."','".$dob."','".$Installment."','".$_SESSION['admin']."')";
	

	if(mysqli_query($conn,$save)){
		
		
		$er='<div class="alert alert-success">
  <strong>Success!</strong> Data Inserted.
</div>';
 echo '<script>window.location.href="records.php";</script>';
		
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

 <style>
 th{
	 
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
              <h2 class="m-0 font-weight-bold text-primary" style="text-align:center;color: #000000!important;">Student Profile Registration</h2>
			
			 		  
            </div>
             <!--- <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 50px;font-weight: bold;padding: 20px;">Registration</h1>
              </div>-->
			  <?php echo $er; ?>
               <form role="form" action="" method="post" enctype="multipart/form-data"style="margin-top:50px;margin-bottom:50px;">
			   
			   
			   <div class="form-group row">
                  
               
				  
				       <div class="col-sm-6">
					   
					   <label>Batch Name <span style="color:red">*</span></label>
                    
					
				
					<select class="form-control form-control-user" name="batchname" id="batchname" required>
    <option value=""> -- Select -- </option>

    <?php
    $sql = "SELECT * FROM batch ORDER BY id ASC";
    $query = mysqli_query($conn, $sql);
    while ($show = mysqli_fetch_array($query)) {
    ?>
        <option value="<?php echo $show['id']; ?>"> <?php echo $show['batchname']; ?> </option>
    <?php
    }
    ?>
</select>
				
					
				 
                  </div>
				  
				  <div class="col-sm-6">
					   
					   
				
				 <label>Fee Pack <span style="color:red">*</span></label>
				 
				 
                   
                <select class="form-control form-control-user" id="feepack" name="feepack" disabled required>
    <option value=""> -- Select -- </option>
</select>
					
				 
                  </div>
				   
				 
                </div>
				
			   <div class="form-group row">
    <div class="col-sm-6">
        <label>Fee Pay Type <span style="color:red">*</span></label>
        <select class="form-control form-control-user" name="paytype" id="paytype" required>
            <option value=""> -- Select -- </option>
            <option value="Full Advance"> Full Advance</option>
            <option value="Monthly"> Monthly</option>
            <option value="Installment"> Installment</option>
        </select>
    </div>
    
    <div class="col-sm-6">
        <label>Registration No.<span style="color:red">*</span></label>
        <input type="text" placeholder="Registration No" name="regno" value="<?php echo $next_regno; ?>" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation" disabled>
        <!-- Add hidden input field to submit the generated registration number -->
        <input type="hidden" name="generated_regno" value="<?php echo $next_regno; ?>">
    </div>
</div>
<div class="form-group row" id="installmentForm" style="display: none;">
    <div class="col-sm-12">
	
	
    <div style="text-align:center;padding-bottom:20px;">
        
       
                
                <input type="submit" name="Installment" value="2" class="btn btn-success"> 
                <input type="submit" name="Installment" value="3" class="btn btn-success"> 
                <input type="submit" name="Installment" value="4" class="btn btn-success"> 
                <input type="submit" name="Installment" value="5" class="btn btn-success">
    </div>

	  </div>
</div>
<div class="row">
    <div class="col-sm-12">
	<div style="text-align:center;">
        <table border='1' style="margin:auto;">
          
			<?php 
if (isset($_POST['Installment']) && isset($_POST['batchname'])) {
    $installments = $_POST['Installment'];
    $batchname = $_POST['batchname'];
    $feepack = $_POST['feepack'];

           $sql33="select * from pack WHERE packname='$feepack'";
		   $query33=mysqli_query($conn,$sql33);
		   $show33=mysqli_fetch_array($query33);
		   $pack_id=$show33['id'];
		   
			   
    echo '<tr style="background: #216b77;color: white;">
            <th>Sr.No</th>
            <th>Batch Name</th>
            <th>Pack Name</th>
            <th>Amount</th>
            <th>Installments</th>
          </tr>';

    $sql = "SELECT * FROM installments WHERE emis='$installments' AND batch_id='$batchname' AND pack_id='$pack_id'";
    $query = mysqli_query($conn, $sql);
    $i = 0;
	if (mysqli_num_rows($query) > 0) {
    while ($show = mysqli_fetch_array($query)) {
        $i++;
        echo '<tr style="color: #216b77;font-weight: bold;">
                <td>' . $i . '</td>
                <td>' . $show['batch_id'] . '</td>
                <td>' . $show['pack_id'] . '</td>
                <td>Rs.' . $show['amount'] . '</td>
                <td>' . $show['emis'] . '</td>
              </tr>';
    }
}else{
	
	
	echo '<tr>
            <td colspan="5">Installment Not Available</td>
          </tr>';
}
}
?>

            
        </table>
		
    </div>
    </div>
</div>
				
				
				<div class="form-group row">
				 <div class="col-sm-6">
				   <label>Student's Name <span style="color:red">*</span></label>
                    <input type="text" placeholder="Student's Name" name="stuname" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation"  required>
				   </div>
                 
								     <div class="col-sm-6">
				 <label>Father's Name <span style="color:red">*</span></label>
                    <input type="text" placeholder="Father's Name" name="fname" maxlength="20"  class="form-control form-control-user" id="bank_date_incorporation"  required>
                  </div>
                 
               
				     
				  
				 
                </div>
				
				<div class="form-group row">
				
				   <div class="col-sm-6">
				   <label>D.O.B <span style="color:red">*</span></label>
                    <input type="date" placeholder="Date of Birth." name="dob"   class="form-control form-control-user" id="bank_date_incorporation"  required>
				   </div>
                  
                  <div class="col-sm-6">
				   <label>Mobile No <span style="color:red">*</span></label>
                    <input type="tel" placeholder="Mobile No." name="mobno" maxlength="10" class="form-control form-control-user" id="bank_date_incorporation"  required>
				   </div>
				   
				  
                </div>
				
				<div class="form-group row">
                   <div class="col-sm-6">
				 <label>Email ID </label>
                    <input type="Email Id." placeholder="Email ID" name="email"  class="form-control form-control-user" id="bank_date_incorporation"  >
                  </div>
               
				  
				       <div class="col-sm-6">
				 <label>Category <span style="color:red">*</span></label>
                   
                 <select class="form-control form-control-user" name="category" required>
					<option value=""> -- Select -- </option>
					<option value="General"> General </option>
					<option value="OBC"> OBC </option>
					<option value="BC"> BC </option>
					<option value="EBC"> EBC </option>
					<option value="ST"> ST </option>
					<option value="SC"> SC </option>
					
					
					
					</select>
                  </div>
				   <div class="col-sm-6">
				 <label>Hightest Qualification <span style="color:red">*</span></label>
                   
                 <select class="form-control form-control-user" name="highqual"  id="selectBoxss" required>
					<option value=""> -- Select -- </option>
					<option value="10th"> 10th </option>
					
					<option value="Diploma"> Diploma </option>
					<option value="12th"> 12th </option>
					<option value="Graduation"> Graduation </option>
					<option value="postgraduation"> Post graduation </option>
					<option value="phd"> PHD </option>
					<option value="other"> Other </option>
					
					
					
					</select>
                  </div>
				 <div class="col-sm-6">
				   <label>Address</label>
                    <input type="text" placeholder="Address." name="address" maxlength="50" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                </div>
				<div id="other" class="hiddenss"  style="display:none;">
			 	
				<div class="form-group row">
                  <div class="col-sm-12">
				   <label>Other</label>
                    <input type="text" placeholder="Other." name="otherqual" maxlength="20" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
               
				   
                </div>
				
				
				
				
                </div>
				
				
					 

						<div class="form-group row">
                  
                
				  
				      







				  
				  
				  
                </div>
				<div class="form-group row">
				
                  <div class="col-sm-6">
				   <label>Student Pic (1 MB)</label>
                    <input type="file" name="pic" accept=".jpg,.png" class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>
                                     <div class="col-sm-6">
				   <label>Student Form  ( 1 MB Pdf Only) </label>
                    <input type="file" placeholder="Address." name="file" accept=".pdf"  class="form-control form-control-user" id="bank_date_incorporation"  >
				   </div>

  
                </div>
				
               
			
			 
 </div>
               <div class="form-group row">
			   <div class="col-sm-2">
				   </div>
                  <div class="col-sm-8 mb-3 mb-sm-0" style="text-align: center;">
				   <input type="submit" name="Submit" value="Submit" class="btn btn-primary"/>
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
        $(document).ready(function(){
            $('#selectBox').change(function(){
                $('.hidden').hide();
                $('#' + $(this).val()).show();
            });
        });
    </script>
	<script>
        $(document).ready(function(){
            $('#selectBoxss').change(function(){
                $('.hiddenss').hide();
                $('#' + $(this).val()).show();
            });
        });
    </script>
	
<script>
$(document).ready(function(){
    $('#batchname').change(function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:'POST',
                url:'get_fee_packs.php', // Make sure this URL is correct
                data:{'batchname':categoryID},
                success:function(html){
                    $('#feepack').html(html);
                    $('#feepack').prop('disabled', false);
                }
            });
        } else {
            $('#feepack').html('<option value="">Select a feepack</option>');
            $('#feepack').prop('disabled', true);
        }
    });
});
</script>
<script>
document.getElementById('inputField').addEventListener('keyup', function() {
    var value = this.value;
    
    // Check if the value is not empty
    if (value.trim() !== '') {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = this.responseText;
                document.getElementById('result').innerHTML = result;

                if (result.trim() === 'Gurukul ID Already Exists') {
                    // Disable other inputs
                    document.getElementById('otherInput1').disabled = true;
                    document.getElementById('otherInput2').disabled = true;
					document.getElementById('otherInput3').disabled = true;
                    // Add more inputs as needed
                } else {
                    // Enable other inputs if value doesn't exist
                    document.getElementById('otherInput1').disabled = false;
                    document.getElementById('otherInput2').disabled = false;
					document.getElementById('otherInput3').disabled = false;
                    // Add more inputs as needed
                }
            }
        };
        xhttp.open("GET", "check_gurukulid.php?q=" + value, true);
        xhttp.send();
    } else {
        // Clear the result if the input is empty
        document.getElementById('result').innerHTML = '';

        // Enable other inputs if value is empty
        document.getElementById('otherInput1').disabled = false;
        document.getElementById('otherInput2').disabled = false;
		document.getElementById('otherInput3').disabled = false;
        // Add more inputs as needed
    }
});
</script>

	<script>
    document.getElementById('paytype').addEventListener('change', function() {
        var installmentForm = document.getElementById('installmentForm');
        if (this.value === 'Installment') {
            installmentForm.style.display = 'block';
        } else {
            installmentForm.style.display = 'none';
        }
		
		
		
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
