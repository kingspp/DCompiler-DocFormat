<?php
require_once '../phpword/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->addParagraphStyle('tStyle', array('align' => 'center', 'spaceAfter' => 100));
$phpWord->addParagraphStyle('nStyle', array('align' => 'justify'));
$phpWord->addFontStyle('tFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => true, 'size' => 24, 'allCaps' => true));
$phpWord->addFontStyle('hFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 10, 'allCaps' => true));
$phpWord->addFontStyle('aFont', array('name' => 'Times New Roman', 'bold' => true, 'italic' => false, 'size' => 9));
$phpWord->addFontStyle('nFont', array('name' => 'Times New Roman', 'bold' => false, 'italic' => false, 'size' => 10));
$phpWord->addNumberingStyle(
    'multilevel',
    array('type' => 'multilevel', 'levels' => array(
        array('format' => 'upperRoman', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
        array('format' => 'upperLetter', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
        )
     )
);

$dir="../files/";
$format=".txt";
$filename = array("Title", "Abstract", "Introduction", "Acknowledgment", "References");	
$read = array("","","","","");
$xmax=5;
//$file=$dir.$filename.$format;
//$fh = fopen($file,'r') or die($php_errormsg);
//$read = fread($fh,filesize($file));
for ($x = 0; $x < $xmax; $x++) {
    //echo $dir.$files[$x].$format;
	$myfile = fopen($dir.$filename[$x].$format, "r");
	$read[$x]= fread($myfile,filesize($dir.$filename[$x].$format));
}

$filler = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
        . 'Nulla fermentum, tortor id adipiscing adipiscing, tortor turpis commodo. '
        . 'Donec vulputate iaculis metus, vel luctus dolor hendrerit ac. '
        . 'Suspendisse congue congue leo sed pellentesque.';

// Normal
$section = $phpWord->addSection();
$section->addText(htmlspecialchars($read[0]),'tFont', 'tStyle');
$section->addTextBreak(2);


// Two columns
$section = $phpWord->addSection(
    array(
        'colsNum'   => 2,		
        'breakType' => 'continuous',
    )
);

$section->addText(htmlspecialchars("Abstract-{$read[1]}"),'aFont');
$section->addTextBreak(2);
$section->addListItem('Introduction', 0, 'hFont', 'multilevel','tStyle');
$section->addText(htmlspecialchars($read[2]),'nFont','nStyle');
$section->addTextBreak(2);
$section->addText(htmlspecialchars("Acknowledgment"),'hFont','tStyle');
$section->addText(htmlspecialchars($read[3]),'nFont','nStyle');
$section->addTextBreak(2);
$section->addText(htmlspecialchars("References"),'hFont','tStyle');
$section->addText(htmlspecialchars($read[4]),'nFont','nStyle');









// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Report.docx');
/*
for ($x = 0; $x < 3; $x++){		
	echo $read[$x].'<br><br>';
}
*/
header("Refresh: 1; url=http://localhost/download.html");

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */