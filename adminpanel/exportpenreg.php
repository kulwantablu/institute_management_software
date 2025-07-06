<?php session_start(); include_once 'connect.php'; 
 require 'vendor/autoload.php'; // Autoload PHPMailer using Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "Pending_Fee_Report" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('Reg By','Reg No.', 'Student Name', 'Father Name.', 'Email id', 'Fee Pack','Pack Fee','Pending Fee','Last Pay Date','Reg By'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$username = $_SESSION['username'];

        // Fetch records based on the submitted username
        if ($username) {
            $sql="select * from pendingpay where pendingsts='0' and regby='$username' ORDER BY id ASC";
        } else {
            $sql = "SELECT * FROM pendingpay where pendingsts='0' ORDER BY id ASC";
        }
		
$query = $conn->query($sql); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['regby'],$row['regno'], $row['stuname'], $row['fname'], $row['email'], $row['feepack'], $row['packfee'], $row['pendingfee'], $row['pendingpaydate'], $row['regby']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
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
    $mail->Subject = 'Pending Report';
    $mail->Body = 'Please find the attached student data Excel file.';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Delete the file after sending
unlink($fileName);
echo '<script>window.location.href="pendingreport.php";</script>';
exit;

