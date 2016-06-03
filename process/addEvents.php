<?php
include ("dbconf.php");

$uid =  $_POST["id"];
$formDate = $_POST["formDate"];
$worshipSong =$_POST["worshipSong"];
$bibleScope =$_POST["bibleScope"];
$summary =$_POST["summary"];
$cross =$_POST["cross"];
$ResponMeg = "";

try {
	$sql = "SELECT `date` FROM worship WHERE `date`=:formDate AND member=:id";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':formDate',$formDate);
	$sth->bindParam(':id',$uid);
	$sth->execute();
	$result = $sth ->fetchAll();
	if (count($result) == 0) {
		try{
			//新增資料
			$sql = "INSERT INTO worship (`date`,`worshipSong`,`bibleScope`,`summary`,`crossText`,`member`) VALUES (:formDate,:worshipSong,:bibleScope,:summary,:cross,:id);";
			$sth = $con->prepare($sql);	
			$sth->bindParam(':formDate',$formDate);
			$sth->bindParam(':worshipSong',$worshipSong);
			$sth->bindParam(':bibleScope',$bibleScope);
			$sth->bindParam(':summary',$summary);
			$sth->bindParam(':cross',$cross);
			$sth->bindParam(':id',$uid);
			
			$sth->execute();	
			$ResponMeg = "新增成功<br />";
			
		}catch(Exception $ex){
			$message = $ex->getmessage();
			echo $message;	
		}
	}else{
		try{
			//新增資料
			$sql = "UPDATE `worship` SET `worshipSong`=:worshipSong,`bibleScope`=:bibleScope,`summary`=:summary,`crossText`=:cross WHERE `member`=:id AND `date`=:formDate;";
			$sth = $con->prepare($sql);
			$sth->bindParam(':formDate',$formDate);		
			$sth->bindParam(':worshipSong',$worshipSong);
			$sth->bindParam(':bibleScope',$bibleScope);
			$sth->bindParam(':summary',$summary);
			$sth->bindParam(':cross',$cross);
			$sth->bindParam(':id',$uid);
			
			$sth->execute();	
			$ResponMeg = "修改成功<br />";
			
		}catch(Exception $ex){
			$message = $ex->getmessage();
			echo $message;	
		}
	}
} catch (Exception $e) {
	$message = $ex->getmessage();
	echo $message;
}

echo $ResponMeg;
$con = null;


?>