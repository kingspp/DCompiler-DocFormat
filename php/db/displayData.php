<?php
	include 'dbinfo.php';
	
	// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	
	if (!empty($_GET['head'])) {	
	$head=$_GET['head'];
	
	$result = mysqli_query($conn, "SELECT * FROM documents
    WHERE Heading LIKE '%{$head}%' ");

	while ($row = mysqli_fetch_array($result))
	{
			echo "<b><li>" . $row['Heading'] ."</li></b>" . "<br><br>" ;
			echo $row['Content'];
	}
	//echo $head;
	}
	
	

?>