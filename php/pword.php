<?php
require_once '../phpword/src/PhpWord/Autoloader.php';
\PhpOffice\PhpWord\Autoloader::register();
\PhpOffice\PhpWord\Settings::setPdfRendererPath('tcpdf');
\PhpOffice\PhpWord\Settings::setPdfRendererName('TCPDF');

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
$id=0;
$handle = fopen("../php/sort.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		$name[$id++] = $line;
		//echo $name[$id-1];
    }

    fclose($handle);
} else {
    // error opening the file.
} 



for($i=0; $i<sizeof($name);$i++){
	$name[$i]=preg_replace('/\s+/', '', $name[$i]);
	//echo $name[$i];
	}



//$file=$dir.$filename.$format;
//$fh = fopen($file,'r') or die($php_errormsg);
//$read = fread($fh,filesize($file));
for ($x = 0; $x < sizeof($name); $x++) {
    //echo $dir.$files[$x].$format;
	$myfile = fopen($dir.$name[$x].$format, "r");
	$read[$x]= fread($myfile,filesize($dir.$name[$x].$format));
}



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


for($x=2 ; $x < sizeof($name); $x++){
$section->addListItem($name[$x], 0, 'hFont', 'multilevel','tStyle');
//echo $name[$x]."<br>";
$section->addText(htmlspecialchars($read[$x]),'nFont','nStyle');
//echo $read[$x]."<br>";
$section->addTextBreak(2);
}




// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('Report.docx');


/*
// Saving the document as HTML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
$objWriter->save('Report.html');


//Load temp file
$phpWord = \PhpOffice\PhpWord\IOFactory::load('Report.docx'); 

$xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord , 'PDF');
$xmlWriter->save('Report.pdf');  
*/
/*
for ($x = 0; $x < 3; $x++){		
	echo $read[$x].'<br><br>';
}
*/
header("Refresh: 1; url=http://localhost/download.html");

/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */
?>