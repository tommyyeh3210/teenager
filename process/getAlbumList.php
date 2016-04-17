<?php
	include ("dbconf.php");

	$sql = "SELECT * FROM album";
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"album_id" => $row["album_id"],
			"album_name" => urlencode($row["album_name"])
			);
		array_push($arr, $data);		
	}
	
	$con = null;

	echo urldecode(json_encode($arr));


?>