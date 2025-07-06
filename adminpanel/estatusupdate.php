<?php 
include 'session.php';

if (isset($_GET['regno'])) {
    $regno = $_GET['regno'];
    $queries = [
        "UPDATE record SET disablests='0' WHERE regno='$regno'",
        "UPDATE applyleave SET disablests='0' WHERE regno='$regno'",
        "UPDATE concession SET disablests='0' WHERE regno='$regno'",
        "UPDATE concessionreq SET disablests='0' WHERE regno='$regno'",
        "UPDATE emis SET disablests='0' WHERE regno='$regno'",
        "UPDATE pendingpay SET disablests='0' WHERE regno='$regno'",
        "UPDATE refund SET disablests='0' WHERE regno='$regno'",
        "UPDATE refundreq SET disablests='0' WHERE regno='$regno'"
    ];
    
    foreach ($queries as $query) {
        if (mysqli_query($conn, $query) !== TRUE) {
            
        }
    }

    echo '<script>window.location.href="disbalestu.php";</script>';
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $query = "UPDATE installments SET disablests='0' WHERE user_id='$user_id'";
    
    if (mysqli_query($conn, $query) === TRUE) {
        echo '<script>window.location.href="disbalestu.php";</script>';
    } else {
        
    }
}
?>
