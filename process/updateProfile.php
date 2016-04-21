<?php
session_start();
include ("dbconf.php");

$inputName = "";
$inputSex = "";
$inputBirthday = "";
$inputAddress = "";
$inputPhone = "";
$inputMobile = "";
$inputSkill = "";
$inputEdu = "";
$inputBible = "";
//
//echo $_POST["inputName"]."<br />";
//echo $_POST["inputSex"]."<br />";
//echo $_POST["inputBirthday"]."<br />";
//echo $_POST["inputAddress"]."<br />";
//echo $_POST["inputPhone"]."<br />";
//echo $_POST["inputMobile"]."<br />";
//echo $_POST["inputSkill"]."<br />";
//echo $_POST["inputEdu"]."<br />";
//echo $_POST["inputBible"]."<br />";
//echo "======================<br />";
//
//echo $_SESSION["uid"]."<br />";
//echo $_SESSION["email"]."<br />";
//echo $_SESSION["name"]."<br />";
//echo $_SESSION["phone"]."<br />";
//echo $_SESSION["sex"]."<br />";
//echo $_SESSION["birthday"]."<br />";
//echo $_SESSION["role"]."<br />";
//echo $_SESSION["mobile"]."<br />";
//echo $_SESSION["group_for"]."<br />";
//echo $_SESSION["ministry"]."<br />";
//echo $_SESSION["education"]."<br />";
//echo $_SESSION["address"]."<br />";
//echo $_SESSION["skill"]."<br />";
//echo $_SESSION["verse"]."<br />";
//echo $_SESSION["code"]."<br />";

if(isset($_POST["inputName"])){
	$inputName = $_POST["inputName"];
}
if(isset($_POST["inputSex"])){
	$inputSex = $_POST["inputSex"];
}
if(isset($_POST["inputBirthday"])){
	$inputBirthday = $_POST["inputBirthday"];
}
if(isset($_POST["inputAddress"])){
	$inputAddress = $_POST["inputAddress"];
}
if(isset($_POST["inputPhone"])){
	$inputPhone = $_POST["inputPhone"];
}
if(isset($_POST["inputMobile"])){
	$inputMobile = $_POST["inputMobile"];
}
if(isset($_POST["inputSkill"])){
	$inputSkill = $_POST["inputSkill"];
}
if(isset($_POST["inputEdu"])){
	$inputEdu = $_POST["inputEdu"];
}
if(isset($_POST["inputBible"])){
	$inputBible = $_POST["inputBible"];
}

try {
	$sql = "UPDATE `member` 
			SET name=:inputName,
				phone=:inputPhone,
				sex=:inputSex,
				birthday=:inputBirthday,
				mobile=:inputMobile,
				education=:inputEdu,
				address=:inputAddress,
				skill=:inputSkill,
				verse=:inputBible 
			WHERE member_id=:rID";

	$sth = $con->prepare($sql);	
	$sth->bindParam(':inputName',$inputName);
	$sth->bindParam(':inputPhone',$inputPhone);
	$sth->bindParam(':inputSex',$inputSex);
	$sth->bindParam(':inputBirthday',$inputBirthday);
	$sth->bindParam(':inputMobile',$inputMobile);
	$sth->bindParam(':inputEdu',$inputEdu);
	$sth->bindParam(':inputAddress',$inputAddress);	
	$sth->bindParam(':inputSkill',$inputSkill);	
	$sth->bindParam(':inputBible',$inputBible);
	$sth->bindParam(':rID',$_SESSION["uid"]);
	$sth->execute();

	echo "<script>";
	echo "alert('修改成功,請重新登入');";
	echo "location.href='logout.php'";
	echo "</script>";
	//header("Refresh:5 logout.php");
	
} catch (Exception $e) {
	$message = $e->getMessage();
	echo $message;
}


$con = null;
?>