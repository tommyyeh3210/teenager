<?php
	session_start();
	include ("dbconf.php");
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	$salt = "A7fLg&fg3@";
	

	$sql = "SELECT `member`.*,`group`.group_name,`ministry`.ministry_name,`role`.role_name 
			FROM `member`,`group`,`ministry`,`role` 
			WHERE email=:email 
			AND password=:pwd 
			AND `member`.ministry = `ministry`.ministry_id
			AND `member`.group_for = `group`.group_id 
			AND `member`.role = `role`.role_id";
	$sth = $con->prepare($sql);	
	$sth->bindParam(':email',$email);
	$sth->bindParam(':pwd',md5($password.$salt));
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
			$_SESSION["role_name"] = $row["role_name"];
			$_SESSION["mobile"] = $row["mobile"];
			$_SESSION["group_for"] = $row["group_for"];
			$_SESSION["group_name"] = $row["group_name"];
			$_SESSION["ministry"] = $row["ministry"];
			$_SESSION["ministry_name"] = $row["ministry_name"];
			$_SESSION["education"] = $row["education"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["skill"] = $row["skill"];
			$_SESSION["verse"] = $row["verse"];
			$_SESSION["code"] = $row["complete_authentication"];
		}
		//echo $_SESSION["uid"];
		//echo $_SESSION["email"];
		//echo $_SESSION["name"];
		header("Location: ../publish.php");
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