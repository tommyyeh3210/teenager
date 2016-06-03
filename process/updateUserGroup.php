<?php
include ("dbconf.php");

$userID = "";
$groupID = "";

$userID = $_POST["userID"];
$groupID = $_POST["groupID"];
try {
	$sql = "UPDATE `member` 
			SET group_for=:groupID				
			WHERE member_id=:rID";

	$sth = $con->prepare($sql);		
	$sth->bindParam(':groupID',$groupID);	
	$sth->bindParam(':rID',$userID);
	$sth->execute();	
	echo "success";
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}


$con = null;
?>