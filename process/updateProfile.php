<?php
include ("dbconf.php");


$inputName = $_POST["inputName"];
$inputSex = $_POST["inputSex"];
$inputBirthday = $_POST["inputBirthday"];
$inputAddress = $_POST["inputAddress"];
$inputPhone = $_POST["inputPhone"];
$inputMobile = $_POST["inputMobile"];
$inputSkill = $_POST["inputSkill"];
$inputEdu = $_POST["inputEdu"];
$inputBible = $_POST["inputBible"];

try {
	$sql = "UPDATE `member` SET name=:inputName,phone=:inputPhone,sex=:inputSex,birthday=:inputBirthday,mobile=:inputMobile,education=:inputEdu,address=:inputAddress,skill=:inputSkill WHERE member_id=:rID";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':inputName',$inputName);
	$sth->bindParam(':inputSex',$inputSex);
	$sth->bindParam(':inputBirthday',$inputBirthday);
	$sth->bindParam(':inputAddress',$inputAddress);
	$sth->bindParam(':inputPhone',$inputPhone);
	$sth->bindParam(':inputMobile',$inputMobile);
	$sth->bindParam(':inputSkill',$inputSkill);
	$sth->bindParam(':inputEdu',$inputEdu);
	$sth->bindParam(':inputBible',$inputBible);
	$sth->bindParam(':rID',$_SESSION["uid"]);
	$sth->execute();

	echo "<script>alert('修改成功<br />請重新登入')</script>";
	header("Location: logout.php");
	
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}


$con = null;
?>