<?php
include('session.php');

if (isset($_POST['batchname'])) {
    $batchname = $_POST['batchname'];
    $sql = "SELECT * FROM pack WHERE batchname='$batchname'";
    $query = mysqli_query($conn, $sql);
    echo '<option value=""> -- Select -- </option>';
    while ($row = mysqli_fetch_assoc($query)) {
        echo '<option value="'.$row['id'].'">'.$row['packname'].'</option>';
    }
}

if (isset($_POST['packId'])) {
    $packId = $_POST['packId'];
    $sql = "SELECT packprice FROM pack WHERE id='$packId'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    echo $row['packprice'];
}
?>
