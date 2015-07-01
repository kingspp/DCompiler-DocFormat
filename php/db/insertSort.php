<?php
include 'dbinfo.php';
$id=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//Create table for the first time
/*
// sql to create table
$sql = "CREATE TABLE temp (
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

$sql='TRUNCATE TABLE temp';
$result = $conn->query($sql);

$data = $_POST["choices"];	
foreach ($data as $value) {
	$sql = "INSERT INTO temp (Heading, Content) SELECT Heading, Content FROM documents where Heading = '$value'";
	//$sql = "INSERT INTO temp * from documents where Heading = 'Abstract'";
if ($conn->query($sql) === TRUE) {	
	$last_id = mysqli_insert_id($conn);
    //echo $last_id;
} 
else {
	echo "FAIL"; 
    //echo "Error: " . $sql . "<br>" . $conn->error;	 	
}
}

$sql = "select id, Heading , Content, count(*) from temp group by Content having count(*)>1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["Heading"]. " " . $row["Content"]. "<br>";
		//$conn->query("delete from temp where Content='{$row['Content']}' and Heading =' {$row['Heading']}'");
		$sql = "delete from temp where Content='{$row['Content']}' and id <> {$row['id']}";
		$res = $conn->query($sql);
    }
} else {
    echo "0 results";
}

sleep(5);

?>