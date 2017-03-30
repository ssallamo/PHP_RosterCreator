<?php
include('../resource/config.php');
include('dbSelectWeeklyList.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML  4.0 Transitional//EN">
<html lang="en" style="height:100%">
<head>
	<title>Weekly Roster List</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">
    <script>
		function searchKeyCalWk(){		
			var s = $('#searchWk').val();  //01-08-2016
			var str = s.substr(6,4)+s.substr(3,2)+s.substr(0,2);
			location.href='vwCalRoster.php?searchWk='+str+'&oriDt='+s;		
		}	
    </script>
	<script>
	 	$(function(){
	    	$("#searchWk" ).datepicker();
		});
		$.datepicker.setDefaults(
			$.extend({'dateFormat':'dd-mm-yy'},$.datepicker.regional['nz'])
		);
	</script>
</head>

<body>
	<div class="container-fluid">
		<h3>The List of Shift Table!</h3>
		<form  id='search'>
			<hr class="div_line">
			<input type="hidden" id='empLvl' name='empLvl' value='<?php echo $Level ?>' />
		  	
		  	<div class="row">
				<div class="col-xs-4">&nbsp;</div>	
				<div class="col-xs-4">
					<input type="text" class="form-control" id="searchWk" name="searchWk" style="width:100%" value="<?php echo $oriDt ?>">
				</div>	
				<div class="col-xs-4"><button type="button" class="btn btn-warning" onclick="searchKeyCalWk();">Search</button></div>
			</div>
			
		  	
			<hr class="div_line">
			
			<div align="center">
	    	<div class="table-responsive" id='dispEmpInfo'>
			<table class="table table-hover" style="background:rgb(243,242,236);max-width:1000px;" >
			    <thead align="center">
			    <tr>
			    	<th>#</th>
			        <th>Period</th>
			    </tr>
			    </thead>
			    <tbody>
		    	<?php
					for($i=0; $i< $arrLength ; $i++){
		    	?>
			   	<tr onClick="location.href='vwAweekCalcWorkingHours.php?WeeklyKey='+<?php echo $dataList[$i][4] ?>">
			        <td><?php echo $dataList[$i][0] ?></td>
			        <td><?php echo $dataList[$i][1] ?></td>
			    </tr>
		    	<?php
		    		$cur_num --;
		    		}
		    	?>
			    </tbody>
			    <tfoot>
			    	<tr>
			    		<td colspan='4' align='center'>
			    		<?php
				    		$total_block = ceil($total_page/$page_num);
				    		$block=ceil($page/$page_num);
							$first=($block-1)*$page_num; // the first Page of block
							$last=$block*$page_num; //End of the page of block
				    		if($block >= $total_block){
				    			$last=$total_page;
				    		}
							//go First
							if($block > 1) {
							    $prev=$first-1;
							    echo "<a href='vwCalRoster.php?page=1'>[First]</a>&nbsp;";
							}
							//go Previous
							if($page > 1) {
							    $go_page=$page-1;
							    echo "<a href='vwCalRoster.php?page=$go_page'>[<<]</a>";
							}
							//page Link
							for ($page_link=$first+1;$page_link<=$last;$page_link++) {
							   if($page_link==$page) echo "<font color=green><b>$page_link</b></font>";
							   else    echo "<a href='vwCalRoster.php?page=$page_link'>[$page_link]</a>";
							}
							//go Next
							if($total_page > $page) {
							    $go_page=$page+1;
							    echo "<a href='vwCalRoster.php?page=$go_page'>[>>]</a>";
							}
							//go Last
							if($block < $total_block) {
							    $next=$last+1;
							    echo "<a href='vwCalRoster.php?page=$total_page'>[Last]</a></p>";
							}
						?>
			    		</td>
			    	</tr>
			   	</tfoot>
			</table>
			</div>
			</div>
		</form>
	</div>
</body>
</html>