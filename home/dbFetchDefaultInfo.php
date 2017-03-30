<?php
//include('../resource/config.php');
//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level'];  

//Today's Roster Table
$sql =  "
		select  'No' as No
			 ,	concat(DATE_FORMAT(now(), '%d/%m/%Y'),'<br>',(case DAYOFWEEK(now()) 
														   when '2' then 'Monday'
														   when '3' then 'Tuesday'
														   when '4' then 'Wendsday'
														   when '5' then 'Thursday'
														   when '6' then 'Friday'
														   when '7' then 'Saterday'
														   when '1' then 'Sunday'
														   end)) as Time 
			 , 'NAME' as Name
		union all
		select   DateIDSeq as No
			 ,   concat(substr(TmTableFrom, 1, 2), '.', substr(TmTableFrom, 3, 2),' ~ '
			           ,substr(TmTableTo, 1, 2), '.', substr(TmTableTo, 3, 2)) as Time 
			 ,   (select Name from tblEmp where EmpId = A.EmpID) as Name
		from tblDailyRosterPlans A
		where Date=(DATE_FORMAT(now(),'%Y%m%d'));      
		";
$todayTimeTable = array();
$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
for($i = 0; $row = mysqli_fetch_array($result); $i++) {
	$todayTimeTable[$i][0] =$row['No'];
	$todayTimeTable[$i][1] =$row['Time'];
	$todayTimeTable[$i][2] =$row['Name'];
}

//mysqli_close($connect);
?>