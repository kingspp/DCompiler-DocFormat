<?php
include 'dbinfo.php';
$id=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT id, Heading, Content FROM documents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $head[$id]=$row["Heading"];
		$data[$id]=$row["Content"];
		//echo $head[$id] . ":" . $data[$id] . "<br/>";
		$id++;
    }
	$res1 = array_combine($head, $data);	
	$res = array_map(function($key, $val) {return array($key=>$val);}, $head, $data);
	echo json_encode($res);
	//echo $res;
	
	
} else {
    //echo "";
}


/*
$sql = "SELECT id, Heading, Content FROM documents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $head[$id]=$row["Heading"];
		$content[$id]=$row["Content"];		
		$id++;
    }
	
	$arr = array_combine($head, $content);	
	echo json_encode($arr);
} else {
    //echo "";
}
*/
//}
?>