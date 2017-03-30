<?php

$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];
$WeeklyKey = $_GET['WeeklyKey'];

	$sql = "SELECT  DayNo1, DayNo2, DayNo3, DayNo4, DayNo5, DayNo6, DayNo7,
					DATE_FORMAT(DayNo1, '%d/%m/%Y') as DayNo1dp,
					DATE_FORMAT(DayNo2, '%d/%m/%Y') as DayNo2dp,
					DATE_FORMAT(DayNo3, '%d/%m/%Y') as DayNo3dp,
					DATE_FORMAT(DayNo4, '%d/%m/%Y') as DayNo4dp,
					DATE_FORMAT(DayNo5, '%d/%m/%Y') as DayNo5dp,
					DATE_FORMAT(DayNo6, '%d/%m/%Y') as DayNo6dp,
					DATE_FORMAT(DayNo7, '%d/%m/%Y') as DayNo7dp
			From    tblWeeklyRosterDetail
			where   weeklyKey='$WeeklyKey';";
		$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
		while($row = mysqli_fetch_array($result)){	
			$StDt   =$row['DayNo1'];
			$FnDt   =$row['DayNo7'];
			$tStDt  =$row['DayNo1dp'];
			$tFnDt  =$row['DayNo7dp'];
			$dt1  	=$row['DayNo1'];
			$dt2  	=$row['DayNo2'];
			$dt3  	=$row['DayNo3'];
			$dt4  	=$row['DayNo4'];
			$dt5  	=$row['DayNo5'];
			$dt6  	=$row['DayNo6'];
			$dt7  	=$row['DayNo7'];
			$tDt1  	=$row['DayNo1dp'];
			$tDt2  	=$row['DayNo2dp'];
			$tDt3  	=$row['DayNo3dp'];
			$tDt4  	=$row['DayNo4dp'];
			$tDt5  	=$row['DayNo5dp'];
			$tDt6  	=$row['DayNo6dp'];
			$tDt7  	=$row['DayNo7dp'];
		} 	
		
	$sql2 ="select Mon.DateIDSeq as No, Mon.aTmItms1, Tue.aTmItms2, Wed.aTmItms3, Thr.aTmItms4, Fri.aTmItms5, Sat.aTmItms6, Sun.aTmItms7
			from 
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms1
			from tblDailyRosterPlans A
			where Date in(select DayNo1 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Mon
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms2
			from tblDailyRosterPlans A
			where Date in(select DayNo2 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Tue
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms3
			from tblDailyRosterPlans A
			where Date in(select DayNo3 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Wed
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms4
			from tblDailyRosterPlans A
			where Date in(select DayNo4 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Thr
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms5
			from tblDailyRosterPlans A
			where Date in(select DayNo5 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Fri
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms6
			from tblDailyRosterPlans A
			where Date in(select DayNo6 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Sat
			inner join
			(select  DateIDSeq, concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),'~',substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2) ,'<br>',(select Name from tblEmp where EmpId = A.EmpID)) as aTmItms7
			from tblDailyRosterPlans A
			where Date in(select DayNo7 from tblWeeklyRosterDetail where WeeklyKey ='$WeeklyKey') 
			order by DateIDSeq) Sun
			where Mon.DateIDSeq = Tue.DateIDSeq
			and Mon.DateIDSeq = Wed.DateIDSeq
			and Mon.DateIDSeq = Thr.DateIDSeq
			and Mon.DateIDSeq = Fri.DateIDSeq
			and Mon.DateIDSeq = Sat.DateIDSeq
			and Mon.DateIDSeq = Sun.DateIDSeq;";
	
	
	$result = mysqli_query($connect,$sql2)or die("Error: ".mysqli_error($connect));
	$arr = array();
	if(!isset($arr)) {
	        echo "<script>array is set@@</script>";
	        exit;
	}
	for($i = 0; $dates = mysqli_fetch_array($result); $i++) {
		$arr[$i][0] = $dates['No'];
		$arr[$i][1] = $dates['aTmItms1'];
		$arr[$i][2] = $dates['aTmItms2'];
		$arr[$i][3] = $dates['aTmItms3'];
		$arr[$i][4] = $dates['aTmItms4'];
		$arr[$i][5] = $dates['aTmItms5'];
		$arr[$i][6] = $dates['aTmItms6'];
		$arr[$i][7] = $dates['aTmItms7'];		
	}	
?>