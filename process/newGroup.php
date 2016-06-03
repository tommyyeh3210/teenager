<?php 

include ("dbconf.php");
$title = $_POST["grouptitle"];
$captainID = $_POST["captainID"];
date_default_timezone_set('Asia/Taipei');


try{
	$sql = "INSERT INTO `group`(group_name,group_leader)
			VALUES (:title,:captainID)";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':title',$title);
	$sth->bindParam(':captainID',$captainID);
	$sth->execute();

	header("Location: ../groupManage.php");

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}

$con = null;
?>