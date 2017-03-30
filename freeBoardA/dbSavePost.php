<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 


$Flg      = $_POST['Flg'];
$Seq      = $_POST['Seq'];
$writerId = $_POST['writerId'];
$upTitle  = $_POST['upTitle'];
$upCate   = $_POST['upCate'];
$upWriter = $_POST['upWriter'];
$upMsg    = $_POST['upMsg'];
/*
echo $Flg     ;echo '<br/>';
echo $Seq     ;echo '<br/>';
echo $writerId;echo '<br/>';
echo $upTitle ;echo '<br/>';
echo $upCate  ;echo '<br/>';
echo $upWriter;echo '<br/>';
echo $upMsg   ;echo '<br/>';
*/

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

?>
<meta http-equiv='refresh' content='0;url=vwFreeboardList.php'>