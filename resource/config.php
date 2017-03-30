<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
//DB Connection
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "admin1234";
$mysql_database = "rostertest";

$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);  

if(mysqli_connect_error($connect)){
	die(mysql_error());
}
else{
}
?>