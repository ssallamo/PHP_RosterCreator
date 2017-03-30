<?php

$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];
$PhoneNo= $_SESSION['PhoneNo'];
$Level  = $_SESSION['Level'];

$ModifyWeeklyKey = isset($_GET['ModifyWeeklyKey'])? $_GET['ModifyWeeklyKey'] : '';
if($ModifyWeeklyKey=='') $topMsg = "Create New Roster for Next week!";
else                     $topMsg = "Modify Roster!";

if($ModifyWeeklyKey==''){
	$sql = "select  DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%Y%m%d') as StDt,
	    		DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%Y%m%d') as FnDt,
        		DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%d/%m/%Y') as tmpStDt,
	   			DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%d/%m/%Y') as tmpFnDt,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%d/%m/%Y') as tMon,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +2 day), '%d/%m/%Y') as tTue,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +3 day), '%d/%m/%Y') as tWed,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +4 day), '%d/%m/%Y') as tThr,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +5 day), '%d/%m/%Y') as tFri,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +6 day), '%d/%m/%Y') as tSat,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%d/%m/%Y') as tSun,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%Y%m%d')   as Mon ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +2 day), '%Y%m%d')   as Tue ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +3 day), '%Y%m%d')   as Wed ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +4 day), '%Y%m%d')   as Thr ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +5 day), '%Y%m%d')   as Fri ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +6 day), '%Y%m%d')   as Sat ,
		        DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +7 day), '%Y%m%d')   as Sun ,
                ifnull((select Status from tblWeeklyRosterDetail where DayNo1=( DATE_FORMAT(date_add(DATE_FORMAT(max(PlanEndDt), '%Y%m%d'), interval +1 day), '%Y%m%d'))),'E') Status
		from   tblWeeklyRoster;";
}
else{
	$sql = " select DayNo1 as StDt, DayNo7 as FnDt, 
        		DATE_FORMAT(DayNo1, '%d/%m/%Y') as tmpStDt,
	   			DATE_FORMAT(DayNo7, '%d/%m/%Y') as tmpFnDt,
        		DATE_FORMAT(DayNo1, '%d/%m/%Y') as tMon,
        		DATE_FORMAT(DayNo2, '%d/%m/%Y') as tTue,
        		DATE_FORMAT(DayNo3, '%d/%m/%Y') as tWed,
        		DATE_FORMAT(DayNo4, '%d/%m/%Y') as tThr,
        		DATE_FORMAT(DayNo5, '%d/%m/%Y') as tFri,
        		DATE_FORMAT(DayNo6, '%d/%m/%Y') as tSat,
        		DATE_FORMAT(DayNo7, '%d/%m/%Y') as tSun,
        		DayNo1 as Mon,
        		DayNo2 as Tue,
        		DayNo3 as Wed,
        		DayNo4 as Thr,
        		DayNo5 as Fri,
        		DayNo6 as Sat,
        		DayNo7 as Sun,
                Status
		from tblWeeklyRosterDetail 
		where WeeklyKey='$ModifyWeeklyKey' ;";   
}

$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
while($row = mysqli_fetch_array($result)){	
	$StDt   =$row[0];
	$FnDt   =$row[1];
	$tStDt  =$row[2];
	$tFnDt  =$row[3];
	$tMon 	=$row[4];
	$tTue 	=$row[5];
	$tWed 	=$row[6];
	$tThr 	=$row[7];
	$tFri 	=$row[8];
	$tSat 	=$row[9];
	$tSun 	=$row[10];
	$Mon  	=$row[11];
	$Tue  	=$row[12];
	$Wed  	=$row[13];
	$Thr  	=$row[14];
	$Fri  	=$row[15];
	$Sat  	=$row[16];
	$Sun  	=$row[17];
	$Flg  	=$row[18];
}

//fetching hour
$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='004';";        
$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
$tmCd = array();
while($row =mysqli_fetch_assoc($result)){
	$tmCd[$row['cdTm']]=$row['cdTmNm'];
}

//fetching mins
$sql2 = "select Code as cdMn, CodeName as cdMnNm from tblCode
        where Category='005';";

$result = mysqli_query($connect,$sql2)or die("Error: ".mysqli_error($connect));
$mnCd = array();
while($row = mysqli_fetch_assoc($result)) {
	$mnCd[$row['cdMn']]=$row['cdMnNm'];
}

//set selected values
//return selected array List
function fnGetSlct($arr, $selected, $is_key=1){
	$str="<option>--</option>";
	foreach($arr as $key => $val){
		$option_value = ($is_key)? $key : $val;
		$option_text = $val;
		$slctd = ($option_value == $selected)? "selected='selected'":"";
		$str .= "<option value='{$option_value}'{$slctd}>{$option_text}</option>/n";
	}
	return $str;
}

$sqlNewWeekTmTbl = 
           "select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Mon'           
			union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Tue'
            union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Wed'
            union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Thr'
            union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Fri'
            union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Sat'
            union all
            select concat(DayNo,DateIDSeq) as Nm
				, substr(TmTableFrom, 1, 2)     as stTm
                , substr(TmTableFrom, 3, 2)     as stMn
                , substr(TmTableTo  , 1, 2)     as fnTm
                , substr(TmTableTo  , 3, 2)     as fnMn
                , EmpID                         as tmpEmp
				, Date                          as dt
				, DayNo                         as dayNo
            from tblDailyRosterPlans where Date='$Sun'
            order by 1;";        
$resultNewWeekTmTbl = mysqli_query($connect,$sqlNewWeekTmTbl)or die("Error: ".mysqli_error($connect));
$dfTmSetArr = array();	
$dfEmpSetArr = array();	

if (mysqli_num_rows($resultNewWeekTmTbl) > 0) {
    // output data of each row
	for($i = 1; $row = mysqli_fetch_array($resultNewWeekTmTbl); $i++) {
		
		//mon:1->6
		//tue:7->12
		//wed:13->18
		//thr:19->24
		//fir:25->30
		//sat:31->36
		//sun:37->42
		$dfTmSetArr[$i][0] = $row['Nm'];
		$dfTmSetArr[$i][1] = $row['stTm'];
		$dfTmSetArr[$i][2] = $row['stMn'];
		$dfTmSetArr[$i][3] = $row['fnTm'];
		$dfTmSetArr[$i][4] = $row['fnMn'];	
		$dfTmSetArr[$i][5] = $row['tmpEmp']; //tmpEmp
		$dfTmSetArr[$i][6] = $row['dt']; 
		
		$dayNo = $row['dayNo'];
		$tmpStTm = $dfTmSetArr[$i][1].$dfTmSetArr[$i][2];
		$tmpFnTm = $dfTmSetArr[$i][3].$dfTmSetArr[$i][4];
		
		/*
		if($ModifyWeeklyKey==''){
			$sqlSub = " select EmpID, (select Name from tblEmp where EmpID = A.EmpID) as Name
				        from tblEmpWorkingDay A
				        where DayNo =$dayNo
				        and (FromTime<=$tmpStTm and ToTime>=$tmpFnTm)";
		}
		else{
			$sqlSub = "select EmpID, Name from tblEmp where Status='1' and EmpID not in('0000');";
		}
		*/
		$sqlSub = " select EmpID, Name from tblEmp where EmpID not in('0000') and Level not in('A', 'B') and (StartDt<='$Mon' and Expired >='$Sun');";
		
		//echo $sqlSub;
		
		$resultEmpDt = mysqli_query($connect,$sqlSub)or die("Error: ".mysqli_error($connect));
		
		if($dayNo=='1'){//Mon			
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[1][$i] = $strOpt;			
		}
		else if($dayNo=='2'){//Tue	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[2][$i] = $strOpt;			
		}
		else if($dayNo=='3'){//Wed	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[3][$i] = $strOpt;			
		}
		else if($dayNo=='4'){//Thr	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[4][$i] = $strOpt;			
		}
		else if($dayNo=='5'){//Fri	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[5][$i] = $strOpt;			
		}
		else if($dayNo=='6'){//Sat	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[6][$i] = $strOpt;			
		}
		else{//Sun	
			$strOpt="<option>--</option>";
			if (mysqli_num_rows($resultEmpDt) > 0) {
				for($j = 1; $subRow = mysqli_fetch_array($resultEmpDt); $j++) {
					$slctd = ($subRow['EmpID'] == $dfTmSetArr[$i][5])? "selected='selected'":"";
					$strOpt .= "<option value='{$subRow['EmpID']}'{$slctd}>{$subRow['Name']}</option>/n";
				}
			}
			$dfEmpSetArr[7][$i] = $strOpt;	
		}
	}
} else {
}
?>