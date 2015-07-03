<?php
include 'db/dbinfo.php';

$string = file_get_contents("db/iList.json");
$json_a = json_decode($string, true);
$iId = $json_a['image'];

/*
Server-side PHP file upload code for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
$dir = "../files/uploads/";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);

if ($fn) {

	// AJAX call
	file_put_contents(
		'uploads/' . $fn,
		file_get_contents('php://input')
	);
	echo "$fn uploaded";
	exit();

}
else {

	// form submit
	$files = $_FILES['fileselect'];

	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = $files['name'][$id];
			move_uploaded_file(
				$files['tmp_name'][$id],
				'../files/uploads/' . $fn
			);
			echo "<p>File $fn uploaded.</p>";
			$sql = "INSERT INTO documents (Heading, Content) VALUES('Image $iId', '$dir$fn');";
			if ($conn->query($sql) === TRUE) {	
				$last_id = mysqli_insert_id($conn);				
				echo $last_id;
			} 
			else {
				echo "FAIL"; 
				//echo "Error: " . $sql . "<br>" . $conn->error;	 	
			}
		}
	}
}
$iId++;
$json = array("image" => $iId);
$fp = fopen('db/iList.json', 'w');
fwrite($fp, json_encode($json));
fclose($fp);

header("Refresh: 1; url=http://localhost/");
?>