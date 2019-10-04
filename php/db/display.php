<?php
include 'dbinfo.php';
$id=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, Heading FROM documents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $res[$id++]=$row["Heading"];
    }
	echo json_encode($res);
} else {
    echo "No Results";
}

//}
?>