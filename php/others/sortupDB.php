<?php
	$data = $_POST["choices"];	
	$filename = 'sort.txt';
    $handle = fopen($filename, "w");	
	foreach ($data as $value) {
    // Execute statement:
    // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
	fwrite($handle, $value."\n");
    
}
    fclose($handle);	
?>