<?php
include 'dbinfo.php';

//Create table for the first time

// sql to create table
$sql = "CREATE TABLE documents (
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



//Create table for the first time

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





?>