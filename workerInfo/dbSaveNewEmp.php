<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

if(!isset($_POST['nm2']) || !isset($_POST['pw'])){
	echo '<script>alert("Please Enter the Name and Password..");history.back();</script>';
	exit;
}

$flag     = $_POST['flag'];
$newName  = $_POST['nm2'];
$newPhone = $_POST['phn'];
$newId    = $_POST['id'];
$newLevel = $_POST['lvl'];
$newPw    = $_POST['pw'];

if($newId==''){
	$sql = "select LPAD(CONVERT(max(EmpID), UNSIGNED INTEGER)+1, 4, '0') AS newId from tblEmp;";
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	$row = mysqli_fetch_array($result);     
	$rowcnt = $row['newId']; 
	
}

$sql = "select count(*) as cnt from tblEmp where EmpID ='$newId' and status='1'";
$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     
$rowcnt = $row['cnt']; 

if($flag=='U'){
	if($rowcnt==0){
		echo '<script>alert("This is incorrect ID..");history.back();</script>';
		exit;
	}
	else if($EmpPw!=$newPw){		
		echo '<script>alert("The Password is not correct..");history.back();</script>';
		exit;
	}
	//Update New Emp
	$sql = "Update tblEmp 
			set Name = '$newName'
			  , EmpPw = '$newPw'
			  , PhoneNo = '$newPhone'
			  , Level = '$newLevel'
			where EmpID ='$newId';";	
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
}
else{
	if($rowcnt==1){
		echo '<script>alert("This is active ID..");history.back();</script>';
		exit;
	}
	
	$sql = "insert into tblEmp (Name, EmpID, EmpPw, PhoneNo, Level, Status, etc) 
	        values('$newName', '$newId', '$newPw', '$newPhone', '$newLevel', '1', '')";          
	
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));

}


if($result==1){ 	
session_start();
session_destroy();

echo '<script>alert("It will be logout with session destroy.."); top.location.replace("../login.php");;</script>';

}
?>
<meta http-equiv='refresh' content='0;url=vwWorkerInfo.php'>