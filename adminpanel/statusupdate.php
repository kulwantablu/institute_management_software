<?php 
    include 'session.php';
  $apr_date = date('d-m-Y');
$query = "UPDATE record SET status = '1', apr_date = '".$apr_date."' WHERE id = '".$_GET['id']."'";

if (mysqli_query($conn, $query)) {		  
    echo '<script>window.location.href="slip.php";</script>';
}

		  

?>
