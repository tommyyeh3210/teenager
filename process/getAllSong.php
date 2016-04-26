<?php
	include ("dbconf.php");

	$sql = "SELECT `song`.* ,`album`.`album_name` FROM `song`,`album` WHERE `song`.`album` = `album`.`album_id`";
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	$sheet = array();
	foreach ($result as $row) {	
		$sheet = getSheetArray($row["song_id"]);	
		$data = array(
			"song_id" => $row["song_id"],
			"song_chname" => urlencode($row["song_chname"]),
			"song_enname" => urldecode($row["song_enname"]),
			"album" => $row["album_name"],
			"tune" => urldecode($row["tune"]),
			"lyrics" => urldecode($row["lyrics"]),
			"note" => urldecode($row["note"]),
			"sheet" => $sheet,
			"page" => $row["pages"]
			);
		array_push($arr, $data);
	}
	
	$con = null;

	echo urldecode(json_encode($arr));

function getSheetArray($id){
	include ("dbconf.php");
	$sql = "SELECT * FROM `song_sheet` WHERE `song_id` =".$id ;
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		array_push($arr, $row["sheet_name"]);
	}
	$con = null;
	return $arr;
}

?>