<?php session_start();include_once 'connect.php';
// Load the database configuration file
 $username = $_SESSION['username'];

require 'vendor/autoload.php'; // Autoload PHPMailer using Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Filter the excel data
function filterData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download
$fileName = "Payment_data_" . date('Y-m-d') . ".xls";

// Column names
$fields = array('Reg No.', 'Student Name', 'Father Name', 'Amount', 'Refund', 'Concession', 'Mode of Payment', 'Transaction No', 'Cheque No', 'Pay Date');

// Display column names as first row
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from database
if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = htmlspecialchars($_GET['start_date'], ENT_QUOTES, 'UTF-8');
    $end_date = htmlspecialchars($_GET['end_date'], ENT_QUOTES, 'UTF-8');

    // Format the dates for the SQL query
    $formatted_start_date = date('d-m-y', strtotime($start_date));
    $formatted_end_date = date('d-m-y', strtotime($end_date));

    // Construct the SQL query string
    $sql = "SELECT * FROM emis WHERE paydate BETWEEN '$formatted_start_date' AND '$formatted_end_date' and regby='$username' ORDER BY id ASC";

    // Echo the query for testing purposes
    echo "SQL Query: " . $sql . "<br>";

    // Prepare the SQL query using the constructed string
    $stmt = $conn->prepare($sql);
} elseif (isset($_GET['start_date']) && isset($_GET['end_date'])&& isset($_GET['mop'])) {
    $mop = htmlspecialchars($_GET['mop'], ENT_QUOTES, 'UTF-8');

    // Construct the SQL query string
    $sql = "SELECT * FROM emis WHERE mop = ? ORDER BY id ASC";

    // Echo the query for testing purposes
    //echo "SQL Query: " . $sql . "<br>";

    // Prepare the SQL query using prepared statements
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mop);
} else {
    // Construct the SQL query string for the default case
    $sql = "SELECT * FROM emis ORDER BY id ASC";

    // Echo the query for testing purposes
    //echo "SQL Query: " . $sql . "<br>";

    // Prepare the SQL query using the constructed string
    $stmt = $conn->prepare($sql);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check if any records were found
if ($result->num_rows > 0) {
    // Output each row of the data
    while ($row = $result->fetch_assoc()) {
        // Create the line data array
        $lineData = array(
            $row['regno'],
            $row['stuname'],
            $row['fname'],
            $row['amt'],
            $row['refund'],
            $row['concession'],
            $row['mop'],
            $row['tranno'],
            $row['cheqno'],
            $row['paydate']
        );

        // Apply the filterData function to each element
        array_walk($lineData, 'filterData');

        // Append the line data to the excelData string
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}


file_put_contents($fileName, $excelData);

// Load PHPMailer
//require 'path/to/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(true);

$mail->isSMTP(); // Telling the class to use SMTP

try {
    // Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->Host = 'smtp.hostinger.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'info@aroraclassesbti.com'; // SMTP username
    $mail->Password = 'Admin!2332!23'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $mail->setFrom('info@aroraclassesbti.com', 'Digital Dreams');
    $mail->addAddress('info@aroraclassesbti.com'); // Add a recipient

    // Attachments
    $mail->addAttachment($fileName); // Add attachments

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Payment_data_Filter';
    $mail->Body = 'Please find the attached student data Excel file.';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Delete the file after sending
unlink($fileName);
echo '<script>window.location.href="filterreport.php";</script>';
exit;



// Close the statement
$stmt->close();

// Headers for download
//header("Content-Type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=\"$fileName\"");

// Render excel data
///echo $excelData;

//exit;
?>
