<?php
include '../resource/config.php';

if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
include '../db/dbFunctions.php';

$Name   = $_SESSION['Name'];   

$record = $_GET['record'];

if(empty($_POST['category']) || empty($_POST['amount']) || empty($_POST['branch'])){
	if(empty($_POST['category'])) {
		echo "<script>alert('You have to select the category');history.back();</script>";
	} else if(empty($_POST['branch'])) {
		echo "<script>alert('You have to write branch');history.back();</script>";
	} else if(empty($_POST['amount'])) {
		echo "<script>alert('You have to write amount');history.back();</script>";
	}
	exit;
} else {
	$category = $_POST['category'];
	$amount = $_POST['amount'];
	$branch = $_POST['branch'];
	$representative = $_POST['representative'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$status = $_POST['status'];
	$detail = $_POST['detail'];
}
/*
echo $record."<br>";
echo $category."<br>";
echo $amount."<br>";
echo $branch."<br>";
echo $representative."<br>";
echo $date."<br>";
echo $month."<br>";
echo $year."<br>";
echo $status."<br>";
echo $detail."<br>";
*/
if($record=="Loan") {
	$amountType = "l_amount";
} else if($record=="Borrow") {
	$amountType = "b_amount";
}



if($record == "Loan") {
	$rt = fnInsertLoanData();
}else if($record == "Borrow") {
	$rt =fnInsertBorrowData();
}
?>
<meta http-equiv='refresh' content='0;url=vwTradingRecord.php?flag=0'>