<?php

require_once '../phpword/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
	
$rows=$_REQUEST["row"];
$cols=$_REQUEST["col"];
$dir = '../files/';
$filename = $dir.'table.txt';
$handle = fopen($filename, "w");
for ($x = 0; $x < $rows; $x++){
	for ($y = 0; $y < $cols; $y++){
		$data=$_REQUEST[$x.$y];
		fwrite($handle, $data."\n");		
		}	
	}
fclose($handle);


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
        $table->addCell(1750)->addText(htmlspecialchars($_REQUEST[$x.$y]));
    }
}


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Table.docx');

?>
