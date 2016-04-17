<?php
include ("dbconf.php");
$target_dir = "../uploads/";

$SongChName = "";
$SongEnName = "";
$Tune = "";
$Lyrics = "";
$timeStamp = time();

$rID = $_POST["rID"];
$SongChName = $_POST["modifySongChName"];
$SongEnName = $_POST["modifySongEnName"];
$Tune = $_POST["modifyTune"];
$Lyrics = $_POST["modifyLyrics"];
$ResponMessage = "更新成功";

try{
	//新增資料
	$sql = "UPDATE `song` SET song_chname=:SongChName,song_enname=:SongEnName,tune=:Tune,lyrics=:Lyrics WHERE song_id=:rID";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':SongChName',$SongChName);
	$sth->bindParam(':SongEnName',$SongEnName);
	$sth->bindParam(':Tune',$Tune);
	$sth->bindParam(':Lyrics',$Lyrics);
	$sth->bindParam(':rID',$rID);
	//$sth->bindParam(':sheet',$sheet);
	$sth->execute();
	
	
	for ($i=0; $i < count($_FILES["modifyfileToUpload"]["name"]) ; $i++) { 
		if($_FILES["modifyfileToUpload"]["error"][$i] === UPLOAD_ERR_NO_FILE){
			$ResponMessage = "無選取任何檔案";
			break;
		}
		$target_file = $target_dir . $timeStamp . iconv("utf-8","Big5",$_FILES["fileToUpload"]["name"][$i]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["modifyfileToUpload"]["tmp_name"][$i]);
		    if($check !== false) {
		        $ResponMessage = "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        $ResponMessage = "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $ResponMessage = "很抱歉，檔案已經存在";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["modifyfileToUpload"]["size"][$i] > 10485760000) {  //單位是byte  10MB
		    $ResponMessage = "檔案過大無法上傳，僅限10MB";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "iso" ) {
		    $ResponMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $ResponMessage = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["modifyfileToUpload"]["tmp_name"][$i], $target_file)) {
		    	$sheetName = $timeStamp.$_FILES["modifyfileToUpload"]["name"][$i];
		    	$songID = $rID;		    	 
		        $ResponMessage = "The file ". $sheetName. "上傳成功";
		        $sql = "INSERT INTO song_sheet (`sheet_name`,`song_id`) VALUES (:sheetName,:songID);";
				$sth = $con->prepare($sql);	
				$sth->bindParam(':sheetName',$sheetName);
				$sth->bindParam(':songID',$songID);
				$sth->execute();				
		    } else {
		        $ResponMessage = "Sorry, there was an error uploading your file.";
		    }
		}		
	}
	
}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
	//echo $message;
	//echo "<script>alert(". $message .")</script>";
}
//echo urldecode(json_encode(urlencode($ResponMessage)));
echo "修改成功<br />".$ResponMessage;

$con = null;


?>