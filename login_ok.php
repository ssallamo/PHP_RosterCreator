<?php
include('./resource/config.php');
//ID/Password exist Checking

//if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

//Select Query and extract from query
$sql="SELECT EmpID, EmpPw, Name, PhoneNo, Level FROM tblEmp WHERE EmpID='$user_id' and EmpPw='$user_pw'";
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)){
	$EmpID   =$row[0];
	$EmpPw   =$row[1];
	$Name    =$row[2];
	$PhoneNo =$row[3];
	$Level   =$row[4];
}

//comparing value 
if(!isset($EmpID)) {
    echo "<script>alert('ID or Password was wrong!');history.back();</script>";
    exit;
}
if($EmpPw != $user_pw) {
    echo "<script>alert('ID or Password was wrong!');history.back();</script>";
    exit;
}

//session_start() and assign value
$_SESSION['EmpID']  = $EmpID;
$_SESSION['EmpPw']  = $EmpPw;
$_SESSION['Name']   = $Name;
$_SESSION['PhoneNo']= $PhoneNo;
$_SESSION['Level']  = $Level;

?>
<meta http-equiv='refresh' content='0;url=vwFrontMenu.php'>