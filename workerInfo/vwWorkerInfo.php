<?php
include('../resource/config.php');
include('dbSelectBasicData.php');

if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML  4.0 Transitional//EN">
<html lang="en" style="height:100%">
<head>
	<title>New Employee Register</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="./../css/worker.css">	
    <script src="../js/workerInfo.js"></script>
    <script>
    	function searchKeyWord(){
			var str = $('#searchKey').val();
			var stat = $('#searchStat input:radio:checked').val();
			location.href='vwWorkerInfo.php?searchKey='+str+'&searchStat='+stat;
		}
    </script>
    <script type="text/javascript">
	$(document).ready(function() 
	{ 
	    $("input:radio[name=statGb]").change(function() 
	    { 
			searchKeyWord();
	    }) 
	    
	    //radio button setting
	         if($('#stGb').val()=='0') $("input:radio[name=statGb]:input[value='0']").attr("checked", true);
		else if($('#stGb').val()=='1') $("input:radio[name=statGb]:input[value='1']").attr("checked", true);
		else                           $("input:radio[name=statGb]:input[value='2']").attr("checked", true);
	    
	});
	</script>
</head>
<body>	
	<input type="hidden" id='stGb'  name='stGb'  value='<?php echo $searchStat   ?>' />	
	<input type="hidden" id='empId'  name='empId'  value='<?php echo $EmpID   ?>' />	
	<input type="hidden" id='empNm'  name='empNm'  value='<?php echo $Name    ?>' />
	<input type="hidden" id='empPhn' name='empPhn' value='<?php echo $PhoneNo ?>' />
	<input type="hidden" id='empLvl' name='empLvl' value='<?php echo $Level   ?>' />	
	
	<div class="container-fluid" style="font-family:Comic Sans MS;">
		<h3> Employee List </h3>
		<hr class="div_line">
		
		<div class="row" >
			
			<div class="col-sm-3">&nbsp;
			</div>
			<div class="col-sm-4">
				<p><input type="text" class="form-control" id="searchKey" name="searchKey" style="width:95%" value='<?php echo $searchKey ?>'></p>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-warning" onclick="searchKeyWord()">Search</button>	
			</div>
			<div class="col-sm-4">
				<div class="form-group" id="searchStat">
					<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='2' >ALL</label>
					<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='1' >ON</label>
					<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='0' >EXPIRED</label>
				</div>				
			</div>
		</div>
		
		<hr class="div_line">
		<!--
		<form  id='search'>
		  	<table width="100%" border='0'>
		  		<tr>
		  			<td>
					    <div class="form-group" style="padding-bottom:15px">
							<label for="searchKey">Name Or ID Search:</label>
					        <p><input type="text" class="form-control" id="searchKey" name="searchKey" style="width:95%" value='<?php echo $searchKey ?>'></p>
					    </div>
		  			</td>
		  			<td >
			  			<div style="padding-bottom:15px; width=800px" >
							<button type="button" class="btn btn-warning" onclick="searchKeyWord()">Search</button>
						</div>
		  			</td>
		  			<td >
		  				<div class="form-group" id="searchStat">
							<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='2' >ALL</label>
							<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='1' >ON</label>
							<label class="radio-inline"><input type="radio" id="statGb" name="statGb" value='0' >EXPIRED</label>
						</div>
		  			</td>
		  		</tr>
		  	</table>
		</form>
		-->
		<form role="form" id="newRoster">	
			<div class="table-responsive" id='dispEmpInfo' align="center">
			<table class="table table-hover" style="background:rgb(243,242,236);max-width:1200px;" >
		    	<thead >
			      	<tr>
							<th style="text-align:center;font-size:1.2em;width:2%;">No</th>
							<th style="text-align:center;font-size:1.2em;width:15%;">Name</th>
							<th style="text-align:center;font-size:1.2em;width:10%;">ID</th>
							<th style="text-align:center;font-size:1.2em;width:10%;">Password</th>
							<th style="text-align:center;font-size:1.2em;width:15%;">Phone</th>
							<th style="text-align:center;font-size:1.2em;width:10%;">Level</th>
							<th style="text-align:center;font-size:1.2em;width:10%;">Status</th>
							<th style="text-align:center;font-size:1.2em;width:10%;">ExpiredDay</th>
			    	</tr>
		    	</thead>
		    	<tbody>
		    	<?php
						for($i=0; $i<$arrLength ; $i++){	    
		    	?>
				    	<tr onClick="location.href='upOneEmpInfo.php?upEmpID=<?php echo $empInfo[$i][2] ?>&upEmpName=<?php echo $empInfo[$i][1] ?>'">                   
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][0] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][1] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][2] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][3] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][4] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][5] ?></td>
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][6] ?></td>		  
				    		<td style='text-align:center;vertical-align: middle;'> <?php echo $empInfo[$i][7] ?></td>	
				    	</tr>
			    	<?php
			    		}
			    	?>
		    	</tbody>
		    	<tfoot>
		    		<tr><td colspan="9">
		    			<a href="newOneEmpInfo.php"><button type="button" class="btn btn-info" id="myBtn">Add New Employee</button></a>
		    		</td></tr>
		    	</tfoot>
		    </table>
			</div>			
		</form>	
		
	</div> <!-- container class End -->	
</body>
</html>