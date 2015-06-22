<?php
//error_reporting(E_ALL);
//var_dump($_SERVER);
$post_head = $_POST['head'];
$post_data = $_POST['data'];
$post_head=str_replace("head=","",$post_head);
$post_data=str_replace("data=","",$post_data);

if (!empty($post_data)) {
    $dir = 'files/';
    $file = uniqid().getmypid();
    $filename = $dir.$post_head.'.txt';
    $handle = fopen($filename, "w");
    fwrite($handle, $post_data);
    fclose($handle);
    echo $dir.$post_head;}
?>