<?php
include('../resource/config.php');
//From session

$SearchEmpId = str_pad(intval($_GET['EmpID']),"4","0",STR_PAD_LEFT);

$sql="SELECT EmpID, Name, PhoneNo FROM tblEmp WHERE EmpID='$SearchEmpId'";
//echo $sql;
$result = mysqli_query($connect,$sql);
while($row = mysqli_fetch_array($result)){
	$t_EmpID   =$row[0];
	$t_Name    =$row[1];
	$t_PhoneNo =$row[2];
}


////////////////////////
// Display for Table ///
////////////////////////
$sql = "SELECT Code, weekDay, Availabled, concat(FromTime, ' ~ ', ToTime) as availableHours, concat('') as Btn
		from (
			select A.Code, A.CodeName as weekDay
			     , coalesce(B.AvailableYn, 'N') AS Availabled
			     , coalesce(concat(substr(B.FromTime, 1, 2), '.',substr(B.FromTime, 3, 2)), '') as FromTime 
        	     , coalesce(concat(substr(B.ToTime, 1, 2), '.',substr(B.ToTime, 3, 2)), '') as ToTime
			from tblCode A left join (select * from  tblEmpWorkingDay where EmpID ='$SearchEmpId') B
			on A.Code = B.DayNo
			WHERE A.Category='002') hour
		order by 1";

$result = mysqli_query($connect,$sql)or die("Error: ".mysqli_error($connect)); //f3f2ec
$tblStr="<table class='table table-bordered' style='background:rgb(230,230,220);' >
    	<thead >
	      	<tr>
				<th style='text-align:center;font-size:1.5em;width:10%'>No</th>
				<th style='text-align:center;font-size:1.5em;width:20%'>weekDay</th>
				<th style='text-align:center;font-size:1.5em;width:5%'>Y/N</th>
				<th style='text-align:center;font-size:1.5em;width:*%'>Hours</th>
				<th style='text-align:center;font-size:1.5em;width:15%'>Button</th>
	    	</tr>
    	</thead>
    	<tbody>";
if (mysqli_num_rows($result) > 0) {
	
	for($i = 0; $row = mysqli_fetch_array($result); $i++) {
		
	$tblStr .=		
	"<tr><td style='font-size:1.2em;text-align:center;'> ".$row['Code']."</td>
		<td style='font-size:1.2em;text-align:left;'>   ".$row['weekDay']."</td>		    															  
		<td style='font-size:1.2em;text-align:center;'> ".$row['Availabled']."</td>
		<td style='font-size:1.2em;text-align:center;'> ".$row['availableHours']."</td>
		<td style='font-size:1.2em;text-align:center;'>
		<span><button type='button' class='btn btn-warning' disabled >Update</button></span></td>
	</tr>";
	}	
}
$tblStr.="</tbody></table>";

//echo $t_EmpID.'|'.$t_PhoneNo.'|'.$tblStr;
	
?>