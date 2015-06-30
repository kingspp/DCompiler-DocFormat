<?php
/* set out document type to text/javascript instead of text/html */
header("Content-type: text/javascript");
$dir="../files/";
$format=".txt";
$files = array_filter(glob('../files/*.txt'), 'is_file');
$files = array_map('basename', $files);
$files = preg_replace('/\\.[^.\\s]{3,4}$/', '', $files);



$files=array_diff($files, ["Title", "Abstract", "Introduction"]);
array_unshift($files, "Title","Abstract","Introduction");





for ($x = 0; $x < sizeof($files); $x++) {    
	$myfile = fopen($dir.$files[$x].$format, "r");
	$read[$x]= fread($myfile,filesize($dir.$files[$x].$format));	
}

/* our multidimentional php array to pass back to javascript via ajax */
$arr = array_combine($files , $read);
/* encode the array as json. this will output [{"first_name":"Darian","last_name":"Brown","age":"28","email":"darianbr@example.com"},{"first_name":"John","last_name":"Doe","age":"47","email":"john_doe@example.com"}] */
echo json_encode($arr);
?>