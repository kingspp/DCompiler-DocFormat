<?php
include 'dbinfo.php';
$id=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Heading, Content FROM documents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $head[$id]=$row["Heading"];
		$content[$id]=$row['Content'];
		//echo $content[$id];
		$id++;
    }
	//$head=array_diff($head, ["Title", "Abstract", "Introduction"]);
	//array_unshift($head, "Title","Abstract","Introduction");
	$arr = array_combine($head, $content);
	echo json_encode($arr);
} else {
    //echo "";
}

//}
?>