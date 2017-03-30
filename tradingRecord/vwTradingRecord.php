<?php
include '../resource/config.php';
include '../db/dbFunctions.php';
include '../common/commonFunctions.php';

if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
$flag = $_GET['flag'];
$loanstatus = 'nprt';
$borrowstatus = 'nprt';
if($flag==1) {
	$target = $_GET['target'];
	if($target=='loan') {
		$loanstatus = $_GET['status'];
	}else if($target=='borrow') {
		$borrowstatus = $_GET['status'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
	<html lang="en" style="height:100%">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewprt" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/commonCSS.css" />
		<script type="text/javascript" src="../js/commonJS.js"></script>
	</head>
	<body>
		<div class="container-fluid">				
		<h3>Trading Record</h3>		
		<hr class="div_line">	
		
		<div class="row">
			<div class="col-md-6">
				<form name="frmLoan">
						<div id="listTitle"> Loan </div>
						<div style="text-align:right;width:270px;" >
							<select class="form-control" id="loanStatus" style="font-family:Comic Sans MS" onchange="changeStatus('loan');">
							<?php
							//if($flag==0 || ($flag==1 && $target=='loan')) {
								if($loanstatus=='all') { echo '<option value="all" selected>All</option>';}
								else {	echo '<option value="all">All</option>';}
								if($loanstatus=='nprt') { echo '<option value="nprt" selected>Not Returned + Partially Returned</option>';}
								else {	echo '<option value="nprt">Not Returned + Partially Returned</option>';}
								if($loanstatus=='rt') { echo '<option value="rt" selected>Returned</option>';}
								else {	echo '<option value="rt">Returned</option>';}
								if($loanstatus=='nrt') { echo '<option value="nrt" selected>Not Returned</option>';}
								else {	echo '<option value="nrt">Not Returned</option>';}
								if($loanstatus=='prt') { echo '<option value="prt" selected>Partially Returned</option>';}
								else {	echo '<option value="prt">Partially Returned</option>';}
							//}
							?>
							</select>
						</div>
					<br>
			    	<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							<tr height="32px" style="font-weight:bold; text-align:center; background:rgb(255,255,255);">
								<td class="tbl_bL tbl_bT tbl_bB" width="*%">Category</td>
								<td class="tbl_bT tbl_bB" width="14%">Amount</td>
								<td class="tbl_bT tbl_bB" width="17%">Name</td>
								<td class="tbl_bT tbl_bB" width="25%">Branch</td>
								<td class="tbl_bT tbl_bB" width="15%">Date</td>
								<td class="tbl_bR tbl_bT tbl_bB" width="12%">Status</td>
							</tr>
							</thead>
							<?php
								$resultLoan = fnSelectLoanData();
								if(mysqli_num_rows($resultLoan)>0) {
									while($rowLoan = mysqli_fetch_array($resultLoan)){
							?>
							<tbody>
							<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#e5e5e5'" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
								<td align="center" width="20%" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[1] ?></td>
								<td align="center" width="10%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[2] ?></td>
								<td width="20%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[3] ?></td>
								<td width="25%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo $rowLoan[4] ?></td>
								<td align="center" width="15%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)">
								<?php
									$date = convertDatetoString($rowLoan[5], 'tradingRecord');
									echo $date;
								?></td>
								<td align="center" width="10%"onclick="goRecordDetail('Loan', <?php echo $rowLoan[0]?>)"> <?php echo convertStatus($rowLoan[6]) ?> </td>
							</tr>
							<?php
									}
								}else {
							?>
							<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
								<td align="center" colspan="6">No Loan Record</td>
							</tr>
							<?php
								}
							?>
							</tbody>
						</table>
					</div>					
					<div style="text-align:right;">
						<button type='button' class="btn btn-warning" onclick="addRecord('Loan');">Add Loan Record</button>
					</div>
				</form>
			</div>
			
			<div class="col-md-6">
				<form name="frmBorrow">
					<div id="listTitle"> Borrow </div>
					<div style="text-align:right;width:270px;" >
						<select class="form-control" id="borrowStatus" style="font-family:Comic Sans MS;size" onchange="changeStatus('borrow');">
							<?php
								//if($flag==0 || ($flag==1 && $target=='borrow')) {
									if($borrowstatus=='all') { echo '<option value="all" selected>All</option>';}
									else {	echo '<option value="all">All</option>';}
									if($borrowstatus=='nprt') { echo '<option value="nprt" selected>Not Returned + Partially Returned</option>';}
									else {	echo '<option value="nprt">Not Returned + Partially Returned</option>';}
									if($borrowstatus=='rt') { echo '<option value="rt" selected>Returned</option>';}
									else {	echo '<option value="rt">Returned</option>';}
									if($borrowstatus=='nrt') { echo '<option value="nrt" selected>Not Returned</option>';}
									else {	echo '<option value="nrt">Not Returned</option>';}
									if($borrowstatus=='prt') { echo '<option value="prt" selected>Partially Returned</option>';}
									else {	echo '<option value="prt">Partially Returned</option>';}
								//}
							?>
						</select>
					</div>
					<br>
			    	<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
							<tr height="32px" style="font-weight:bold; text-align:center; background:rgb(255,255,255);">
								<td class="tbl_bL tbl_bT tbl_bB" width="*%">Category</td>
								<td class="tbl_bT tbl_bB" width="14%">Amount</td>
								<td class="tbl_bT tbl_bB" width="17%">Name</td>
								<td class="tbl_bT tbl_bB" width="25%">Branch</td>
								<td class="tbl_bT tbl_bB" width="15%">Date</td>
								<td class="tbl_bR tbl_bT tbl_bB" width="12%">Status</td>
							</tr>
							</thead>
							<?php
								$resultBorrow = fnSelectBorrowData();
								if(mysqli_num_rows($resultBorrow)>0) {
									while($rowBorrow = mysqli_fetch_array($resultBorrow)) {
							?>
							<tbody>
							<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#e5e5e5'" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
								<td align="center" width="20%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[1] ?></td>
								<td align="center" width="10%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[2] ?></td>
								<td width="20%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[3] ?></td>
								<td width="25%" style="padding-left:5px;padding-right:5px;" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo $rowBorrow[4] ?></td>
								<td align="center" width="15%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)">
								<?php
									$date = convertDatetoString($rowBorrow[5], 'tradingRecord');
									echo $date;
								?>
								</td>
								<td align="center" width="10%" onclick="goRecordDetail('Borrow', <?php echo $rowBorrow[0]?>)"> <?php echo convertStatus($rowBorrow[6]) ?> </td>
							</tr>
							<?php
									} 
								}else {
							?>
							<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
								<td align="center" colspan="6">No Borrow Record</td>
							</tr>
							<?php
								}
							//$flag = 1;
							?>
							</tbody>
						</table>
					</div>
					<div style="text-align:right;">
						<button type='button' class="btn btn-success" onclick="addRecord('Borrow');">Add Borrow Record</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<hr class="div_line">	
	</body>
</html>