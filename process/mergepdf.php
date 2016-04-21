<?php
//require_once("fpdi_bridge.php");
//require_once("FPDI/fpdf_tpl.php");
require_once("FPDF/fpdf.php");
require_once("FPDI/fpdi.php");


$files = array(iconv("utf-8","big5",'你.pdf'),iconv("utf-8","big5",'我.pdf'));

$img = imagecreatefromjpeg('../uploads/xx.jpg'); 
//imagecolorallocatealpha(image, red, green, blue, alpha)
$black = imagecolorallocatealpha($img, 255, 60, 100,0);
$utf_text = "僅供敬拜團練習使用";
imagettftext($img, 90, 5, 200, 370, $black, "../uploads/msjh.ttc", $utf_text);
imagepng($img,'../uploads/final.png');
imagedestroy($img);


$pdf = new FPDI();

foreach ($files as $file) {
	// get the page count
    $pageCount = $pdf->setSourceFile("../uploads/".$file);
    // iterate through all pages
    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        // import a page
        $templateId = $pdf->importPage($pageNo);
        // get the size of the imported page
        $size = $pdf->getTemplateSize($templateId);

        // create a page (landscape or portrait depending on the imported page size)
        if ($size['w'] > $size['h']) {
            $pdf->AddPage('L', array($size['w'], $size['h']));
        } else {
            $pdf->AddPage('P', array($size['w'], $size['h']));
        }

        // use the imported page
        $pdf->useTemplate($templateId);
        $pdf->image("../uploads/final.png",15,85,150); //將圖片併到PDF
        
        $pdf->SetFont('Helvetica'); //Helvetica
        $pdf->SetXY(5, 5);
        $pdf->Write(8, 'hi');
    }
}

// Output the new PDF_arc(p, x, y, r, alpha, beta)
$pdf->Output();  //"../uploads/final.pdf","F"



?>