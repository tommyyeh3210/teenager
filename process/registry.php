<?php
include ("dbconf.php");

$name = $_POST["r_username"];
$email = $_POST["r_email"];
$pwd = $_POST["r_password"];

try{
	$randNum = getrandnum(); //取得亂數認證碼
	$sql = "INSERT INTO member (`name`, `email`, `password`,`authentication_code`) VALUES (:name, :email, :pwd, :authentication_code)";
	$sth = $con->prepare($sql);
	$sth->bindParam(':name',$name);
	$sth->bindParam(':email',$email);
	$sth->bindParam(':pwd',$pwd);
	$sth->bindParam(':authentication_code',$randNum);
	$sth->execute();
	sendMail($name,$email,$randNum);
}catch(Exception $ex){
	$message = $ex->getMessage();
}
	

	
function sendMail($name,$email,$randNum){
	include_once "../PHPMailer/class.phpmailer.php";
	include_once "../PHPMailer/class.smtp.php";

	$mail= new PHPMailer(); //建立新物件      
	//$mail->SMTPDebug = 1;
	$mail->IsSMTP(); //設定使用SMTP方式寄信   
	$mail->SMTPAuth = true; //設定SMTP需要驗證        
	$mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機        
	$mail->CharSet = "utf-8"; //設定郵件編碼       
	$mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線   
	$mail->Port = 465;  //Gamil的SMTP主機的SMTP埠位為465埠。        
	//$mail->SMTPSecure = "tls"; // Gmail的SMTP主機需要使用TLS連線   
	//$mail->Port = 587;  //Gamil的SMTP主機的SMTP埠位為587埠。        
	
	$mail->Username = 'onetwobaby@gmail.com'; //設定驗證帳號        
	$mail->Password = "ji3cp3cl3"; //設定驗證密碼        
	$mail->From = $mail->Username;
	$mail->FromName = "website test"; //設定寄件者姓名    
	$mail->Subject = "內湖思恩堂網站驗證信";
	$body = "Dear:  ".$name."\r\n"."請點擊以下網址來啟動帳戶\r\n"."http://localhost/teenager/process/opencode.php?opencode=".$randNum;
	$mail->Body = nl2br($body);
	$mail->IsHTML(true); //設定郵件內容為HTML        
	$mail->AddAddress($email);
	//$mail->AddAddress("geego.test@gmail.com", "Geego"); //設定收件者郵件及名稱 
	//$mail->AddCC('@gmail.com', "Geego"); //設定收件者郵件及名稱 
	//$mail->AddCC('geego.test@gmail.com', "Geego"); //設定收件者郵件及名稱 
	//$mail->AddBCC('geego.test@gmail.com', "Geego"); //設定收件者郵件及名稱 

	if(!($mail->Send()))
	{
	    echo $mail->ErrorInfo;
	} else {
		echo "郵件寄送Success";
	}

	//header("Location: email.php");
	//echo count($result)."新增成功";	
}


/*$sql = "SELECT * FROM member WHERE name=:name AND email=:email AND password=:pwd";
$sth = $con->prepare($sql);
$sth->bindParam(':name',$name);
$sth->bindParam(':email',$email);
$sth->bindParam(':pwd',$pwd);
$sth->execute();*/

$con = null; //要記得關閉資料庫

function getrandnum()
{
	$code = microtime(true)*10000; /* 取得毫秒*/
	$code = sprintf("%d",$code);
	return $code;
}
?>