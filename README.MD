#PDFALL for PHP (PHP 5 Compatible)
This is a function to create a pdf file with all your bills, then you can print, download or output on browser. 

Original written by https://github.com/gabriela-castro

## Uses another libs: PDFMerger and HTML2PDF

I have put all the files separatelly

### Example Usage
<?php
include 'function_pdf.php';

main($array,$output);
//$array is all the id's bills you have to genarate
//$output could be 'browser', 'download', 'string', or 'file' for output options
?>
