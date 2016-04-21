<?php
include ("dbconf.php");

$del_id = $_POST["id"];
$del_file = $_POST["filename"];
$target_dir = "../uploads/";

try{
	if (file_exists($target_dir.$del_file)) {
		unlink($target_dir.$del_file);
	}
	$sql = "DELETE FROM `mergesong` WHERE `practicelistId` = :id2";
	$sth = $con->prepare($sql);
	$sth->bindParam(":id2",$del_id);
	$sth->execute();

	$sql = "DELETE FROM `practicelist` WHERE `practicelist_id` = :id";
	$sth = $con->prepare($sql);
	$sth->bindParam(":id",$del_id);
	$sth->execute();

	if (file_exists($target_dir.$del_file)) {
		unlink($target_dir.$del_file);
	}

	

	echo "刪除成功";


}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}




$con = null;
?>