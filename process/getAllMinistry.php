<?php
	include ("dbconf.php");

	$sql = "SELECT * FROM `ministry`";
	$sth = $con->prepare($sql);
	$sth->execute();

	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"ministry_id" => $row["ministry_id"],
			"ministry_name" => urlencode($row["ministry_name"])
			);
		array_push($arr, $data);		
	}
	
	$con = null;

	echo urldecode(json_encode($arr));


?>