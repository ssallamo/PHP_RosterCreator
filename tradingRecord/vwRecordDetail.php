<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

$Name   = $_SESSION['Name'];      

if(isset($_GET['target'])){
	$target = $_GET['target'];
}
if(isset($_GET['number'])){
	$number = $_GET['number'];
}

$flag = 2;
			
if($target == 'Loan') {
	$resultSet = fnSelectLoanData();
} else if($target == 'Borrow') {
	$resultSet = fnSelectBorrowData();
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
	<body style="height:95%" onLoad="setDate(document.forms[0])">		
		<div class="container-fluid">	
		<h3><?php echo $target?> Record</h1></h3>			
		<hr class="div_line">	
		
	<div class="row">
	  	<div class="col-md-4">&nbsp;</div>
	  	<div class="col-md-4" style="background:rgb(243,242,236);padding:5px;">		
			<form method="post" action="updateRecord.php?record=<?php echo $target?>">
				<input type="hidden" name="number" value="<?php echo $number ?>" />
					<?php
						while($rowRecord = mysqli_fetch_array($resultSet)){
					?>
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Category:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="category" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[1] ?>"/>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Amount:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="amount" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[2] ?>"/>
						</div>
					</div>					
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Returned Amount:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="rtamount" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[7] ?>"/>
						</div>
					</div>				
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Name:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="representative" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[3] ?>"/>
						</div>
					</div>			
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Branch:</h4></label>
						<div class="col-mid-10">
							<input type="text" name="branch" style="width:98%" class="inputFrm" value="<?php echo $rowRecord[4] ?>"/>
						</div>
					</div>
					<?php
						$date = bringDate($rowRecord[5]);
						$month = bringMonth($rowRecord[5]);
						$year = bringYear($rowRecord[5]);
					?>		
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Date:</h4></label>
						<div class="col-mid-10">
								<select name="predate" disabled class="inputFrm"><option selected value="<?php echo $date ?>"><?php echo $date ?></option></select>
								<select name="premonth" disabled class="inputFrm"><option selected value="<?php echo $month ?>"><?php echo $month ?></option></select>
								<select name="preyear" disabled class="inputFrm"><option selected value="<?php echo $year ?>"><?php echo $year ?></option></select>
							
						</div>
					</div>		
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Returned Date:</h4></label>
						<div class="col-mid-10">
							<select name="date" class="inputFrm"></select>
							<select name="month" class="inputFrm" onChange="setDate(this.form, this.form.rtyear.value, this.value)"></select>
							<select name="year" class="inputFrm" onChange="setDate(this.form, this.value, this.form.rtmonth.value)"></select>
						</div>
					</div>	
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Status:</h4></label>
						<div class="col-mid-10">
							<select name="status" class="inputFrm">
								<?php
									$arrStatus = array("Not Returned", "Partially Returned", "Returned");
									for($i=0; $i<3; $i++) {
										if($i == $rowRecord[6]) {
											echo "<option value='$i' selected>$arrStatus[$i]</option>";
										} else {
											echo "<option value='$i'>$arrStatus[$i]</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
						
					<div class="form-group">
						<label class="col-mid-2 control-label"><h4>Description:</h4></label>
						<div class="col-mid-10">
							<textarea name="detail" style="width:98%; height:50px;" wrap="physical" class="inputFrm" ><?php echo $rowRecord[8] ?></textarea>
						</div>
					</div>	
					<div class="form-group">
						<input type="submit" class="btn btn-danger" value="OK" />
						<input type="button" class="btn" value="CANCEL" onclick="javascript:history.back();" />
					</div>	
					<?php
						}	
					?>
			</form>
		</div>
  		<div class="col-md-4">&nbsp;</div>	
  	</div>  	
	<hr class="div_line">	
	</body>
</html>