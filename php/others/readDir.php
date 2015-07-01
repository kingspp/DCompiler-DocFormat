<?php
$dir   = "files/uploads/"
$files = glob('../../files/uploads/*');
$files = array_map('basename', $files);
$files = preg_replace('/\\.[^.\\s]{3,4}$/', '', $files);
foreach ($files as $key => $val) {
   echo $val.'<br>';
}

?>