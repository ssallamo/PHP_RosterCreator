<?php
	function fnSelectFreeBoardData() {
		global $connect, $flag;
		$sql = "select * from tblFreeBoard";
		if($flag == 0) {
			$sql = $sql." order by postId desc";
		} else if($flag == 1) {
			global $number;
			$sql = $sql." where postId=$number";
		}
		
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));

		return $resultSet;
	}

	function fnSelectFreeBoardCategory() {
		global $connect;
		$sql = "select CodeName from tblCode where Category='005' and CategoryName='FreeBoard'";

		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	function fnInsertPost() {
		global $connect;
		global $title, $category, $name, $date, $month, $year, $detail, $secret;
		$sql = "INSERT INTO tblFreeBoard (category, title, message, name, date, secret) VALUES ('$category', '$title', '$detail', '$name', '" .$year."-".$month."-".$date."', $secret)";
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	function fnUpdatePost() {
		global $connect;
		global $title, $category, $detail, $secret, $number;
		$sql = 'Update tblFreeBoard set title="'.$title.'", category="'.$category.'", message="'.$detail.'", secret="'.$secret.'" where postId='.$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	function fnUpdateViews($number, $views) {
		global $connect;
		$sql = 'Update tblFreeBoard set views="'.($views + 1).'" where postId='.$number;
		$resultSet = mysqli_query($connect, $sql) or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	function fnDeletePost($number) {
		global $connect;
		$sql = 'Delete from tblFreeBoard where postId='.$number;
		$resultSet = mysqli_query($connect, $sql) or die("Error ".mysqli_error($connect));
		return $resultSet;
	}

	function fnAddCategory($category, $count) {
		global $connect;
		$count += $count;
		$sql = "INSERT INTO tblCode (Category, CategoryName, Code, CodeName) VALUES ('005', 'FreeBoard', '$count', '$category')";
		$resultSet = mysqli_query($connect, $sql) or die("Error ".mysqli_error($connect));
		return $resultSet;
	}

	//tradingRecord
	function fnSelectLoanData() {
		global $connect, $flag, $loanstatus;
		$sql = "select * from tblLoan";
		if($flag==0) {
			$sql = $sql." where status=0 or status=1";
		} else if($flag==2) {
			global $number;
			$sql = $sql." where loanId=".$number;
		} else if($flag==1) {
			if($loanstatus=='all'){
				$sql = $sql."";
			} else if($loanstatus=='nprt') {
				$sql = $sql." where status=0 or status =1";
			} else if($loanstatus=='rt') {
				$sql = $sql." where status=2";
			} else if($loanstatus=='nrt') {
				$sql = $sql." where status=0";
			} else if($loanstatus=='prt') {
				$sql = $sql." where status=1";
			}
		}
		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	function fnSelectBorrowData() {
		global $connect, $flag, $borrowstatus;
		$sql = "select * from tblBorrow";
		if($flag==0) {
			$sql = $sql." where status=0 or status=1";
		} else if($flag==2) {
			global $number;
			$sql = $sql." where borrowId=".$number;
		} else if($flag==1) {
			if($borrowstatus=='all'){
				$sql = $sql."";
			} else if($borrowstatus=='nprt') {
				$sql = $sql." where status=0 or status =1";
			} else if($borrowstatus=='rt') {
				$sql = $sql." where status=2";
			} else if($borrowstatus=='nrt') {
				$sql = $sql." where status=0";
			} else if($borrowstatus=='prt') {
				$sql = $sql." where status=1";
			}
		}
		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	function fnInsertLoanData() {
		global $connect;
		global $category, $amount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail;
		$sql = "INSERT INTO tblLoan (category, ".$amountType.", representative, branch, date, description) VALUES ('$category', '$amount', '$representative', '$branch', '" .$year."-".$month."-".$date."', '$detail')";
		$resultSet = mysqli_query($connect, $sql) or die( mysqli_error($connect));
		return $resultSet;
	}

	function fnInsertBorrowData() {
		global $connect;
		global $category, $amount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail;
		$sql = "INSERT INTO tblBorrow (category, ".$amountType.", representative, branch, date, description) VALUES ('$category', '$amount', '$representative', '$branch', '" .$year."-".$month."-".$date."', '$detail')";
		$resultSet = mysqli_query($connect, $sql) or die( mysqli_error($connect));
		return $resultSet;
	}

	function fnUpdateLoanData() {
		global $connect;
		global $category, $amount, $rtamount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail, $number;
		$sql = 'update tblLoan set category="'.$category.'", r_amount="'.$rtamount.'", representative="'.$representative.'", branch="'.$branch.'", rtDate="'.$year.'-'.$month.'-'.$date.'", status='.$status.', description="'.$detail.'" where loanId='.$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	function fnUpdateBorrowData() {
		global $connect;
		global $category, $amount, $rtamount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail, $number;
		$sql = "update tblBorrow set category='".$category."', r_amount='".$rtamount."', representative='".$representative."', branch='".$branch."', rtDate='".$year."-".$month."-".$date."', status=".$status.", description='".$detail."' where borrowId=".$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));;
		return $resultSet;
	}
	
	function fnSelectLoanRecordDesc5() {
		global $connect;
		$sql = "select * from tblLoan where status=0 or status =1 order by 1 desc LIMIT 5";
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}	
	
	function fnSelectBorrwoRecordDesc5() {
		global $connect;
		$sql = "select * from tblBorrow where status=0 or status =1 order by 1 desc LIMIT 5";
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}
?>