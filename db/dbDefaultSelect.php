<?php
include('../resource/config.php');
//From session


/////////////////////////////////
// Simple select box fetch data//
/////////////////////////////////	

$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='001';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	
		$levelCd[$i][0] = $row['cdTm'];
		$levelCd[$i][1] = $row['cdTmNm'];  
	}

	
$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='006';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	
		$yearCd[$i][0] = $row['cdTm'];
		$yearCd[$i][1] = $row['cdTmNm'];  
	}
	

$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='007';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	
		$monthCd[$i][0] = $row['cdTm'];
		$monthCd[$i][1] = $row['cdTmNm'];  
	}
	

$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='008';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	
		$dateCd[$i][0] = $row['cdTm'];
		$dateCd[$i][1] = $row['cdTmNm'];  
	}	


$sql = "select Code as cdTm, CodeName as cdTmNm from tblCode
        where Category='009';";
            
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	//$tmCd = array();
	
	for($i=0; $row = mysqli_fetch_array($result); $i++) {	
		$categCd[$i][0] = $row['cdTm'];
		$categCd[$i][1] = $row['cdTmNm'];  
	}
	
$sql =" SELECT  SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE()))  , 9,2) AS mon_day
		      , SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE()))  , 6,2) AS mon_mon
		      , SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE()))  , 1,4) AS mon_yr
		      , SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE())+6), 9,2) AS sun_day
		      , SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE())+6), 6,2) AS sun_mon
		      , SUBSTRING(ADDDATE( CURDATE(), - WEEKDAY(CURDATE())+6), 1,4) AS sun_yr;";
      
    $result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect));
	while($row = mysqli_fetch_array($result)){	
		$mon_day =$row['mon_day'];
		$mon_mon =$row['mon_mon'];
		$mon_yr  =$row['mon_yr'];
		$sun_day =$row['sun_day'];
		$sun_mon =$row['sun_mon'];
		$sun_yr  =$row['sun_yr'];
	}
		
?>