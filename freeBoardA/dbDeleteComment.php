<?php
include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level']; 

	
$Seq      = $_POST['Seq'];
$CmntSeq  = $_POST['tCmntSeq'];
$CmntPw   = $_POST['tCmntPw'];

echo $Seq     ;echo '<br/>';
echo $CmntSeq  ;echo '<br/>';
echo $CmntPw  ;echo '<br/>';


$sql = "select count(*) as cnt from tblComment where Seq='$Seq' and CmtSeq='$CmntSeq' and DeleteFg='N';";

//echo $sql;

$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     
$rowcnt = $row['cnt']; 

if($rowcnt!=1){
	echo '<script>alert("The Comment key value is something wrong!");history.back();</script>';
	exit;
}


$sql = "select count(*) as cnt from tblComment where Seq='$Seq' and CmtSeq='$CmntSeq' and DeleteFg='N' and WriterPw='$CmntPw' ;";

//echo $sql;

$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$row = mysqli_fetch_array($result);     
$rowcnt = $row['cnt']; 

if($rowcnt!=1){
	echo '<script>alert("The Comment Password is wrong!");history.back();</script>';
	exit;
}
	$sql =" Update tblComment
		    Set  DeleteFg = 'D'
		    Where Seq     = '$Seq'
		    and   CmtSeq  = '$CmntSeq' 
		    and   DeleteFg= 'N';";
	
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	$sql =" Update tblNewFreeboard
		    Set  CommentCnt = CommentCnt-1
		    Where Seq = '$Seq';";
		    
	$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
	
	if($result==1){ 		
		echo '<script>alert("Commnet Removed sucessfully!");</script>';		
	}	
	
?>
<meta http-equiv='refresh' content='0;url=vwPostDetail.php?Flg=U&Seq=<?php echo $Seq?>'>