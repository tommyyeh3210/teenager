<?php
include ("dbconf.php");
$rID = $_POST["rID"];


try{
	$sql = "SELECT * FROM `song_sheet` WHERE song_id = :RID";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':RID',$rID);
	$sth->execute();
	$arr = array();
	$result = $sth ->fetchAll();
	foreach ($result as $row) {
		$data = array(
			"sheet_id" => $row["sheet_id"],
			"sheet_name" => urlencode($row["sheet_name"])
			);
		array_push($arr, $data);
	}

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}

echo urldecode(json_encode($arr));

$con = null;
?>