<?php

$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];


$Seq = (isset($_GET['Seq']))? $_GET['Seq'] :'';
$Flg = ((isset($_GET['Flg'])? $_GET['Flg'] :'I')=='U')?'U':'I';

if($Flg=='I'){
	$Seq     = '';
	$Title   = '';
	$CategCd = '01';
	$Content = '';

}
else{
	$sql = " SELECT A.Seq
			, (Select CodeName from tblCode where Category='009' and Code = A.Category) as Category
			, A.Title
			, A.Writer as WriterId
			, (Select Name from tblEmp where EmpId = A.Writer ) as WriterNm
			, A.Content
			, A.WritedDt
			, A.ModifiedDt
			, A.Views
			, A.CommentCnt
			, A.Category
			FROM tblNewFreeboard A
			Where A.Seq = '$Seq' ;";
	
	$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	while($row = mysqli_fetch_array($result)){	
		$Seq         =$row[0];
		$Category    =$row[1];
		$Title       =$row[2];
		$WriterId    =$row[3];
		$WriterNm 	 =$row[4];
		$Content 	 =$row[5];
		$WritedDt 	 =$row[6];
		$ModifiedDt  =$row[7];
		$Views 	     =$row[8];
		$CommentCnt  =$row[9];
		$CategCd     =$row[10];
	}
	
	
	$dataList  = array();
	$arrLength = 0;
	$sql = "Select A.CmtSeq, A.Seq, A.Writer as CmnterId 
			    , (Select Name from tblEmp where EmpId = A.Writer ) as CmnterNm
			    , A.WriterPw as CmnterPw
			    , A.Comment
			    , A.CmtDt
			From tblComment A
			Where A.Seq = '$Seq'
			And   A.DeleteFg='N';";
			
	
	$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	for($i=0; $row = mysqli_fetch_array($result) ; $i++){
		$dataList[$i][0] = $row['CmtSeq'];	
		$dataList[$i][1] = $row['Seq'];	
		$dataList[$i][2] = $row['CmnterId'];	
		$dataList[$i][3] = $row['CmnterNm'];	
		$dataList[$i][4] = $row['CmnterPw'];	
		$dataList[$i][5] = $row['Comment'];	
		$dataList[$i][6] = $row['CmtDt'];	
		$arrLength = ($i+1);
	}		
    
}

?>