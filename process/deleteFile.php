<?php
include ("dbconf.php");
$target_dir = "../uploads/";

$del_id = $_POST["db_id"];
$del_name = $_POST["fileName"];

$deletesuccess = 0;
try{
	$sql = "DELETE FROM `song_sheet` WHERE sheet_id = :db_id";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':db_id',$del_id);
	$sth->execute();

	if (file_exists($target_dir.$del_name)) {
		unlink($target_dir.$del_name);
		$deletesuccess = 1;
	}
}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;	
}

if ($deletesuccess == 1) {
	echo "刪除成功";
}else{
	echo "刪除失敗";
}


$con = null;

?>