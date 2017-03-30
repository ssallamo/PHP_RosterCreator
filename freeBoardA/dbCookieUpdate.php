<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

$Seq = (isset($_GET['Seq']))? $_GET['Seq'] :'';

if(!empty($Seq) && empty($_COOKIE['FreeBulliten' . $Seq])){
	
	$sql =" Update tblNewFreeboard
		    Set  Views = Views+1
		    Where Seq = '$Seq';";
		    
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	if(empty($result)){	
		echo '<script>alert("Can not update views count!");</script>';		
	}
	else{
		setcookie('FreeBulliten' . $Seq, TRUE, time() + (60 * 60 * 24), '/');
	}
}

?>