<?php
$filename = "files/abcd.txt";
$fh = fopen($filename,'r') or die($php_errormsg);
$people = fread($fh,filesize($filename));

echo $people;
?>