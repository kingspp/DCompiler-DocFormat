<?php
	include 'dbinfo.php';
	
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$head = $_POST["head"];		


$sql = "DELETE FROM documents WHERE Heading= '{$head}'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

//Correct Table Numbering
if (strpos($head,'Table') !== false) {	
	$string = file_get_contents("tList.json");
	$json_a = json_decode($string, true);
	$tId = $json_a['table'];
	$tId--;
	$json = array("table" => $tId);
	$fp = fopen('tList.json', 'w');
	fwrite($fp, json_encode($json));
	fclose($fp);
}

if (strpos($head,'Image') !== false) {	
	$string = file_get_contents("iList.json");
	$json_a = json_decode($string, true);
	$iId = $json_a['image'];
	$iId--;
	$json = array("image" => $iId);
	$fp = fopen('iList.json', 'w');
	fwrite($fp, json_encode($json));
	fclose($fp);
}

?>