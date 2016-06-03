<?php
	include ("dbconf.php");

	$sql = "SELECT * FROM `group`";
	$sth = $con->prepare($sql);
	$sth->execute();

	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"group_id" => $row["group_id"],
			"group_name" => urlencode($row["group_name"])
			);
		array_push($arr, $data);		
	}
	
	$con = null;

	echo urldecode(json_encode($arr));


?>