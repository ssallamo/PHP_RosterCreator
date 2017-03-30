<?php
include('../resource/config.php');
//From session
include('dbSelectAweekDetail.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	<title>Detail Roster</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
    <script src="../js/setRoster.js"></script>
    <script>
	// and create the list
	$(document).ready(function() {
		if($('#empLvl').val() >'C'){
			$('#modRoster').hide();
		}
	});
	</script>
    
</head>

<body style="margin:8px;">
	<input type="hidden" id='StDt' value='<?php echo $StDt ?>' />
	<input type="hidden" id='FnDt' value='<?php echo $FnDt ?>' />
	<input type="hidden" id='dt1'  value='<?php echo $dt1  ?>' />
	<input type="hidden" id='dt2'  value='<?php echo $dt2  ?>' />
	<input type="hidden" id='dt3'  value='<?php echo $dt3  ?>' />
	<input type="hidden" id='dt4'  value='<?php echo $dt4  ?>' />
	<input type="hidden" id='dt5'  value='<?php echo $dt5  ?>' />
	<input type="hidden" id='dt6'  value='<?php echo $dt6  ?>' />
	<input type="hidden" id='dt7'  value='<?php echo $dt7  ?>' />
	
	<form role="form" id="newRoster">
		<div class="container-fluid">
			<input type="hidden" id='empLvl' name='empLvl' value='<?php echo $Level ?>' />
			<h3> <?php echo $tDt1.' ~ '.$tDt7 ?> Detail </h3>
			<hr class="div_line">
			<div class="row" padding="3px">
					<div class="row" align="center">
					<div class="col-xs-6" align="right" >
						<div class="form-group">
					    	<label for="StDt">Start Date:</label>
					        <div class='input-group date' id='datetimepicker6' style="width:150px">
					            <input type='text' class="form-control" id="StDt"  value='<?php echo $tStDt ?>' disabled/>
					            <span class="input-group-addon">
					                <span class="glyphicon glyphicon-calendar"></span>
					            </span>
					        </div>
					    </div>
					</div>	
					<div class="col-xs-6" align="left">
						<div class="form-group">
					    	<label for="FnDt">Up To Date:</label>
					        <div class='input-group date' id='datetimepicker7' style="width:150px">
					            <input type='text' class="form-control" di="FnDt" value='<?php echo $tFnDt ?>' disabled/>
					            <span class="input-group-addon">
					                <span class="glyphicon glyphicon-calendar"></span>
					            </span>
					        </div>
				    	</div>
					</div>
				</div>
			</div>
			
			<hr class="div_line">
			
			<div align="center">
		    <div class="table-responsive" >
			<table class="table table-bordered" style="max-width:1200px">
		    	<thead >
			      	<tr>
						<th>No</th>
						<th>Mon<br>(<?php echo $tDt1 ?>)</th>
						<th>Tue<br>(<?php echo $tDt2 ?>)</th>
						<th>Wed<br>(<?php echo $tDt3 ?>)</th>
						<th>Thu<br>(<?php echo $tDt4 ?>)</th>
						<th>Fri<br>(<?php echo $tDt5 ?>)</th>
						<th>Sat<br>(<?php echo $tDt6 ?>)</th>
						<th>Sun<br>(<?php echo $tDt7 ?>)</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    		<?php
						foreach($arr as $brr){
							echo '<tr>';
							foreach($brr as $crr){
								echo '<td>';
								echo $crr;
								echo '</td>';
							}
							echo '</tr>';		
						}
		    		?>
		    	</tbody>
		    	<tfoot>
		    		<tr>
			    		<td colspan='8'  align="right">
			  			<div  id="modRoster">
			    			<a href="vwNewRoster.php?ModifyWeeklyKey=<?php echo $StDt.$FnDt ?>">
			    				<button type="button" class="btn btn-danger">Modify</button>
			    			</a>
			    		</div>
		    			</td>
		    		</tr>
		    	</tfoot>
		    </table>
			</div>
			</div>
		</div>
	</form>
</body>
</html>