<?php
include('../resource/config.php');

$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];

$searchKey = (isset($_GET['searchKey']))?$_GET['searchKey']:'';
$searchStat = (isset($_GET['searchStat']))?$_GET['searchStat']:'1';

$paraStart = '20000101';
$paraEnd   = '20991231';

if($searchStat=='1'||$searchStat=='0'){

	//select persional working availbled day
	$sql = " SELECT '' as No, Name,EmpId, EmpPw, PhoneNo, 
			(SELECT A.CodeName from tblCode A where A.Category='001' and A.Code = Level) as Level
 	   		, case when Status ='1' then 'On' else 'Off' end as Status
			, case when Expired='20991231' then '' else DATE_FORMAT(Expired, '%d/%m/%Y') end as Expired, Status as OnOff						
			from tblEmp 
			where Status = $searchStat 
			and Level >='C'
			and (Name like '%$searchKey%' OR EmpId like '%$searchKey%')
			order by 1";
	
}
else{
	$sql = " SELECT '' as No, Name,EmpId, EmpPw, PhoneNo, 
			(SELECT A.CodeName from tblCode A where A.Category='001' and A.Code = Level) as Level
 	   		, case when Status ='1' then 'On' else 'Off' end as Status
			, DATE_FORMAT(Expired, '%d/%m/%Y')as Expired, Status as OnOff						
			from tblEmp 
			where Status >= '0'
			and Level >='C'
			and (Name like '%$searchKey%' OR EmpId like '%$searchKey%')
			order by 1";
}
	
	$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	$empInfo = array();
	$arrLength =0;
	
if (mysqli_num_rows($result) > 0) {
    // output data of each row
	for($i = 0; $row = mysqli_fetch_array($result); $i++) {	
		$empInfo[$i][0] = ($arrLength+1);
		$empInfo[$i][1] = $row['Name'];
		$empInfo[$i][2] = $row['EmpId'];
		$empInfo[$i][3] = $row['EmpPw'];
		$empInfo[$i][4] = $row['PhoneNo'];	
		$empInfo[$i][5] = $row['Level'];
		$empInfo[$i][6] = $row['Status'];
		$empInfo[$i][7] = $row['Expired'];
		$empInfo[$i][8] = $row['OnOff'];		
		$arrLength++;	
	}
}

/*
//as authority level display employee name list
$sqlSelector = "select EmpID, Name from tblEmp where EmpID='$EmpID'
				union all
				select EmpID, Name from tblEmp where Level >'$Level'";  
$resultSelct = mysqli_query($connect,$sqlSelector)or die("Error: ".mysqli_error($connect));				

$strOpt="";
if (mysqli_num_rows($resultSelct) > 0) {
	for($j = 0; $row = mysqli_fetch_array($resultSelct); $j++) {
		$slctd = ($row[EmpID] == $EmpID)? "selected='selected'":"";
		$strOpt .= "<option value='{$row[EmpID]}'{$slctd}>{$row[Name]}</option>/n";
	}
}
*/
mysqli_close($connect);

?>