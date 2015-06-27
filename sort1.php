<?php
	$data = $_POST["choices"];
	$newarray = explode("&", $data[0]);
	$filename = 'sorttttt.txt';
    $handle = fopen($filename, "w");	
	$i = count($newarray);
	foreach ($newarray as $key => $value) {
		fwrite($handle, $value."\n");
	}   
    fclose($handle);	
?>