<?php
require_once '../phpword/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
$rows=$_REQUEST["row"];
$cols=$_REQUEST["col"];
//Write Table if needed
$id=1;

$id1=1;
$dir = '../files/';
$filename = $dir.'table.txt';
$handle = fopen($filename, "w");
for ($x = 0; $x < $rows; $x++){
	for ($y = 0; $y < $cols; $y++){
		$data[$x][$y]=$_REQUEST[$id1++];
		fwrite($handle, $data[$x][$y]."\n");		
		}	
	}
fclose($handle);


$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$header = array('size' => 16, 'bold' => true);
$section->addTextBreak(1);
$section->addText(htmlspecialchars('Table'), $header);
$styleTable = array('borderSize' => 6, 'borderColor' => '000000', 'cellMargin' => 80);
$styleFirstRow = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => 'FFFFFF');
$styleCell = array('valign' => 'center');
$styleCellBTLR = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fontStyle = array('bold' => true, 'align' => 'center');
$phpWord->addTableStyle('Fancy Table', $styleTable, $styleFirstRow);
$table = $section->addTable('Fancy Table');
for ($x = 0; $x < $rows; $x++){
    $table->addRow();
   for ($y = 0; $y < $cols; $y++){
		if ($x==0)
			$table->addCell(1750)->addText(htmlspecialchars($_REQUEST[$id++]), $fontStyle);
		else
			$table->addCell(1750)->addText(htmlspecialchars($_REQUEST[$id++]), null);
    }
}
// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Table.docx');
header("Refresh: 1; url=http://localhost/");
?>