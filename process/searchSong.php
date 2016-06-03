<?php

include ("dbconf.php");

$chQ = $_POST["chQ"];
$enQ = $_POST["enQ"];
$tuneQ = $_POST["tuneQ"];
$lyricsQ = $_POST["lyricsQ"];
//$enQ = urlencode("dd");
//echo urldecode(json_encode($enQ));

$param = array();

try{
	//$chQ = "夢";
	//$enQ = "dr";
	//$tuneQ = "D";
	
	//$key = 0;
	$sql = "SELECT `song`.* ,`album`.`album_name` FROM `song`,`album` WHERE 1 AND `song`.`album` = `album`.`album_id` "; //記得1後面要空格	
	if (isset($chQ)){
		$sql .= "AND `song_chname` like :chQ ";
		$chQ = "%".$chQ."%";		
		$param['chQ'] = $chQ;
	}
	if (isset($enQ)) {
		$sql .= "AND `song_enname` like :enQ ";
		$enQ = "%".$enQ."%";
		$param['enQ'] = $enQ;
	}
	if (isset($tuneQ)) {
		$sql .= "AND `tune` like :tuneQ ";
		$tuneQ = "%".$tuneQ."%";
		$param['tuneQ'] = $tuneQ;
	}
	if(isset($lyricsQ)){
		$sql .= "AND `lyrics` like :lyricsQ ";
		$lyricsQ = "%".$lyricsQ."%";
		$param['lyricsQ'] = $lyricsQ;
	}
	
	$sth = $con->prepare($sql);			
	foreach ($param as $key => &$value) {  //$value 要加 &才行
		//echo $key. "  " . $value;
		$sth->bindParam(':'.$key,$value);
		//var_dump($sth);
	}

	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	$sheet = array();
	foreach ($result as $row) {
		$sheet = getSheetArray($row["song_id"]);
		$data = array(
			"song_id" => urlencode($row["song_id"]),
			"song_enname" => urlencode($row["song_enname"]),
			"song_chname" => urlencode($row["song_chname"]),
			"album" => urlencode($row["album_name"]),
			"tune" => urlencode($row["tune"]),
			"lyrics" => $row["lyrics"],      //不用urlencode 就可以運作 無解中
			"note" => urlencode($row["note"]),
			"sheet" => $sheet,
			"page" => urlencode($row["page"])
			);
		array_push($arr, $data);
	}
}catch(Exception $ex){
	$message = $ex->getMessage();
	echo $message;
}

echo urldecode(json_encode($arr));
$con = null;


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