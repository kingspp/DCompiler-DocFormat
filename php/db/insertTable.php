<?php
include 'dbinfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$rows=$_REQUEST["row"];
$cols=$_REQUEST["col"];
$id=1;

for ($x = 0; $x < $rows; $x++){   
   for ($y = 0; $y < $cols; $y++){
		$arr[$id]=$_REQUEST[$id];
		$id++;
    }
}
array_unshift($arr, $rows,$cols);
$str = implode (", ", $arr);

$sql = "INSERT INTO documents (Heading, Content) VALUES('Table', '$str');";
if ($conn->query($sql) === TRUE) {	
	$last_id = mysqli_insert_id($conn);
   header("Refresh: 1; url=http://localhost/");
} 
else {
	echo "FAIL"; 
    //echo "Error: " . $sql . "<br>" . $conn->error;	 	
}

?>