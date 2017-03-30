<?php
include('../resource/config.php');

//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];
 
//$page  = $_GET['page'];
//$searchWk = $_GET['searchWk'];

//set page variables
$page = isset($_GET['page']) ? $_GET['page']: 1;
//if($page=='') $page=1;
$list_num=8;
$page_num=10;
$offset = $list_num*($page-1);
 
//search Date
$oriDt = isset($_GET['oriDt']) ? $_GET['oriDt'] : '';
$searchWk = isset($_GET['searchWk']) ? $_GET['searchWk'] : '';

if($searchWk=='') $between = '';
else  $between = 'where '.$searchWk.' between PlanStartDt and PlanEndDt';

//get total row count
$sqlCount = "select count(*) as cnt
			 from tblWeeklyRoster $between
			 order by Seq desc;";		
$result = mysqli_query($connect,$sqlCount)or die("Error: ".mysqli_error($connect));	 
$row = mysqli_fetch_array($result);
$total_no = $row[0];

//get total page number and current article number
$total_page=ceil($total_no/$list_num);
$cur_num=$total_no - $list_num*($page-1);

//query
$dataList = array();
$sql=   "SELECT A.Seq as Seq
		, concat(DATE_FORMAT(A.PlanStartDt, '%d/%m/%Y'), ' ~ ', DATE_FORMAT(A.PlanEndDt, '%d/%m/%Y')) as Period
		, (select Name from tblEmp where EmpID = A.WriterEmpID) as WrtNm
		, ifnull((select Name from tblEmp where EmpID = A.ModifierEmpID),'') as MdfNm
		, A.WeeklyKey
		from tblWeeklyRoster A $between
		order by Seq desc limit $offset, $list_num;";
		
$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));

$arrLength =0;
for($i=0; $row = mysqli_fetch_array($result); $i++) {	
	$dataList[$i][0] = $row['Seq'];
	$dataList[$i][1] = $row['Period'];
	$dataList[$i][2] = $row['WrtNm'];
	$dataList[$i][3] = $row['MdfNm'];
	$dataList[$i][4] = $row['WeeklyKey'];
	$arrLength = ($i+1);
}

?>