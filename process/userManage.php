<?php
include ("dbconf.php");

try {
	$sql = "SELECT `member`.`member_id`,`member`.`name`,`member`.`email`,`group`.`group_name`,`ministry`.`ministry_name`,`role`.`role_name` FROM `member`,`group`,`ministry`,`role` WHERE `member`.`group_for` = `group`.`group_id` AND `member`.`ministry` = `ministry`.`ministry_id` AND `member`.`role` = `role`.`role_id`";
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"id" => $row["member_id"],
			"name" => urlencode($row["name"]),
			"email" => urlencode($row["email"]),
			"role" => urlencode($row["role_name"]),
			"group" => urlencode($row["group_name"]),
			"ministry" => urlencode($row["ministry_name"])
			);
		array_push($arr, $data);
	}	
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}

echo urldecode(json_encode($arr));

$con = null;


?>