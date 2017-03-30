<?php
include('../resource/config.php');

//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level'];  

$Day = intval($_GET['Day']);
$Seq = intval($_GET['Seq']);
$Stf = str_pad(intval($_GET['Stf']),"4","0",STR_PAD_LEFT);//Fill '0'
$Fnt = intval($_GET['Fnt']);
$ModifyWeeklyKey = intval($_GET['ModifyWeeklyKey']);

//Modify mode or New Create mode
$sql = " select EmpID, Name from tblEmp where Status='1' and EmpID not in('0000');";
/*
if($ModifyWeeklyKey==''){	
	$sql = " select EmpID, (select Name from tblEmp where EmpID = A.EmpID) as Name
			 from tblEmpWorkingDay A
			 where DayNo ='".$Day."'
			 and (FromTime<='".$Stf."' and ToTime>='".$Fnt."')";
}
else{
	$sql = " select EmpID, Name from tblEmp where Status='1' and EmpID not in('0000');";
}

*/
$resultEmp = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
//display
echo "<select class='form-control' style='margin-top:5px;width:126px;' name='wk".$Day.$Seq."nmOpt'><option>--</option>";
while($row = mysqli_fetch_array($resultEmp)) {
	echo "<option value='".$row['EmpID']."'>".$row['Name']."</option>";
}
echo "</select>";  
	
?>