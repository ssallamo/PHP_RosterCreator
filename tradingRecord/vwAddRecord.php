<?php
include '../resource/config.php';
$Name   = $_SESSION['Name'];   

if(isset($_GET['record'])){
	$record = $_GET['record'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
	<html lang="en" style="height:100%">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewprt" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
		<script type="text/javascript" src="../js/commonJS.js"></script>
	</head>
	
	<body style="height:98%" onLoad="setDate(document.forms[0])">		
		<div class="container-fluid">	
			
		<h3>Add New <?php echo $record?> Record</h3>		
		<hr class="div_line">
		
		<div class="row">
		  	<div class="col-md-4">&nbsp;</div>
		  	<div class="col-md-4" style="background:rgb(243,242,236);padding:3px;">
		  		<form method="post">
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Category:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="category" class="form-control" style="width:98%" class="inputFrm"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Amount:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="amount" class="form-control" style="width:98%" class="inputFrm"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Name:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="representative" class="form-control" type="text" style="width:98%" value="<?php echo $Name; ?>" readonly="readonly" class="inputFrm"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Branch:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="branch" class="form-control" style="width:98%" class="inputFrm"/>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Date:</h4></label>
						<br>
						<div class="col-mid-10">
							<!--						
							<form name="selectDate">
							-->
								<select name="date" class="inputFrm"></select>
								<select name="month" onChange="setDate(this.form, this.form.year.value, this.value)" class="inputFrm"></select>
								<select name="year" onChange="setDate(this.form, this.value, this.form.month.value)" class="inputFrm"></select>
							<!--
							</form>
							-->						
						</div>
					</div>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Status:</h4></label>
						<div class="col-mid-10">
							<select name="status" disabled class="inputFrm">
								<option value="0" selected>Not Returned</option>
								<option value="1">Returned</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Description:</h4></label>
						<div class="col-mid-10">
							<textarea name="detail" style="width:98%; height:70px;" wrap="physical" class="inputFrm"></textarea>
						</div>
					</div>
					<div>
						<button type="submit" class="btn btn-danger" formaction="insertRecord.php?record=<?php echo $record?>">OK</button>
						<input type="button" class="btn" value="CANCEL" onclick="javascript:history.back();" />
					</div>
				</form>
	  	</div>
	  	<div class="col-md-4">&nbsp;</div>
	</div>	
	<hr class="div_line">	
	</body>
</html>