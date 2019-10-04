<?php
include 'dbinfo.php';

$tableName = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// documents table
$tableName = "documents";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Heading VARCHAR(30) NOT NULL,
Content TEXT  NOT NULL,
reg_date TIMESTAMP
)"; 

if ($conn->query($sql) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table: $tableName " . $conn->error;
}


// Temp table
$tableName = "temp";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Heading VARCHAR(30) NOT NULL,
Content TEXT  NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table: $tableName " . $conn->error;
}



// Font Style table
$tableName = "fontStyle";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR(30) NOT NULL,
Size VARCHAR(30) NOT NULL,
Bold VARCHAR(30) NOT NULL,
Italic VARCHAR(30) NOT NULL,
UL VARCHAR(30) NOT NULL,
Color VARCHAR(30) NOT NULL,
AC VARCHAR(30) NOT NULL,
SC VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table: $tableName " . $conn->error;
}


// Paragraph Style table
$tableName = "pStyle";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Align VARCHAR(30) NOT NULL,
SB VARCHAR(30) NOT NULL,
SA VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table: $tableName " . $conn->error;
}




// Table style table
$tableName = "tStyle";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Width VARCHAR(30) NOT NULL,
BS VARCHAR(30) NOT NULL,
BC VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table: $tableName " . $conn->error;
}






?>