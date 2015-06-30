<?php
$files = glob('../files/*.txt');
foreach ($files as $key => $val) {
   echo $val.'<br>';
}

?>