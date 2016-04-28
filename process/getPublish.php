<?php
include ("dbconf.php");

try {
	$sql = "SELECT `publish`.*,`member`.name FROM `publish`,`member` 
			WHERE 1 AND `publish_person` = `member`.member_id  
			ORDER BY publish_date DESC";
	$sth = $con->prepare($sql);	
	$sth->execute();
	$result = $sth->fetchAll();
	$arr = array();
	foreach ($result as $row) {
		$data = array(
			"publish_id" => $row["publish_id"],
			"publish_date" => $row["publish_date"],
			"publish_person" => $row["name"],
			"publish_content" => $row["publish_content"],
			"ministry" => $row["ministry"],
			"publish_title" => $row["publish_title"]
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