<?php
include('../resource/config.php');

//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];
 
$page     = isset($_GET['page']) ? $_GET['page'] : 1;
$searchKey = isset($_GET['searchKey'])? $_GET['searchKey'] : '';

//set page variables

if($page=='') $page=1;
$list_num=14;
$page_num=10;
$offset = $list_num*($page-1);

//search Date
if($searchKey=='') $search = '';
else  $search = "and title like '%".$searchKey."%'";

//get total row count
$sqlCount = "select count(*) as cnt
			 from tblNewFreeboard 
			 where DeleteFg='N'
			 $search;";		

$result = mysqli_query($connect,$sqlCount)or die("Error: ".mysqli_error($connect));	 
$row = mysqli_fetch_array($result);
$total_no = $row[0];

//get total page number and current article number
$total_page=ceil($total_no/$list_num);
$cur_num=$total_no - $list_num*($page-1);

//query
$dataList = array();
$sql=   "SELECT A.Seq
		, (Select CodeName from tblCode where Category='009' and Code = A.Category) as Category
		, A.Title
		, (Select Name from tblEmp where EmpId = A.Writer ) as Writer
	    , DATE_FORMAT(A.WritedDt,'%d %b %y') as WritedDt
	    , DATE_FORMAT(A.ModifiedDt,'%d %b %y') as ModifiedDt
		, A.Views
		, A.CommentCnt
		FROM tblNewFreeboard A
		WHERE DeleteFg='N'
		$search		
		order by A.Seq desc limit $offset, $list_num;";
		
$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));

$arrLength =0;
for($i=0; $row = mysqli_fetch_array($result); $i++) {	
	$dataList[$i][0] = $row['Seq'];
	$dataList[$i][1] = $row['Category'];
	$dataList[$i][2] = $row['Title'];
	$dataList[$i][3] = $row['Writer'];
	$dataList[$i][4] = $row['WritedDt'];
	$dataList[$i][5] = $row['ModifiedDt'];
	$dataList[$i][6] = $row['Views'];
	$dataList[$i][7] = $row['CommentCnt'];
	$arrLength = ($i+1);
}
?>