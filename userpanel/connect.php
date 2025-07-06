<?php
  $servername="localhost";
	$username="root";
	$password="";
	$dbname="mysoftware";
	
	$conn = mysqli_connect($servername, $username, $password,$dbname);
	
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

try {
  $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>

