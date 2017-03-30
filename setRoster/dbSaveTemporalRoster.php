<?php
include('../resource/config.php');

//From session
$EmpID  = $_SESSION['EmpID'];
$EmpPw  = $_SESSION['EmpPw'];
$Name   = $_SESSION['Name'];      
$PhoneNo= $_SESSION['PhoneNo'];      
$Level  = $_SESSION['Level'];  

/*
Mon Tue Wed Thr Fri Sat Sun
[i][j]
11 21 31 41 51 61 71
12 22 32 42 52 62 72
13 23 33 43 53 63 73
14 24 34 44 54 64 74
15 25 35 45 55 65 75
16 26 36 46 56 66 76
*/

/// Data containing from the postdata
for($i=1; $i<=7 ; $i++){
	for($j=1; $j<=6 ; $j++){
		     if($i==1){ ${'dt'.$i.$j}=$_POST['Mon'];   echo '['.$_POST['Mon'].']';  }
		else if($i==2){ ${'dt'.$i.$j}=$_POST['Tue'];   echo '['.$_POST['Tue'].']';  }
		else if($i==3){ ${'dt'.$i.$j}=$_POST['Wed'];   echo '['.$_POST['Wed'].']';  }
		else if($i==4){ ${'dt'.$i.$j}=$_POST['Thr'];   echo '['.$_POST['Thr'].']';  }
		else if($i==5){ ${'dt'.$i.$j}=$_POST['Fri'];   echo '['.$_POST['Fri'].']';  }
		else if($i==6){ ${'dt'.$i.$j}=$_POST['Sat'];   echo '['.$_POST['Sat'].']';  }
		else if($i==7){ ${'dt'.$i.$j}=$_POST['Sun'];   echo '['.$_POST['Sun'].']';  }	
		${'st'.$i.$j.'tm'}=$_POST['st'.$i.$j.'tm'];
		${'st'.$i.$j.'mn'}=$_POST['st'.$i.$j.'mn'];
		${'fn'.$i.$j.'tm'}=$_POST['fn'.$i.$j.'tm'];
		${'fn'.$i.$j.'mn'}=$_POST['fn'.$i.$j.'mn'];	
		${'wk'.$i.$j.'nmOpt'}=$_POST['wk'.$i.$j.'nmOpt'];			 
	}
}

//insert data into the db
for($i=1; $i<=7 ; $i++){
	for($j=1; $j<=6 ; $j++){
		$tmpDt     = ${'dt'.$i.$j};
		$tmpDayNo  = $i;
		$tmpTimeSeq= $j;
		$tmpStTime = ${'st'.$i.$j.'tm'}.${'st'.$i.$j.'mn'};
		$tmpFnTime = ${'fn'.$i.$j.'tm'}.${'fn'.$i.$j.'mn'};
		$tmpEmpId  = ${'wk'.$i.$j.'nmOpt'};
		
		$sqlInsert = "INSERT INTO tblDailyRosterPlans 
    				  VALUES ('$tmpDt' 
    				  		, '$tmpDayNo' 
    				  		, '$tmpTimeSeq' 
    				  		, '$tmpStTime' 
    				  		, '$tmpFnTime' 
    				  		, '$tmpEmpId' 
    				  		)
					 ON DUPLICATE KEY UPDATE
					 TmTableFrom='$tmpStTime', TmTableTo='$tmpFnTime', EmpID='$tmpEmpId';";
		$resultInsert = mysqli_query($connect,$sqlInsert) or die( mysqli_error($connect));
	}
}

$sql =  "INSERT INTO tblWeeklyRosterDetail VALUES ('$dt11$dt71', '$dt11', '$dt21', '$dt31', '$dt41', '$dt51', '$dt61', '$dt71', 'T')
		 ON DUPLICATE KEY UPDATE
		 DayNo1='$dt11',DayNo2='$dt21',DayNo3='$dt31',DayNo4='$dt41',DayNo5='$dt51',DayNo6='$dt61',DayNo7='$dt71', Status='T';";
$result = mysqli_query($connect,$sql) or die( mysqli_error($connect));
?>
<meta http-equiv='refresh' content='0;url=vwNewRoster.php'>