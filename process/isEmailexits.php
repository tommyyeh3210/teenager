<?php
include ("dbconf.php");

$email = $_POST['email'];

$arr = array();

$sql = "SELECT * FROM member WHERE email = :email";
$sth = $con->prepare($sql);
$sth->bindParam(':email',$email);
$sth->execute();
$result = $sth ->fetchAll();

$con = null;
if(count($result) == 0){
	echo urldecode(json_encode(0));
}else{
	echo urldecode(json_encode(1)); /* 有查詢到相同email傳回true*/
}

?>