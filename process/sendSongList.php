<?php
include ("dbconf.php");
require_once("FPDF/fpdf.php");
require_once("FPDI/fpdi.php");

$listName = $_POST["Name"];
$songIdList = $_POST["songIdList"];
$songIdArray = explode(",",$songIdList); //分割成陣列
$songNameArray = array();
$timeStamp = time();
$respond =null;


if (isset($listName) == true && empty($songIdArray) == false) {
	try{
		foreach ($songIdArray as $key) {
			$sql = "SELECT * FROM `song_sheet` WHERE song_id =:id";
			$sth = $con->prepare($sql);
			$sth->bindParam(':id',$key);
			$sth->execute();
			$result = $sth->fetchAll();
			foreach ($result as $row) {
				array_push($songNameArray,$row["sheet_name"]);
			}
		}

		/*PDF合併語法*/
		$pdf = new FPDI();
		var_dump($songNameArray);
		foreach ($songNameArray as $file) {
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
		        
		        $pdf->image("../uploads/yy.png",0,5,80); //將圖片併到PDF
		        /*$pdf->SetFont('Helvetica'); //Helvetica
		        $pdf->SetXY(5, 5);
		        $pdf->Write(8, 'hi');*/
		    }
		}

		// Output the new PDF_arc(p, x, y, r, alpha, beta)
		$mergeName = $timeStamp.".pdf";

		$pdf->Output("../uploads/".$mergeName,"F");  //"../uploads/final.pdf","F"

		/*            
		*PDF合併語法 END
		*/

		$sql = "INSERT INTO `practicelist` (practicelist_name,merge_sheet) VALUES (:listName,:mergeName)";
		$sth = $con->prepare($sql);	
		$sth->bindParam(':listName',$listName);
		$sth->bindParam(':mergeName',$mergeName);
		$sth->execute();

		$practiceID = $con->lastInsertId();

		
		for($i=0;$i<count($songIdArray);$i++){
			$sql = "INSERT INTO `mergesong` (practicelistId,songId) VALUES (:practiceID,:songID)";
			$sth = $con->prepare($sql);	
			$sth->bindParam(':practiceID',$practiceID);
			$sth->bindParam(':songID',$songIdArray[$i]);
			$sth->execute();
		}
		$respond = "新增成功";


	}catch(Exception $ex){
		$message = $ex->getmessage();
		echo $message;
	}

}else{
	echo "無輸入歌曲ID";
}

echo $respond;



$con = null;
?>