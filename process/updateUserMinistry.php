<?php
include ("dbconf.php");

$userID = "";
$ministryID = "";

$userID = $_POST["userID"];
$ministryID = $_POST["ministryID"];
try {
	$sql = "UPDATE `member` 
			SET ministry=:ministryID				
			WHERE member_id=:rID";

	$sth = $con->prepare($sql);		
	$sth->bindParam(':ministryID',$ministryID);	
	$sth->bindParam(':rID',$userID);
	$sth->execute();	
	echo "success";
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}


$con = null;
?>