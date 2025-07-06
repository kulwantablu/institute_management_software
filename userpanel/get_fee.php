<?php
include('connect.php');
if(isset($_POST['feepack'])){
    $feepack = $_POST['feepack'];

    // Use prepared statements or sanitize $feepack before using in SQL query
    $sql = "SELECT packprice FROM pack WHERE packname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $feepack);
    $stmt->execute();
    $stmt->bind_result($fee);
    $stmt->fetch();

    echo $fee;

    $stmt->close();
}
?>
