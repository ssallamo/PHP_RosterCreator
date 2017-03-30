<?php
	include '../db/dbFunctions.php';

	$target = $_GET['target'];
	$status = $_GET['status'];

?>
<meta http-equiv='refresh' content='0;url=vwTradingRecord.php?flag=1&target=<?php echo $target?>&status=<?php echo $status?>'>