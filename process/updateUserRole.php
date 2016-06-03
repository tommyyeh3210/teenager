<?php
include ("dbconf.php");

$userID = "";
$roleID = "";

$userID = $_POST["userID"];
$roleID = $_POST["roleID"];
try {
	$sql = "UPDATE `member` 
			SET role=:roleID				
			WHERE member_id=:rID";

	$sth = $con->prepare($sql);		
	$sth->bindParam(':roleID',$roleID);	
	$sth->bindParam(':rID',$userID);
	$sth->execute();	
	echo "success";
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}


$con = null;
?>