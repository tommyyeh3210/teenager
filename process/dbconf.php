<?php
$dsn = "mysql:host=localhost;dbname=mydb;charset=utf8";
$con = new PDO($dsn, "root", "");
$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>