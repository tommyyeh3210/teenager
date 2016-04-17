<?php
include ("dbconf.php");
$target_dir = "../uploads/";

$SongChName = "";
$SongEnName = "";
$AlbumID = "";
$Tune = "";
$Lyrics = "";
$timeStamp = time();

$SongChName = $_POST["newSongChName"];
$SongEnName = $_POST["newSongEnName"];
$AlbumID = $_POST["newAlbumID"];
$Tune = $_POST["newTune"];
$Lyrics = $_POST["newLyrics"];


try{
	//新增資料
	$sql = "INSERT INTO song (`song_chname`,`song_enname`,`album`,`tune`,`lyrics`) VALUES (:SongChName,:SongEnName,:AlbumName,:Tune,:Lyrics);";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':SongChName',$SongChName);
	$sth->bindParam(':SongEnName',$SongEnName);
	$sth->bindParam(':AlbumName',$AlbumID);
	$sth->bindParam(':Tune',$Tune);
	$sth->bindParam(':Lyrics',$Lyrics);
	//$sth->bindParam(':sheet',$sheet);
	$sth->execute();
	$ResponMessage = "新增成功";
	$lastID = $con->lastInsertId();
	
	for ($i=0; $i < count($_FILES["fileToUpload"]["name"]) ; $i++) { 
		if($_FILES["fileToUpload"]["error"][$i] === UPLOAD_ERR_NO_FILE){
			$ResponMessage .= "無選取任何檔案";
			break;
		}
		$target_file = $target_dir . $timeStamp . iconv("utf-8","Big5",$_FILES["fileToUpload"]["name"][$i]);  //網站放在bluehost主機不需要iconv轉換
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
		    if($check !== false) {
		        $ResponMessage .= "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        $ResponMessage .= "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $ResponMessage .= "很抱歉，檔案已經存在";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"][$i] > 10485760) {  //單位是byte  10MB
		    $ResponMessage .= "檔案過大無法上傳，僅限10MB";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "pdf" && $imageFileType != "iso" && $imageFileType != "jpg") { //$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && 
		    $ResponMessage .= "很抱歉, 只允許上傳 PDF 檔案";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    $ResponMessage .= "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
		    	$sheetName = $timeStamp.$_FILES["fileToUpload"]["name"][$i];
		    	$songID = $lastID;
		        $ResponMessage = "The file ". $sheetName . "上傳成功";
		        $sql = "INSERT INTO song_sheet (`sheet_name`,`song_id`) VALUES (:sheetName,:songID);";
				$sth = $con->prepare($sql);
				$sth->bindParam(':sheetName',$sheetName);
				$sth->bindParam(':songID',$songID);
				$sth->execute();
		    } else {
		        $ResponMessage .= "Sorry, there was an error uploading your file.";
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
echo "新增成功<br />".$ResponMessage;

$con = null;


?>