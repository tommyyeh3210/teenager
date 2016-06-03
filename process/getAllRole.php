<?php
	include ("dbconf.php");

	$sql = "SELECT * FROM `role`";
	$sth = $con->prepare($sql);
	$sth->execute();

	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"role_id" => urlencode($row["role_id"]),
			"role_name" => urlencode($row["role_name"])
			);
		array_push($arr, $data);		
	}
	
	$con = null;

	echo urldecode(json_encode($arr));


?>