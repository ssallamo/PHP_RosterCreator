<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 


$Seq      = $_POST['Seq'];
$upCmnt   = $_POST['upCmnt'];
$upCmntPw = $_POST['upCmntPw'];

echo $Seq     ;echo '<br/>';
echo $upCmnt  ;echo '<br/>';
echo $upCmntPw  ;echo '<br/>';

$sql = "select count(*) as cnt from tblNewFreeboard where Seq='$Seq' and DeleteFg='N';";

echo $sql;

$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     
$rowcnt = $row['cnt']; 

if($rowcnt!=1){
	echo '<script>alert("Main Post is wrong!");history.back();</script>';
	exit;
}
	$sql =" Insert into tblComment 
		( Seq, Writer, WriterPw, Comment, CmtDt, DeleteFg)
		Values
		( '$Seq', '$EmpID', '$upCmntPw', '$upCmnt', Now(), 'N');";

	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	$sql =" Update tblNewFreeboard
		    Set  CommentCnt = CommentCnt+1
		    Where Seq = '$Seq';";
		    
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	if($result==1){ 		
		echo '<script>alert("Commnet Added sucessfully!");</script>';		
	}	

?>
<meta http-equiv='refresh' content='0;url=vwPostDetail.php?Flg=U&Seq=<?php echo $Seq?>'>