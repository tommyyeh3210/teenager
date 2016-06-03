<?php
include ("dbconf.php");

$title = $_POST["grouptitle"];
$captainID = $_POST["captainID"];
$id = $_POST["id"];
date_default_timezone_set('Asia/Taipei');

try{
	$sql = "UPDATE `group` SET `group_name` = :title,
								 `group_leader` = :captainID								 
			WHERE `group`.`group_id` = :id";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':title',$title);
	$sth->bindParam(':captainID',$captainID);
	$sth->bindParam(':id',$id);
	$sth->execute();

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}
	echo "修改成功";
$con = null;
?>