<?php
//sleep(1);

$filename="Report.docx";
    header('Content-Type: application/download');
    header('Content-Disposition: attachment; filename=Report.docx');
    header("Content-Length: " . filesize($filename));

    $fp = fopen($filename, "r");
    fpassthru($fp);
    fclose($fp);


header("Refresh: 1; url=http://localhost");
?>