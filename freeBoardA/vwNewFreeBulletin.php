<?php
include('../resource/config.php');
//From session
include('../db/dbDefaultSelect.php');
include('dbSelectAPost.php');
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      

?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	<title>New Free Bulletin</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/freeboard.css">	
    <script src="../js/setroster.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
    <script>
	// and create the list
	$(document).ready(function() {
		if($('#Flg').val() =='I'){
			$('#modi').hide();
		}
		else{
			$('#add').hide();
		}
	});
	</script> 
</head>

<body style="height:95%">
	<form method="post" action="dbSavePost.php" id="savingPost">			
	<div class="container-fluid">	
	<h3>New Post</h3>			
	<hr class="div_line">	
	
	<input type="hidden" id='Flg' name='Flg' value='<?php echo $Flg ?>' />
	<input type="hidden" id='Seq' name='Seq' value='<?php echo $Seq ?>' />
	<input type="hidden" id='writerId' name='writerId' value='<?php echo $EmpID ?>' />
	<input type="hidden" id='writerPw' name='writerPw' value='<?php echo $EmpPw ?>' />
	
	<div class="row">		
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">
			<div class="col-sm-2" > <h4>Title</h4> </div>
			<div class="col-sm-10"> 
				<input type="text" class="inputFrm" id="upTitle" name="upTitle" style="width:98%" value="<?php echo $Title ?>">
			</div>
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">			
			<div class="col-sm-2" > <h4>Category</h4> </div>
			<div class="col-sm-10"> 
				<select class="form-control" id="upCate" name="upCate" style="width:45%">
				<?php
					foreach($categCd as $mnList){ ?>
					<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$CategCd){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				<?php } ?>	
				</select>
			</div>			
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">			
			<div class="col-sm-2" > <h4>Writer</h4> </div>
			<div class="col-sm-4"> 
				<input type="text" class="inputFrm" id="upWriter" name="upWriter" style="width:98%;background-color:#e3f7f1;" value="<?php echo $Name ?>" readOnly >
			</div>			
			<div class="col-sm-2" > <h4>Password</h4> </div>
			<div class="col-sm-4"> 
				<input type="password" class="inputFrm" id="upPw" name="upPw" style="width:98%" value="" >
			</div>	
		</div>
		<div class="col-sm-12"> &nbsp; </div>
		<div class="form-group">
			<div class="col-sm-2" > <h4>Message</h4> </div>
			<div class="col-sm-10"> 
				<textarea class="inputFrm" id="upMsg" name="upMsg" style="width:98%" rows="15" value=""><?php echo $Content ?></textarea>
			</div>
		</div>
		<div class="col-sm-12" id="btnSave" >
			<br>
			<button type="button" id='modi' class="btn btn-success" onClick="fnSubmitSave()"><span class="glyphicon glyphicon-ok"></span>Modify</button>
			<button type="button" id='add' class="btn btn-success" onClick="fnSubmitSave()"><span class="glyphicon glyphicon-ok"></span>Save</button>
		</div>
		<div class="col-sm-12"> &nbsp; </div>
	</div>
	</form>
	
	</body>
	
	
	
	
	
<script>	
function fnSubmitSave(){
	
	if($('#upTitle').val()==''){alert("Enter the Title of this bulletin."); return;}
	else if($('#upMsg').val()==''){alert("Enter the writing of this bulletin."); return;}
	else if($('#upPw').val()==''){alert("Enter your password."); return;}
	else if($('#upPw').val()!= $('#writerPw').val()){
		alert("The entered password is wrong!"); return;
	}
	
	if(confirm('Are you sure to post it?')){
		document.getElementById('savingPost').submit();
	}
	else return;
	
			
}
</script>	
	
</html>