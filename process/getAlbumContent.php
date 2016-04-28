<?php
	include ("dbconf.php");
	$songID= $_POST["item"];
try{
	$sql = "SELECT * FROM `song` WHERE album =:id";
	$sth = $con->prepare($sql);
	$sth->bindParam(':id',$songID);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$count = 1;
		if($row["song_enname"] != NULL){
			$count++;
		}
		if($row["tune"] != NULL){
			$count++;
		}
		if($row["page"] != NULL){
			$count++;
		}
		if($row["lyrics"] != NULL){
			$count++;
		}

		//檢查歌曲是否上傳樂譜
		$sql = "SELECT `song_sheet`.sheet_name FROM `song_sheet` WHERE song_id = :rid";
		$sth = $con->prepare($sql);
		$sth->bindParam(':rid',$row["song_id"]);
		$sth->execute();
		$result = $sth ->fetchAll();
		if ($result){
			$count++;
		}

		$data = array(
			"song_id" => $row["song_id"],
			"song_enname" => urlencode($row["song_enname"]),
			"song_chname" => urlencode($row["song_chname"]),
			"ablum" => $row["album"],
			"tune" => urldecode($row["tune"]),
			"lyrics" => urldecode($row["lyrics"]),
			"page" => $row["page"],
			"integrity"	=> $count
			);
		array_push($arr, $data);
	}
}catch(Exception $ex){
	$message = $ex->getMessage();
	echo $message;
}
	
	$con = null;
	echo urldecode(json_encode($arr));


?>