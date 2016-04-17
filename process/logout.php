<?php
session_start();
/*
echo $_SESSION["uid"];
echo $_SESSION["email"];
echo $_SESSION["name"];
*/
session_destroy();
//unset($_SESSION["uid"]);
//unset($_SESSION["email"]);
//unset($_SESSION["name"]);

header("Location: ../Login/index.html");
?>