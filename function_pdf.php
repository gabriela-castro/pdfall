<?php
//receive an array whith all the id's of the billets
function testok($row){
if(is_array($row)==FALSE){
	echo '<script> window.alert("None file was found."); javascript:window.close();</script>';
die;}
return $row;
}

function main($row, $output){
testok($row);
foreach($row as $value){
	$id= $value;
//put here your code for generate your HTML for example include("layout.php");

ob_start();

$content = ob_get_clean();
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('P','A4','fr', array(0, 0, 0, 0));
$html2pdf->pdf->SetDisplayMode('real');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$nomebo='onefile'.$id.'.pdf';
$html2pdf->Output($nomebo, 'F');
$pdfarray[]=$nomebo;//array with pdf's filesname
}
//lib to merge all files
include 'PDFMerger-master/PDFMerger.php';

$pdf = new PDFMerger;
foreach($pdfarray as $nomefiles){
	$pdf->addPDF($nomefiles, 'all');
}
//output can be file, download or browser
$pdf->merge($output, 'filename.pdf');

//delete all files gerated, remove that if you don't want to erase all the .pdf
foreach($pdfarray as $nomefiles){
	unlink($nomefiles);
}
}
?>
