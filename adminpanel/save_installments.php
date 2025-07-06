<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve hidden form data
    $batch_id = $_POST['batch_id'];
    $pack_id = $_POST['pack_id'];
    $amount = $_POST['amount'];
    $installments = $_POST['installments'];
    $date = date('Y-m-d');

    // Connect to the database (assuming $conn is your database connection)
    // Replace this with your actual database connection code
    include 'connect.php'; 

    // Insert installment payments into the database
    for ($i = 1; $i <= $installments; $i++) {
        //$payment_date = date('Y-m-d', strtotime("+$i month", strtotime($date)));
        $sql = "INSERT INTO installments (batch_id, pack_id, emis, amount, date) 
                VALUES ('$batch_id', '$pack_id', '$installments', '$amount', '$date')";
        if (mysqli_query($conn, $sql)) {
            //echo "Installment $installments saved successfully.";
			echo '<script>window.location.href="planfeepack.php?id='.$pack_id.'";</script>';
        } else {
           // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
