<?php
include ("dbconf.php");

try{
	$sql = "SELECT * FROM `practicelist` where 1";
	$sth = $con->prepare($sql);
	$sth->execute();
	$result = $sth->fetchAll();
	$arr = array();
	$i = 0;
	foreach ($result as $row) {
		$arr[$i] = new practiceList($row["practicelist_id"],urlencode($row["practicelist_name"]),urlencode($row["merge_sheet"]));
		$arr[$i]->getsongName();
		/*
		$data = array(
			"album_id" => $row["album_id"],
			"album_name" => urlencode($row["album_name"])
			);
		array_push($arr, $data);
		*/
		$i++;
	}

}catch(Exception $ex){
	$message = $ex->getmessage();
	echo $message;
}

echo urldecode(json_encode($arr));


$con = null;

/**
* 存放練習清單的物件
*/
class practiceList
{
	public $p_id = 0;
	public $p_name = "";
	public $p_sheet = "";
	public $p_songlist = array();
	function __construct($id,$name,$sheet)
	{
		$this->p_id = $id;
		$this->p_name = $name;
		$this->p_sheet = $sheet;
	}

	public function getsongName(){
		include ("dbconf.php");
		//$this->p_songlist = array("1","2","3");
		try{
			$sql = "SELECT `song`.`song_chname` 
					FROM `song`,`mergesong` 
					where `mergesong`.`practicelistId` = :pid
					AND  `song`.`song_id` = `mergesong`.`songId`";
			$sth = $con->prepare($sql);
			$sth->bindParam(":pid",$this->p_id);
			$sth->execute();
			$result = $sth->fetchAll();
			$i =0;
			foreach ($result as $row) {
				$this->p_songlist[$i] = urlencode($row["song_chname"]);
				$i++;
			}
		}catch(Exception $ex){
			$message = $ex->getmessage();
			echo $message;
		}

		$con = null;
	}
}


?>