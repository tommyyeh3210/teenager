<?php
include ("dbconf.php");
$target_dir = "../uploads/";

$song_id = $_POST["del_id"];

try{
	
	$sql = "SELECT * FROM `song_sheet` WHERE song_id=:songID;";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':songID',$song_id);
	$sth->execute();
	$result = $sth ->fetchAll();
	foreach ($result as $row) {
		if (file_exists($target_dir.$row["sheet_name"])) {
			unlink($target_dir.$row["sheet_name"]);
		}
	}
	$sql = "DELETE FROM `song_sheet` WHERE song_id = :id;";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':id',$song_id);
	$sth->execute();

	$sql = "DELETE FROM `song` WHERE song_id = :id;";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':id',$song_id);
	$sth->execute();

	echo "刪除成功";

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}

$con = null;

?>