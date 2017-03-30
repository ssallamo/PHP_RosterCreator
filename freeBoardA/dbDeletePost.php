<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

$Seq      = $_POST['Seq'];
/*
echo $Flg     ;echo '<br/>';
echo $Seq     ;echo '<br/>';
echo $writerId;echo '<br/>';
echo $upTitle ;echo '<br/>';
echo $upCate  ;echo '<br/>';
echo $upWriter;echo '<br/>';
echo $upMsg   ;echo '<br/>';
*/

$sql = "select count(*) as cnt from tblNewFreeboard where Seq='$Seq' and DeleteFg='N';";

//echo $sql;

$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     
$rowcnt = $row['cnt']; 

if($rowcnt!=1){
	echo '<script>alert("The Post is already removed or something wrong!");history.back();</script>';
	exit;
}

	$sql =" Update tblNewFreeboard
		    Set  ModifiedDt = Now()
		       , DeleteFg = 'D'
		    Where Seq = '$Seq';";
		    
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
		
	if($result==1){ 		
		echo '<script>alert("Deleted sucessfully!");</script>';		
	}
/*
if($Flg=='I'){
	
	$sql = "insert into tblNewFreeboard 
	        (Category, Title, Writer, Content, WritedDt,  Views, CommentCnt, DeleteFg)
			values('$upCate', '$upTitle', '$writerId', '$upMsg', now(), 0, 0, 'N');";

	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));

}
else if($Flg=='U'){
	
	$sql =" Update tblNewFreeboard
		    Set  Category = '$upCate'
		       , Title = '$upTitle'
		       , Content ='$upMsg'
		       , ModifiedDt = Now()
		       , Views = 0
		    Where Seq = '$Seq';";
		    
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
		
	if($result==1){ 		
		echo '<script>alert("Updated sucessfully!");</script>';		
	}
}
else{
	
//Delete
//
}

*/
?>
<meta http-equiv='refresh' content='0;url=vwFreeboardList.php'>