<?php
	session_start();
	include ("dbconf.php");
	
	$email = $_POST["email"];
	$password = $_POST["password"];	

	$sql = "SELECT * FROM member WHERE email=:email AND password=:pwd";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':email',$email);
	$sth->bindParam(':pwd',$password);
	$sth->execute();
	$result = $sth ->fetchAll();

	if(count($result) == 1){
		foreach ($result as $row) {
			$_SESSION["uid"] = $row["member_id"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["name"] = $row["name"];			
			$_SESSION["phone"] = $row["phone"];
			$_SESSION["sex"] = $row["sex"];
			$_SESSION["birthday"] = $row["birthday"];
			$_SESSION["role"] = $row["role"];
			$_SESSION["mobile"] = $row["mobile"];
			$_SESSION["group_for"] = $row["group_for"];
			$_SESSION["ministry"] = $row["ministry"];
			$_SESSION["education"] = $row["education"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["skill"] = $row["skill"];
			$_SESSION["verse"] = $row["verse"];
			$_SESSION["code"] = $row["complete_authentication"];
		}
		//echo $_SESSION["uid"];
		//echo $_SESSION["email"];
		//echo $_SESSION["name"];
		header("Location: ../starter.php");
	}else{
		echo "登入失敗";
		header("Location: ../Login/index.html");
	}

	/*foreach ($result as $row) {
		echo $row["id"]."---".$row["name"]."---".$row["email"];
	}*/

	
	//echo $username."    ".$password;
	
$con = null;
?>