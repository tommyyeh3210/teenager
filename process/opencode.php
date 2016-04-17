<?php
	include ("dbconf.php");
	$code = $_GET["opencode"];
	try{
		$sql = "UPDATE member SET complete_authentication = '1' WHERE authentication_code = :code";
		$sth = $con->prepare($sql);	
		$sth->bindParam(':code',$code);	
		$sth->execute();
	}catch(Exception $ex){
		$message = $ex->getmessage();
	}
	
	echo "<script>var r = confirm('帳戶啟動成功');
            if(r == true){
              location.href='../Login/index.html';
            }else{
              location.href='../Login/index.html';
            }
          </script>";
?>