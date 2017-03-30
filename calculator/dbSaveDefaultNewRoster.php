<?php
include('../resource/config.php');

$StDt    = $_POST['StDt'];
$FnDt    = $_POST['FnDt'];
$Mon     = $_POST['Mon'];
$Tue     = $_POST['Tue'];
$Wed     = $_POST['Wed'];
$Thr     = $_POST['Thr'];
$Fri     = $_POST['Fri'];
$Sat     = $_POST['Sat'];
$Sun     = $_POST['Sun'];
$Flg     = $_POST['Flg'];
$SaveFlag= $_POST['SaveFlag'];

if($StDt=="" || $FnDt==""){
	echo "<script>alert('SomthingWrong data');history.back();</script>";
    exit;
}
if($Flg==""||$Flg=="N") $Flg="E";

//Data format : insert into tblWeeklyRosterDetail values ('2016080120160807','20160801','20160802','20160803','20160804','20160805','20160806','20160807','0');
$sql =  "INSERT INTO tblWeeklyRosterDetail VALUES ('$StDt$FnDt', '$Mon', '$Tue', '$Wed', '$Thr', '$Fri', '$Sat', '$Sun', '$Flg')
		 ON DUPLICATE KEY UPDATE
		 DayNo1='$Mon',DayNo2='$Tue',DayNo3='$Wed',DayNo4='$Thr',DayNo5='$Fri',DayNo6='$Sat',DayNo7='$Sun';";		
$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
$sqlCopyLastWeek = 
		" SELECT CASE DayNo WHEN '1' THEN '$Mon'
						 	WHEN '2' THEN '$Tue'
						 	WHEN '3' THEN '$Wed'
						 	WHEN '4' THEN '$Thr'
						 	WHEN '5' THEN '$Fri'
						 	WHEN '6' THEN '$Sat'
						 	ELSE          '$Sun'
						 	END  As dt, DayNo , DateIDSeq, TmTableFrom, TmTableTo, EmpID
          From  tblDailyRosterPlans
          Where Date BETWEEN DATE_FORMAT(date_add(DATE_FORMAT('$StDt', '%Y%m%d'), interval -7 day), '%Y%m%d')
				         AND DATE_FORMAT(date_add(DATE_FORMAT('$FnDt', '%Y%m%d'), interval -7 day), '%Y%m%d');";        
				         
$result = mysqli_query($connect, $sqlCopyLastWeek);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	//Data copy from last week
    	$tmpDt1 = $row["dt"];
		$tmpDt2 = $row["DayNo"];      
		$tmpDt3 = $row["DateIDSeq"];  
		$tmpDt4 = $row["TmTableFrom"];
		$tmpDt5 = $row["TmTableTo"];  
		$tmpDt6 = $row["EmpID"];  
    	$sqlInsert = "INSERT INTO tblDailyRosterPlans 
    				  VALUES ('$tmpDt1' 
    				  		, '$tmpDt2' 
    				  		, '$tmpDt3' 
    				  		, '$tmpDt4' 
    				  		, '$tmpDt5' 
    				  		, '$tmpDt6' 
    				  		)
					 ON DUPLICATE KEY UPDATE
					 TmTableFrom='$tmpDt4', TmTableTo='$tmpDt5', EmpID='$tmpDt6';";
		$resultInsert = mysqli_query($connect,$sqlInsert) or die( mysqli_error($connect));
    }
} else {
    echo "0 results";
}
?>
<meta http-equiv='refresh' content='0;url=vwNewRoster.php'>
