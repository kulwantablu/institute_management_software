<?php
   session_start(); // Start session
   include("connect.php");  
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

      $sql = "SELECT * FROM admin WHERE username = '$myusername' and password = '$mypassword' ";
	  
      $result = mysqli_query($conn,$sql);
	  
      if ($result) {
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          if($row) {
              if($row['type']==='admin'){
                  echo '<script>window.location.href="adminpanel/";</script>';
                  $_SESSION['admin'] = $myusername;
              } 
              else if($row['type']==='user'){
                  echo '<script>window.location.href="userpanel/dashboard.php";</script>';
                  $_SESSION['user'] = $myusername;
				  $_SESSION['rol'] = $row['role'];
              }
          }
          else {
              $error = '<div class="alert alert-danger" role="alert">
              Your Login Name or Password is invalid
              </div>';
          }
      } else {
          $error = "Error in query: " . mysqli_error($conn);
      }
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
  
  <title>Digital Dreams</title>
<link rel="shortcut icon" href="images/favicon.png" style="height:30px;width:30px">

  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<Style>
.bg-gradient {
   
     background-image: -webkit-gradient(linear,left top,left bottom,color-stop(10%,#4e73df),to(#224abe)); 
    /* background-image: linear-gradient(180deg,#4e73df 10%,#224abe 100%); */
    background-size: cover;}
.p-5 {
    padding: 3rem!important;
    margin: auto;
    width: 511px;
}

.btn-primary {
    color: #fff;
    background-color: #2d7752;
    border-color:#2d7752;
}
.small{
    font-size: 100%;
    font-weight: bold;
}
.btn-primary:hover {
    color: #fff;
    background-color: #2d7752;
    border-color: #2d7752;
}
.btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
      background-color:#2d7752;
    border-color: #2d7752;
}

</style>
</head>

<body class="bg-gradient" style="background-image:url('images/bg.jpg');">


  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

     
        <div>
          
            <!-- Nested Row within Card Body -->
            <div class="row">
             
              <div class="col-lg-12">
                <div class="p-5" style="margin-top:150px;border:solid 1px white;background: white;    border-radius: 45px;">
                  <div class="text-center" style="margin-bottom:30px">
                    <img src="images/arora.png" style="width: 350px;" >
                  </div>
                  <form class="user"id="form1" name="form1" method="post" action="">
                    <div class="form-group" >
					
                      <input type="text" name="username" class="form-control form-control-user required" id="username" aria-describedby="emailHelp" placeholder="Username" style="height:45px;background: none;font-size: 20px;color: black;">
                    </div>
                    <div class="form-group" >
                      <input type="password" name="password"  class="form-control form-control-user required" id="password" placeholder="Password" style="height:45px;background: none;font-size: 20px;color: black;">
                    </div>
                   
                    <!--<a href="#" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
					<div class="form-group" style="text-align: center;">
                    <input style=" background-color:black;border-radius:4px;width:100px;font-size: 18px;height:45px;border:solid 1px black;" type="submit" name="Submit" value="Login" class="btn btn-primary btn-user btn-block/">
                   </div>
                  
                  </form>
                  <?php echo $error; ?>
				                   <!--<div class="text-center">
                    <b><a class="small" href="forget-password_admin.html">Forgot Password?</a></b>
                  </div>-->
                 
                </div>
              </div>
			 
            </div>
          </div>
    

      </div>

   

  </div>

  <!-- Bootstrap core JavaScript-->
 <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages
  <script src="js/sb-admin-2.min.js"></script>-->

</body>

</html>
