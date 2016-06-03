<?php
include ("dbconf.php");

$id = $_POST["id"];

try{
	$sql = "DELETE FROM `group` WHERE group_id =:id";
	$sth = $con->prepare($sql);
	$sth->bindParam(':id',$id);
	$sth->execute();
	echo "刪除成功";

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}



$con = null;
?>