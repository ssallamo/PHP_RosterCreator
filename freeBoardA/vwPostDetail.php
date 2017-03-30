<?php
include('../resource/config.php');
include('dbCookieUpdate.php');
include('dbSelectAPost.php');

if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML  4.0 Transitional//EN">
<html lang="en" style="height:100%">
<head>
	<title>View Post</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="./../css/freeboard.css">	
    <script src="../js/workerInfo.js"></script> 
	<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">  	
</head>
<body onload="fnHideDom();">
	
	<form name='postDetail'>
	<div class="container-fluid">	
	<h3>Free Bulletin Board</h3>			
	<hr class="div_line">
	<input type="hidden" id='SessionId' name='SessionId' value='<?php echo $EmpID ?>' />
	<input type="hidden" id='Flg' name='Flg' value='U' />
	<input type="hidden" id='Seq' name='Seq' value='<?php echo $Seq ?>' />	
	<input type="hidden" id='WriterId' name='WriterId' value='<?php echo $WriterId ?>' />	
	<input type="hidden" id='CommentCnt' name='CommentCnt' value='<?php echo $CommentCnt ?>' />	
	
	<div class="row">
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">
			<div class="col-sm-2" > <h4>Title</h4> </div>
			<div class="col-sm-10"> 
				<input type="text" class="inputFrm" id="Title" name="Title" style="width:100%;background-color:#e3f7f1;" value="<?php echo $Title ?>" readOnly>
			</div>
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">			
			<div class="col-sm-2" > <h4>Category</h4> </div>
			<div class="col-sm-10"> 				
				<input type="text" class="inputFrm" id="Categ" name="Categ" style="width:100%;background-color:#e3f7f1;" value="<?php echo $Category ?>" readOnly>
			</div>			
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">			
			<div class="col-sm-2" > <h4>Writer</h4> </div>
			<div class="col-sm-4"> 
				<input type="text" class="inputFrm" id="Writer" name="Writer" style="width:100%;background-color:#e3f7f1;" value="<?php echo $WriterNm ?>" readOnly >
			</div>			
			<div class="col-sm-2" > <h4>Views</h4> </div>
			<div class="col-sm-4"> 
				<input type="text" class="inputFrm" id="ViewCnt" name="ViewCnt" style="width:100%;background-color:#e3f7f1;" value="<?php echo $Views ?>" readOnly >
			</div>	
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">			
			<div class="col-sm-2" > <h4>Post Date</h4> </div>
			<div class="col-sm-4"> 
				<input type="text" class="inputFrm" id="PostDt" name="PostDt" style="width:100%;background-color:#e3f7f1;" value="<?php echo $WritedDt ?>" readOnly >
			</div>			
			<div class="col-sm-2" > <h4>Modify Date</h4> </div>
			<div class="col-sm-4"> 
				<input type="text" class="inputFrm" id="ModDt" name="ModDt" style="width:100%;background-color:#e3f7f1;" value="<?php echo $ModifiedDt ?>" readOnly >
			</div>	
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">
			<div class="col-sm-2" > <h4>Message</h4> </div>
			<div class="col-sm-10"> 
				<textarea class="inputFrm" id="Msg" name="Msg" style="width:100%;background-color:#e3f7f1;" rows="10" readOnly><?php echo $Content ?></textarea>
			</div>
		</div>
		<div class="col-sm-12" id="btnSave" >
			<a href="vwNewFreeBulletin.php?Seq=<?php echo $Seq ?>&Flg=U"><button type="button" class="btn btn-warning">Modify</button></a>
			<button type="button" class="btn btn-danger" onClick="fnConfirm();">Delete</button>
		</div>
		
		<div class="col-sm-12"> &nbsp; </div>
	</div>
	</div> <!-- container class End -->	
	
	</form>
	
	
	<br>
	<form method="post" action="dbDeleteComment.php" id='displyCmnt' >
	<input type="hidden" id='Seq' name='Seq' value='<?php echo $Seq ?>' />
	<input type="hidden" id='arrLen' name='arrLen' value='<?php echo $arrLength ?>' />	
	<input type="hidden" id='tCmntSeq' name='tCmntSeq' value='' />	
	<input type="hidden" id='tCmntPw' name='tCmntPw' value='' />		
	<div class="container-fluid">
		<div class="row">
		<?php
			for($i=0; $i< $arrLength ; $i++){
		?>		    
		    <div class="row" id="cmntStyle">
				<div class="col-md-2"><?php echo $dataList[$i][3] ?></div>	
				<div class="col-md-6"><?php echo $dataList[$i][5] ?></div>	
				<div class="col-md-4"><?php echo $dataList[$i][6] ?>
					<span class="glyphicon glyphicon-remove" onClick="fnShowUpPw(<?php echo $i ?>);"></span>
					<div id='rmPwEdt<?php echo $i ?>'><input type="password" style="width:70px;" id='cmntRmPw<?php echo $i ?>' name='cmntRmPw<?php echo $i ?>' value='' />
						<span class="glyphicon glyphicon-ok" style="color:green;" onClick="fnRmCmntSbmt(<?php echo $i ?>, <?php echo $dataList[$i][0] ?> );"></span>
					</div>
				</div>	
			</div>
		
		<?php
			}
		?>		
		</div>    		
	</div>
	</form>
	
	<br>
	<form method="post" action="dbInsertComment.php" id='insertCmnt' >
	<input type="hidden" id='Seq' name='Seq' value='<?php echo $Seq ?>' />	
	<div class="container-fluid">
		<div class="row">					
			<div class="col-md-12"> &nbsp; </div>			
    		<div class="col-md-9"><textarea class="inputFrm" id="upCmnt" name="upCmnt" style="width:100%" rows="3"></textarea></div>
    		<div class="col-md-3">
		        <div class="row">
		            <div class="col-md-12">Name <input type="text" class="inputFrm" id="upCmnter" name="upCmnter" style="width:100px" value="<?php echo $Name ?>" readOnly ></div>
		            <div class="col-md-12">Password <input type="password" class="inputFrm" id="upCmntPw" name="upCmntPw" style="width:100px" > </div>
		        </div>
		    </div>	
		    <div class="col-md-12"  id="btnSave" "><button type="button" class="btn btn-info"  onClick="fnCommentSave()">Comment Save</button></div>    		
			<div class="col-md-12"> &nbsp; </div>	
		</div>
	</div>
	</form>
	
	
</body>


<script>	
function fnCommentSave(){
	
	if($('#upCmntPw').val()==''){alert("Enter your comment password."); return;}
	else if($('#upCmntPw').val()==''){alert("Comment is empty."); return;}
	
	if(confirm('Are you sure to add a comment?')){
		document.getElementById('insertCmnt').submit();
	}
	else return;
}

function fnShowUpPw(i){
	$('#rmPwEdt'+i).show();
}

function fnHideDom(){
	
	//hiding Modify Button 
	if($('#SessionId').val()!= $('#WriterId').val()){
		$('#btnSave').hide();
	}
	
	//hiding Comment password Edits
	for(var i=0; i<$('#arrLen').val(); i++){
		$('#rmPwEdt'+i).hide();
	}
}

function fnRmCmntSbmt(i, cmntKey){
	var tmp = $('#cmntRmPw'+i).val();	
	if(tmp==''){
		alert('Plz Enter Password!'); 
		return;
	}
	else{
		$('#tCmntSeq').val(cmntKey);
		$('#tCmntPw').val($('#cmntRmPw'+i).val());
		document.getElementById('displyCmnt').submit();
	}	
}


function fnConfirm(){
	var tmp = $('#CommentCnt').val();	
	
	if(confirm('There are Comments about this post, Are  you sure to delete?')){
		//document.getElementById('insertCmnt').submit();
		document.postDetail.action="dbDeletePost.php";
	    document.postDetail.method="post";
	    document.postDetail.submit();
	}
	else return;
	
}

</script>	
</html>