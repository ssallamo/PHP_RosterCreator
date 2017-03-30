<?php
session_start();
//DB Connection
/*
$mysql_hostname = "fdb3.biz.nf";
$mysql_user = "2157116_test";
$mysql_password = "test_2157116";
$mysql_database = "2157116_test";
*/
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "admin";
$mysql_database = "rostertest";
$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);  

if(mysqli_connect_error($connect)){
	die(mysql_error());
}
else{
}
?>