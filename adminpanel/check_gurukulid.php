<?php
include('connect.php');
$q = $_GET['q'];

$sql = "SELECT * FROM record WHERE gurukulid = '" . $q . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Gurukul ID Already Exists";
} 

$conn->close();


?>
