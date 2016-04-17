<?php
include ("dbconf.php");
$albumName = $_POST["albumName"];

try{
	$sql = "INSERT INTO album (`album_name`) VALUES (:albumName);";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':albumName',$albumName);
	$sth->execute();
	
}catch(Exception $ex){
	$message = $ex->getmessage();

}
echo urldecode(json_encode(urlencode("100")));
	



?>