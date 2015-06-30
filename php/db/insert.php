<?php
include 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Create table for the first time
/*
// sql to create table
$sql = "CREATE TABLE documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Heading VARCHAR(30) NOT NULL,
Content TEXT  NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
*/



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