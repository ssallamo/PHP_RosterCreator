<?php
include('../resource/config.php');
//From session

$SearchEmpId = str_pad(intval($_GET['upEmpID']),"4","0",STR_PAD_LEFT);
$SearchEmpNm = $_GET['upEmpName'];

$sql=" Select Name, EmpID, EmpPw, PhoneNo
		, Level 
		, case when Status ='1' then 'On' else 'Off' end as Status 
		, case when Status ='1' then ' ' else Expired End as Expired
		, substring(Startdt, 1,4) as SrtYear
		, substring(Startdt, 5,2) as SrtMonth
		, substring(Startdt, 7,2) as StDay
		, case when Expired='20991231' then ' ' else substring(Expired, 1,4) end as ExpYear
		, case when Expired='20991231' then ' ' else substring(Expired, 5,2) end as ExpMonth
		, case when Expired='20991231' then ' ' else substring(Expired, 7,2) end as ExpDay
		, Status                  as OnOff
		, Startdt
		, Expired
		from tblEmp WHERE EmpID='$SearchEmpId'";

//echo $sql;

$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)){
	$t_Name     =$row[0];
	$t_EmpID    =$row[1];
	$t_EmpPw    =$row[2];
	$t_PhoneNo  =$row[3];
	$t_Level    =$row[4];
	$t_Status   =$row[5];
	$t_Expired  =$row[6];
	
	$t_SrtYear  =$row[7];
	$t_SrtMonth =$row[8];
	$t_StDay    =$row[9];
	$t_ExpYear  =$row[10];
	$t_ExpMonth =$row[11];
	$t_ExpDay   =$row[12];
	$t_OnOff    =$row[13];
	$t_Startdt  =$row[14];
	$t_Expired  =$row[15];
}

?>