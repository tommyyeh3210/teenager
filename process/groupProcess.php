<?php
include ("dbconf.php");
session_start();

try {
	$sql = "SELECT *,`member`.name FROM `group`,`member` WHERE 1 AND `group`.group_leader = `member`.member_id";
	$sth = $con->prepare($sql);	
	$sth->execute();
	$result = $sth->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"group_id" => $row["group_id"],
			"group_name" => urlencode($row["group_name"]),
			"leader_id" => $row["group_leader"],
			"leader_name" => urlencode($row["name"]),
			"establish_date" => $row["establish_date"]
			);
		array_push($arr, $data);
	}	
} catch (Exception $e) {
	$message = $e->getmessage();
	echo $message;
}

echo urldecode(json_encode($arr));
$con = null;
?>