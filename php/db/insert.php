<?php
include 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




$head = $_POST['head'];
$data = $_POST['data'];

$sql = "INSERT INTO documents (Heading, Content) VALUES('$head', '$data');";
if ($conn->query($sql) === TRUE) {	
	$last_id = mysqli_insert_id($conn);
    echo $last_id;
} 
else {
	echo "FAIL"; 
    //echo "Error: " . $sql . "<br>" . $conn->error;	 	
}


$conn->close();
?>