<?php include('connect.php');
if(isset($_POST['batchname'])){
    $batchname = $_POST['batchname'];

    // Use prepared statements or sanitize $batchname before using in SQL query
    $sql = "SELECT * FROM pack WHERE batchname = $batchname";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['packname']."'>".$row['packname']."</option>";
        }
    } else {
        echo "<option value=''>No pack found</option>";
    }
}
?>