<?php session_start();
	 include('connect.php');

   $login_session = $_SESSION['user'];
   $ses_sql = mysqli_query($conn,"select username from admin where username = '$login_session' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   //$login_session = $row['username'];
   if(!isset($_SESSION['user'])){
      header("location:../index.php");
	  	echo '<script>window.location.href="../index.php";</script>';
   }
?>