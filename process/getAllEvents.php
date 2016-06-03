<?php
	include ("dbconf.php");
	session_start();

	$sql = "SELECT * FROM `worship` WHERE `member`=".$_SESSION["uid"];
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth ->fetchAll();
	$arr = array();	
	foreach ($result as $row) {
		$title = "";
		$titleColor = "";
		$count = 0;
		if ($row["worshipSong"] == 1) {
			$title .= "敬拜 ";
			$count++;
		}
		if($row["bibleScope"] != ""){
			$title .= "讀經 ";
			$count++;
		}
		if($row["summary"] != ""){
			$title .= "飯糰 ";
			$count++;
		}
		if($row["crossText"] != ""){
			$title .= "十架";
			$count++;
		}
		switch ($count) {
			case 0:
				$title = "Waring";
				$titleColor ="#DD4B1E";
				break;
			case 1:				
				$titleColor ="#DD4B1E";
				break;
			case 2:
				$titleColor ="#f39c12";
				break;
			case 3:
				$titleColor ="#00c0ef";
				break;
			case 4:
				$title = "優秀!菁英";
				$titleColor ="#00a65a";
				break;
		}
		
		$data = array(
			"id" => $row["worship_id"],
			"title" => $title,
			"start" => $row["date"],
			"worshipSong" => $row["worshipSong"],
			"bibleScope" => $row["bibleScope"],
			"summary" => $row["summary"],
			"crossText" =>$row["crossText"],
			"allday" => true,
			"backgroundColor" => $titleColor, //red
            "borderColor" => $titleColor //red
			);
		array_push($arr, $data);
	}
	
	$con = null;
		
	echo json_encode($arr);

?>