<?php
//Get the list of files
$files = array_filter(glob('files/*.txt'), 'is_file');
$files = array_map('basename', $files);









// this function inserts the filename and the modification date of the current file
function insert_record($name, $fsize, $mod_date) {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "documat";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// sql to create table
$sql = "
CREATE TABLE IF NOT EXISTS example (  
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename varchar(255) NOT NULL default '',
  filesize varchar(255) NOT NULL default '',
  lastdate datetime NOT NULL default '0000-00-00 00:00:00'  
)";
if ($conn->query($sql) === TRUE) {
    echo "Table Marathon created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
	
	
	
	$sql = "INSERT INTO example (filename, filesize, lastdate) Values('$name' ,  '$fsize kb', '$mod_date')";

	if ($conn->query($sql) === TRUE) {	
		$last_id = mysqli_insert_id($conn);
		echo $last_id;
	} 
	else {
		echo "FAIL"; 
		//echo "Error: " . $sql . "<br>" . $conn->error;	 	
	}
	$conn->close();		
    }



// creating the current path 
$path = "files/";
// the trailing slash for windows or linux
//$path .= (substr($path, 0, 1) == "/") ? "/" : "\\";
// get the filenames from the directory
$file_array = $files;//select_files($path);
// creating some controle variables and arrays
$num_files = count($file_array);
$success = 0;
$error_array = array();
// if the file array is not empty the loop will start
if ($num_files > 0) {
    foreach ($file_array as $val) {
        $fdate = date("Y-m-d", filectime($path.$val));
		$fsize = filesize($path.$val);
        if (insert_record($val, $fsize, $fdate)) {
            $success++;
        } else {
            $error_array[] = $val;
        }   
    }
    echo "Copied ".$success." van ".$num_files." files...";
    if (count($error_array) > 0) echo "\n\n<blockquote>\n".print_r($error_array)."\n</blockquote>";
} else {
    echo "No files or error while opening directory";
}
?>