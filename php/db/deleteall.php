<?php
include 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql='TRUNCATE TABLE documents';
$result = $conn->query($sql);

if ($result === TRUE) {
	echo "success";	
	}	
else{
	echo "failed";
	}

$files = glob('../../files/uploads/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}	

?>