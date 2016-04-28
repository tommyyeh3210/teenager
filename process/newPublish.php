<?php 
session_start();
include ("dbconf.php");
$title = $_POST["maintitle"];
$content = $_POST["syncContent"];
date_default_timezone_set('Asia/Taipei');
$timestamp = date("Y-m-d,H:i");

try{
	$sql = "INSERT INTO `publish`(publish_date,publish_person,publish_content,ministry,publish_title)
			VALUES (:pDate,:pPerson,:pContent,:ministry,:pTitle)";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':pDate',$timestamp);
	$sth->bindParam(':pPerson',$_SESSION["uid"]);
	$sth->bindParam(':pContent',$content);
	$sth->bindParam(':ministry',$_SESSION["ministry"]);
	$sth->bindParam(':pTitle',$title);
	$sth->execute();

	header("Location: ../publish.php");

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}

$con = null;
?>