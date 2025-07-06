<?php 
// Load the database configuration file 
include_once 'connect.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "Student_data" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('Reg No.','Batch Name.', 'Student Name', 'Father Name.', 'Mobile No.', 'Email id', 'Address','Category','Date of Birth','Gurukull','Gurukul id','Room No',' Entry Date','Left Date','Amount','GST','Mode Of Payment','Tran .No','Chq .No'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM record ORDER BY id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        //$status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['regno'],$row['batchname'], $row['stuname'], $row['fname'], $row['mobno'], $row['email'], $row['address'], $row['category'], $row['dob'], $row['gurukukll'], $row['gurukulid'], $row['roomno'], $row['entrydate'], $row['leftdate'], $row['amount'], $row['gst'], $row['mop'], $row['tranno'], $row['cheqno']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;
