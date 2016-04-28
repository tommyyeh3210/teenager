<?php
include ("dbconf.php");

$title = $_POST["title"];
$content = $_POST["content"];
$id = $_POST["id"];
date_default_timezone_set('Asia/Taipei');
$timestamp = date("Y-m-d,H:i");

try{
	$sql = "UPDATE `publish` SET `publish_title` = :title,
								 `publish_content` = :content,
								 `publish_date` = :pDate
			WHERE `publish`.`publish_id` = :id";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':title',$title);
	$sth->bindParam(':content',$content);
	$sth->bindParam(':pDate',$timestamp);
	$sth->bindParam(':id',$id);	
	$sth->execute();


}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}


	echo "修改成功";
$con = null;
?>