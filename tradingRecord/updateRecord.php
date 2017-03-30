<?php
include '../resource/config.php';
include '../db/dbFunctions.php';

$record = $_GET['record'];

if(empty($_POST['category']) || empty($_POST['amount']) || empty($_POST['branch'])){
	if(empty($_POST['category'])) {
		echo "<script>alert('You have to select the category');history.back();</script>";
	} else if(empty($_POST['branch'])) {
		echo "<script>alert('You have to write branch');history.back();</script>";
	} else if(empty($_POST['amount'])) {
		echo "<script>alert('You have to write amount');history.back();</script>";
	} else if(empty($_POST['rtamount'])) {
		echo "<Script>alert('You have to wrtie Returned amount');history.back();</script>";
	}
	exit;
} else {
	$category = $_POST['category'];
	$amount = $_POST['amount'];
	$rtamount = $_POST['rtamount'];
	$branch = $_POST['branch'];
	$representative = $_POST['representative'];
	$date = $_POST['date'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$status = $_POST['status'];
	$detail = $_POST['detail'];
	$number = $_POST['number'];
}

/*echo $record."<br>";
echo $category."<br>";
echo $amount."<br>";
echo $rtamount."<br>";
echo $branch."<br>";
echo $representative."<br>";
echo $rtdate."<br>";
echo $rtmonth."<br>";
echo $rtyear."<br>";
echo $status."<br>";
echo $detail."<br>";
echo $number;*/

if($record=="Loan") {
	$amountType = "l_amount";
	fnUpdateLoanData();
} else if($record=="Borrow") {
	$amountType = "b_amount";
	fnUpdateBorrowData();
}
?>
<meta http-equiv='refresh' content='0;url=vwTradingRecord.php?flag=0'>