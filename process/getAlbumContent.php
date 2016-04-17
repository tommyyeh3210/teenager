<?php
	include ("dbconf.php");

	$songID= $_POST["item"];

	$sql = "SELECT * FROM song WHERE album =:id";
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
		if($row["lyrics"] != NULL){
			$count++;
		}
		if($row["note"] != NULL){
			$count++;
		}

		$data = array(
			"song_id" => $row["song_id"],
			"song_enname" => urlencode($row["song_enname"]),
			"song_chname" => urlencode($row["song_chname"]),
			"ablum" => $row["album"],
			"tune" => urldecode($row["tune"]),
			"lyrics" => urldecode($row["lyrics"]),
			"integrity"	=> $count
			);
		array_push($arr, $data);
	}
	
	$con = null;

	echo urldecode(json_encode($arr));


?>