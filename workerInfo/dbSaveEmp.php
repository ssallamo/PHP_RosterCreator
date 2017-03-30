<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 
/*
if(!isset($_POST['t_upNm']) ||!isset($_POST['upId']) || !isset($_POST['upPw'])){
	echo '<script>alert("Please Enter the Name, ID and Password..");history.back();</script>';
	exit;
}
*/
$flag       = $_POST['flag'];
$o_upNm     = $_POST['upNm'];
$n_upNm     = $_POST['upNm'];
$upId       = $_POST['upId'];
$upPw       = $_POST['upPw'];
$n_upPhn    = $_POST['upPhn'];
$n_upLvl    = $_POST['upLvl'];
$o_upStat   = $_POST['o_upStat'];
$n_upStat   = $_POST['t_upStat'];
$o_upStYmd  = $_POST['o_upStYmd' ];
$n_upStYmd  = $_POST['t_upStYmd' ];
$o_upExpYmd = $_POST['o_upExpYmd'];
$n_upExpYmd = $_POST['t_upExpYmd'];
if($n_upExpYmd=="") $n_upExpYmd='20991231';

if($n_upNm==''){
	echo '<script>alert("Please Enter The Employee Name..");history.back();</script>';
	exit;
}
if($upId==''){
	$sql = "select LPAD(CONVERT(max(EmpID), UNSIGNED INTEGER)+1, 4, '0') AS newId from tblEmp;";
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	$row = mysqli_fetch_array($result);     
	$upId = $row['newId']; 
}

if($flag=='U'){
	
	$sql = "select count(*) as cnt from tblEmp 
			where EmpID  ='$upId' 
			and   Name   ='$o_upNm' 
			and   Status ='$o_upStat' 
			and   Expired='$o_upExpYmd'
			and   StartDt='$o_upStYmd'";
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	$row = mysqli_fetch_array($result);     
	$rowcnt = $row['cnt']; 

	if($rowcnt==0){
		echo '<script>alert("This is incorrect ID..");history.back();</script>';
		exit;
	}
	else if($rowcnt>1){		
		echo '<script>alert("Data is something wrong..");history.back();</script>';
		exit;
	}
	//Update New Emp
	$sql = "Update tblEmp 
			set Name    = '$n_upNm'
			  , EmpPw   = '$upPw'
			  , PhoneNo = '$n_upPhn'
			  , Level   = '$n_upLvl'
			  , Status  = '$n_upStat'
			  , StartDt = '$n_upStYmd'
			  , Expired = '$n_upExpYmd'
			where EmpID  ='$upId' 
			and   Name   ='$o_upNm' 
			and   Status ='$o_upStat' 
			and   Expired='$o_upExpYmd'
			and   StartDt='$o_upStYmd'";	
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
		
	if($result==1){ 		
		echo '<script>alert("Updated sucessfully!");</script>';		
		if($EmpID==$upId){//when self modify		
			session_start();		
			echo '<script>alert("It will be logout with session destroy.."); top.location.replace("../login.php");;</script>';
			session_destroy();
		}		
	}
	
}
//New register
else{
	
	$sql = "select count(*) as cnt from tblEmp 
			where EmpID    ='$upId' 
			and   Status   ='1'";
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	$row = mysqli_fetch_array($result);     
	$rowcnt = $row['cnt']; 
	
	if($rowcnt==1){
		echo '<script>alert("This is active ID..");history.back();</script>';
		exit;
	}
	
	$sql = "insert into tblEmp (Name, EmpID, EmpPw, PhoneNo, Level, Status, etc, Expired, StartDt) 
	        values('$n_upNm', '$upId', '$upPw', '$n_upPhn', '$n_upLvl', '1', '', '$n_upExpYmd', '$n_upStYmd')";          
	
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	if($result==1){ 
		echo '<script>alert("Saved sucessfully!");</script>';
	}
	else{
		echo '<script>alert("There is something wrong!..");history.back();</script>';
	}
}

?>
<meta http-equiv='refresh' content='0;url=vwWorkerInfo.php'>
