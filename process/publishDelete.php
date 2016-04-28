<?php
include ("dbconf.php");

$id = $_POST["id"];

try{
	$sql = "DELETE FROM `publish` WHERE publish_id =:id";
	$sth = $con->prepare($sql);
	$sth->bindParam(':id',$id);
	$sth->execute();


}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}


echo "刪除成功";
$con = null;
?>