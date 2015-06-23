<?php
$files = glob('files/*.txt'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


$sec = "5";
header("Refresh: $sec; url=http://localhost");

?>