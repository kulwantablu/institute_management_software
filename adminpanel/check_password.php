<?php
// Define the correct password
$correctPassword = "1234"; // Replace with your actual password
$er = ""; // Replace with your actual password

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered password
    $enteredPassword = $_POST["password"];

    // Check if the entered password matches the correct password
    if ($enteredPassword == $correctPassword) {
        // Password is correct, allow access to the protected content
        echo '<script>window.location.href="slip.php";</script>';
    } else {
        // Password is incorrect, show an error message
        $er ='Incorrect password. Please try again.';
		  echo '<script>window.location.href="index.php";</script>';
    }
}
?>
