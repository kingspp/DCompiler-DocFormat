<?php
require_once 'phpword/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

$rows = $_GET['argument1'];
$cols = $_GET['argument2'];

$dir="../files/";
$file="table.txt";
$handle = fopen($dir.$file, "r");

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();


$header = array('size' => 16, 'bold' => true);
// 1. Basic table
//$rows = 10;
//$cols = 5;
$section->addText(htmlspecialchars('Basic table'), $header);
$table = $section->addTable();
for ($r = 1; $r <= 8; $r++) {
    $table->addRow();
    for ($c = 1; $c <= 5; $c++) {
        $table->addCell(1750)->addText(htmlspecialchars("Row {$r}, Cell {$c}"));
    }
}


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld.docx');



/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */