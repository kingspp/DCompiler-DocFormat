<?php
	
$files = glob('../files/*.txt'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

echo "<b>Operation Successfull<b><br><br>";
echo "<b>Refreshing . . .<b>";
$sec = "3";
header("Refresh: $sec; url=http://localhost");

?>