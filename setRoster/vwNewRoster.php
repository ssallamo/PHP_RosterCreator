<?php
include('../resource/config.php');
include('dbSelectRosterDateTime.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="en">
<head>
	
	<title>Create New Roster for Next Week</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
    <script src="../js/setRoster.js"></script>
    
    <!--
 	<style>
 	#newRoster .form-inline {width:95%;}
 	#btnCreateTbl {margin-top: 25px}
 		
 	</style> 
 	-->
 	
</head>

<body style="margin:8px;" onload="fnShowBtns()">
	<form role="form" id="newRoster" action="dbSaveDefaultNewRoster.php" method="post" >		
	<input type="hidden" id='StDt' name='StDt' value='<?php echo $StDt ?>' />
	<input type="hidden" id='FnDt' name='FnDt' value='<?php echo $FnDt ?>' />	
	<input type="hidden" id='Mon'  name='Mon'  value='<?php echo $Mon  ?>' />
	<input type="hidden" id='Tue'  name='Tue'  value='<?php echo $Tue  ?>' />
	<input type="hidden" id='Wed'  name='Wed'  value='<?php echo $Wed  ?>' />
	<input type="hidden" id='Thr'  name='Thr'  value='<?php echo $Thr  ?>' />
	<input type="hidden" id='Fri'  name='Fri'  value='<?php echo $Fri  ?>' />
	<input type="hidden" id='Sat'  name='Sat'  value='<?php echo $Sat  ?>' />
	<input type="hidden" id='Sun'  name='Sun'  value='<?php echo $Sun  ?>' />
	<input type="hidden" id='Flg'  name='Flg'  value='<?php echo $Flg  ?>' /><!-- E: Empty T:Temporay Savign C:ConfirmSaving -->
	<input type="hidden" id='ModifyWeeklyKey'  name='ModifyWeeklyKey'  value='<?php echo $ModifyWeeklyKey  ?>' />
	
	<div class="container-fluid">
		<h3><?php echo  $topMsg  ?></h3>
		<hr class="div_line">
		
		<div class ="row" padding="5px">
			
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
			<div class="row">	
				<div class="col-xs-12" align="right">		
					<button type="submit" class="btn btn-success" id="btnCreateTbl" value="Create">Default Create Table</button>
				</div>
			</div>
		<br>
	    <div class="table-responsive" >
		<table class="table table-bordered" style="background:rgb(243,242,236);max-width:900px;min-width:900px">	    	
	    	<thead >		      	
		      	<tr>
					<th style="width:3px;"></th>
					<th>Mon<br>(<?php echo $tMon ?>)</th>
					<th>Tue<br>(<?php echo $tTue ?>)</th>
					<th>Wed<br>(<?php echo $tWed ?>)</th>
					<th>Thu<br>(<?php echo $tThr ?>)</th>
					<th>Fri<br>(<?php echo $tFri ?>)</th>
					<th bgcolor="#ffeb99">Sat<br>(<?php echo $tSat ?>)</th>
					<th bgcolor="#ffeb99">Sun<br>(<?php echo $tSun ?>)</th>
		    	</tr>
	    	</thead>
	    	<tbody>
	    		
	    		<!-- Start of 1 seq  -->
	    		<tr>
	    			<td style="padding:4px">1</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st11tm" name="st11tm" onchange="fnShowEmps(1,1,'wk11nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[1][1]); ?></select>
	    				<select class="form-control input-sm" id="st11mn" name="st11mn" onchange="fnShowEmps(1,1,'wk11nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[1][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn11tm" name="fn11tm" onchange="fnShowEmps(1,1,'wk11nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[1][3]); ?></select>
	    				<select class="form-control input-sm" id="fn11mn" name="fn11mn" onchange="fnShowEmps(1,1,'wk11nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[1][4]); ?></select><br>
	    				<span id ='wk11nm'><select class='form-control' style='margin-top:5px;width:126px;' name='wk11nmOpt'><?php echo $dfEmpSetArr[1][1] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st21tm" name="st21tm" onchange="fnShowEmps(2,1,'wk21nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[7][1]); ?></select>
	    				<select class="form-control input-sm" id="st21mn" name="st21mn" onchange="fnShowEmps(2,1,'wk21nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[7][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn21tm" name="fn21tm" onchange="fnShowEmps(2,1,'wk21nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[7][3]); ?></select>
	    				<select class="form-control input-sm" id="fn21mn" name="fn21mn" onchange="fnShowEmps(2,1,'wk21nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[7][4]); ?></select><br>
	    				<span id="wk21nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk21nmOpt'><?php echo $dfEmpSetArr[2][7] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st31tm" name="st31tm" onchange="fnShowEmps(3,1,'wk31nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[13][1]); ?></select>
	    				<select class="form-control input-sm" id="st31mn" name="st31mn" onchange="fnShowEmps(3,1,'wk31nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[13][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn31tm" name="fn31tm" onchange="fnShowEmps(3,1,'wk31nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[13][3]); ?></select>
	    				<select class="form-control input-sm" id="fn31mn" name="fn31mn" onchange="fnShowEmps(3,1,'wk31nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[13][4]); ?></select><br>
	    				<span id="wk31nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk31nmOpt'><?php echo $dfEmpSetArr[3][13] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st41tm" name="st41tm" onchange="fnShowEmps(4,1,'wk41nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[19][1]); ?></select>
	    				<select class="form-control input-sm" id="st41mn" name="st41mn" onchange="fnShowEmps(4,1,'wk41nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[19][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn41tm" name="fn41tm" onchange="fnShowEmps(4,1,'wk41nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[19][3]); ?></select>
	    				<select class="form-control input-sm" id="fn41mn" name="fn41mn" onchange="fnShowEmps(4,1,'wk41nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[19][4]); ?></select><br>
	    				<span id="wk41nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk41nmOpt'><?php echo $dfEmpSetArr[4][19] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st51tm" name="st51tm" onchange="fnShowEmps(5,1,'wk51nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[25][1]); ?></select>
	    				<select class="form-control input-sm" id="st51mn" name="st51mn" onchange="fnShowEmps(5,1,'wk51nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[25][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn51tm" name="fn51tm" onchange="fnShowEmps(5,1,'wk51nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[25][3]); ?></select>
	    				<select class="form-control input-sm" id="fn51mn" name="fn51mn" onchange="fnShowEmps(5,1,'wk51nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[25][4]); ?></select><br>
	    				<span id="wk51nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk51nmOpt'><?php echo $dfEmpSetArr[5][25] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st61tm" name="st61tm" onchange="fnShowEmps(6,1,'wk61nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[31][1]); ?></select>
	    				<select class="form-control input-sm" id="st61mn" name="st61mn" onchange="fnShowEmps(6,1,'wk61nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[31][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn61tm" name="fn61tm" onchange="fnShowEmps(6,1,'wk61nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[31][3]); ?></select>
	    				<select class="form-control input-sm" id="fn61mn" name="fn61mn" onchange="fnShowEmps(6,1,'wk61nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[31][4]); ?></select><br>
	    				<span id="wk61nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk61nmOpt'><?php echo $dfEmpSetArr[6][31] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st71tm" name="st71tm" onchange="fnShowEmps(7,1,'wk71nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[37][1]); ?></select>
	    				<select class="form-control input-sm" id="st71mn" name="st71mn" onchange="fnShowEmps(7,1,'wk71nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[37][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn71tm" name="fn71tm" onchange="fnShowEmps(7,1,'wk71nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[37][3]); ?></select>
	    				<select class="form-control input-sm" id="fn71mn" name="fn71mn" onchange="fnShowEmps(7,1,'wk71nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[37][4]); ?></select><br>
	    				<span id="wk71nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk71nmOpt'><?php echo $dfEmpSetArr[7][37] ?></select></span>  	    				
	    			</td>
	    		</tr>
	    		<!-- End of 1 seq -->	
	    		<!-- Start of 2 seq  -->
	    		<tr>                
	    			<td style="padding:4px">2</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st12tm" name="st12tm" onchange="fnShowEmps(1,2,'wk12nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[2][1]); ?></select>
	    				<select class="form-control input-sm" id="st12mn" name="st12mn" onchange="fnShowEmps(1,2,'wk12nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[2][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn12tm" name="fn12tm" onchange="fnShowEmps(1,2,'wk12nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[2][3]); ?></select>
	    				<select class="form-control input-sm" id="fn12mn" name="fn12mn" onchange="fnShowEmps(1,2,'wk12nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[2][4]); ?></select><br>
	    				<span id="wk12nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk12nmOpt'><?php echo $dfEmpSetArr[1][2] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st22tm" name="st22tm" onchange="fnShowEmps(2,2,'wk22nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[8][1]); ?></select>
	    				<select class="form-control input-sm" id="st22mn" name="st22mn" onchange="fnShowEmps(2,2,'wk22nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[8][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn22tm" name="fn22tm" onchange="fnShowEmps(2,2,'wk22nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[8][3]); ?></select>
	    				<select class="form-control input-sm" id="fn22mn" name="fn22mn" onchange="fnShowEmps(2,2,'wk22nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[8][4]); ?></select><br>  
	    				<span id="wk22nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk22nmOpt'><?php echo $dfEmpSetArr[2][8] ?></select></span>   				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st32tm" name="st32tm" onchange="fnShowEmps(3,2,'wk32nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[14][1]); ?></select>
	    				<select class="form-control input-sm" id="st32mn" name="st32mn" onchange="fnShowEmps(3,2,'wk32nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[14][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn32tm" name="fn32tm" onchange="fnShowEmps(3,2,'wk32nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[14][3]); ?></select>
	    				<select class="form-control input-sm" id="fn32mn" name="fn32mn" onchange="fnShowEmps(3,2,'wk32nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[14][4]); ?></select><br> 
	    				<span id="wk32nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk32nmOpt'><?php echo $dfEmpSetArr[3][14] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st42tm" name="st42tm" onchange="fnShowEmps(4,2,'wk42nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[20][1]); ?></select>
	    				<select class="form-control input-sm" id="st42mn" name="st42mn" onchange="fnShowEmps(4,2,'wk42nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[20][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn42tm" name="fn42tm" onchange="fnShowEmps(4,2,'wk42nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[20][3]); ?></select>
	    				<select class="form-control input-sm" id="fn42mn" name="fn42mn" onchange="fnShowEmps(4,2,'wk42nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[20][4]); ?></select><br>
	    				<span id="wk42nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk42nmOpt'><?php echo $dfEmpSetArr[4][20] ?></select></span>   	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st52tm" name="st52tm" onchange="fnShowEmps(5,2,'wk52nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[26][1]); ?></select>
	    				<select class="form-control input-sm" id="st52mn" name="st52mn" onchange="fnShowEmps(5,2,'wk52nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[26][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn52tm" name="fn52tm" onchange="fnShowEmps(5,2,'wk52nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[26][3]); ?></select>
	    				<select class="form-control input-sm" id="fn52mn" name="fn52mn" onchange="fnShowEmps(5,2,'wk52nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[26][4]); ?></select><br>
	    				<span id="wk52nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk52nmOpt'><?php echo $dfEmpSetArr[5][26] ?></select></span>
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st62tm" name="st62tm" onchange="fnShowEmps(6,2,'wk62nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[32][1]); ?></select>
	    				<select class="form-control input-sm" id="st62mn" name="st62mn" onchange="fnShowEmps(6,2,'wk62nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[32][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn62tm" name="fn62tm" onchange="fnShowEmps(6,2,'wk62nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[32][3]); ?></select>
	    				<select class="form-control input-sm" id="fn62mn" name="fn62mn" onchange="fnShowEmps(6,2,'wk62nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[32][4]); ?></select><br>
	    				<span id="wk62nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk62nmOpt'><?php echo $dfEmpSetArr[6][32] ?></select></span>
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st72tm" name="st72tm" onchange="fnShowEmps(7,2,'wk72nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[38][1]); ?></select>
	    				<select class="form-control input-sm" id="st72mn" name="st72mn" onchange="fnShowEmps(7,2,'wk72nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[38][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn72tm" name="fn72tm" onchange="fnShowEmps(7,2,'wk72nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[38][3]); ?></select>
	    				<select class="form-control input-sm" id="fn72mn" name="fn72mn" onchange="fnShowEmps(7,2,'wk72nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[38][4]); ?></select><br>
	    				<span id="wk72nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk72nmOpt'><?php echo $dfEmpSetArr[7][38] ?></select></span>   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 2 seq -->	    		
	    		<!-- Start of 3 seq  -->
	    		<tr>
	    			<td style="padding:4px">3</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st13tm" name="st13tm" onchange="fnShowEmps(1,3,'wk13nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[3][1]); ?></select>
	    				<select class="form-control input-sm" id="st13mn" name="st13mn" onchange="fnShowEmps(1,3,'wk13nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[3][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn13tm" name="fn13tm" onchange="fnShowEmps(1,3,'wk13nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[3][3]); ?></select>
	    				<select class="form-control input-sm" id="fn13mn" name="fn13mn" onchange="fnShowEmps(1,3,'wk13nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[3][4]); ?></select><br>
	    				<span id="wk13nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk13nmOpt'><?php echo $dfEmpSetArr[1][3] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st23tm" name="st23tm" onchange="fnShowEmps(2,3,'wk23nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[9][1]); ?></select>
	    				<select class="form-control input-sm" id="st23mn" name="st23mn" onchange="fnShowEmps(2,3,'wk23nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[9][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn23tm" name="fn23tm" onchange="fnShowEmps(2,3,'wk23nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[9][3]); ?></select>
	    				<select class="form-control input-sm" id="fn23mn" name="fn23mn" onchange="fnShowEmps(2,3,'wk23nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[9][4]); ?></select><br>  	
	    				<span id="wk23nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk23nmOpt'><?php echo $dfEmpSetArr[2][9] ?></select></span>    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st33tm" name="st33tm" onchange="fnShowEmps(3,3,'wk33nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[15][1]); ?></select>
	    				<select class="form-control input-sm" id="st33mn" name="st33mn" onchange="fnShowEmps(3,3,'wk33nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[15][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn33tm" name="fn33tm" onchange="fnShowEmps(3,3,'wk33nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[15][3]); ?></select>
	    				<select class="form-control input-sm" id="fn33mn" name="fn33mn" onchange="fnShowEmps(3,3,'wk33nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[15][4]); ?></select><br>   	 
	    				<span id="wk33nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk33nmOpt'><?php echo $dfEmpSetArr[3][15] ?></select></span>   				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st43tm" name="st43tm" onchange="fnShowEmps(4,3,'wk43nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[21][1]); ?></select>
	    				<select class="form-control input-sm" id="st43mn" name="st43mn" onchange="fnShowEmps(4,3,'wk43nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[21][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn43tm" name="fn43tm" onchange="fnShowEmps(4,3,'wk43nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[21][3]); ?></select>
	    				<select class="form-control input-sm" id="fn43mn" name="fn43mn" onchange="fnShowEmps(4,3,'wk43nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[21][4]); ?></select><br>
	    				<span id="wk43nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk43nmOpt'><?php echo $dfEmpSetArr[4][21] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st53tm" name="st53tm" onchange="fnShowEmps(5,3,'wk53nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[27][1]); ?></select>
	    				<select class="form-control input-sm" id="st53mn" name="st53mn" onchange="fnShowEmps(5,3,'wk53nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[27][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn53tm" name="fn53tm" onchange="fnShowEmps(5,3,'wk53nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[27][3]); ?></select>
	    				<select class="form-control input-sm" id="fn53mn" name="fn53mn" onchange="fnShowEmps(5,3,'wk53nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[27][4]); ?></select><br>
	    				<span id="wk53nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk53nmOpt'><?php echo $dfEmpSetArr[5][27] ?></select></span>   	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st63tm" name="st63tm" onchange="fnShowEmps(6,3,'wk63nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[33][1]); ?></select>
	    				<select class="form-control input-sm" id="st63mn" name="st63mn" onchange="fnShowEmps(6,3,'wk63nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[33][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn63tm" name="fn63tm" onchange="fnShowEmps(6,3,'wk63nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[33][3]); ?></select>
	    				<select class="form-control input-sm" id="fn63mn" name="fn63mn" onchange="fnShowEmps(6,3,'wk63nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[33][4]); ?></select><br>  
	    				<span id="wk63nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk63nmOpt'><?php echo $dfEmpSetArr[6][33] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st73tm" name="st73tm" onchange="fnShowEmps(7,3,'wk73nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[39][1]); ?></select>
	    				<select class="form-control input-sm" id="st73mn" name="st73mn" onchange="fnShowEmps(7,3,'wk73nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[39][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn73tm" name="fn73tm" onchange="fnShowEmps(7,3,'wk73nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[39][3]); ?></select>
	    				<select class="form-control input-sm" id="fn73mn" name="fn73mn" onchange="fnShowEmps(7,3,'wk73nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[39][4]); ?></select><br>  
	    				<span id="wk73nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk73nmOpt'><?php echo $dfEmpSetArr[7][39] ?></select></span>	    				
	    			</td>
	    		</tr>
	    		<!-- End of 3 seq -->
	    		<!-- Start of 4 seq  -->
	    		<tr>
	    			<td style="padding:4px">4</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st14tm" name="st14tm" onchange="fnShowEmps(1,4,'wk14nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[4][1]); ?></select>
	    				<select class="form-control input-sm" id="st14mn" name="st14mn" onchange="fnShowEmps(1,4,'wk14nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[4][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn14tm" name="fn14tm" onchange="fnShowEmps(1,4,'wk14nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[4][3]); ?></select>
	    				<select class="form-control input-sm" id="fn14mn" name="fn14mn" onchange="fnShowEmps(1,4,'wk14nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[4][4]); ?></select><br>
	    				<span id="wk14nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk14nmOpt'><?php echo $dfEmpSetArr[1][4] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st24tm" name="st24tm" onchange="fnShowEmps(2,4,'wk24nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[10][1]); ?></select>
	    				<select class="form-control input-sm" id="st24mn" name="st24mn" onchange="fnShowEmps(2,4,'wk24nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[10][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn24tm" name="fn24tm" onchange="fnShowEmps(2,4,'wk24nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[10][3]); ?></select>
	    				<select class="form-control input-sm" id="fn24mn" name="fn24mn" onchange="fnShowEmps(2,4,'wk24nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[10][4]); ?></select><br> 
	    				<span id="wk24nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk24nmOpt'><?php echo $dfEmpSetArr[2][10] ?></select></span>	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st34tm" name="st34tm" onchange="fnShowEmps(3,4,'wk34nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[16][1]); ?></select>
	    				<select class="form-control input-sm" id="st34mn" name="st34mn" onchange="fnShowEmps(3,4,'wk34nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[16][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn34tm" name="fn34tm" onchange="fnShowEmps(3,4,'wk34nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[16][3]); ?></select>
	    				<select class="form-control input-sm" id="fn34mn" name="fn34mn" onchange="fnShowEmps(3,4,'wk34nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[16][4]); ?></select><br>
	    				<span id="wk34nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk34nmOpt'><?php echo $dfEmpSetArr[3][16] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st44tm" name="st44tm" onchange="fnShowEmps(4,4,'w44nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[22][1]); ?></select>
	    				<select class="form-control input-sm" id="st44mn" name="st44mn" onchange="fnShowEmps(4,4,'w44nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[22][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn44tm" name="fn44tm" onchange="fnShowEmps(4,4,'w44nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[22][3]); ?></select>
	    				<select class="form-control input-sm" id="fn44mn" name="fn44mn" onchange="fnShowEmps(4,4,'w44nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[22][4]); ?></select><br> 
	    				<span id="wk44nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk44nmOpt'><?php echo $dfEmpSetArr[4][22] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st54tm" name="st54tm" onchange="fnShowEmps(5,4,'wk54nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[28][1]); ?></select>
	    				<select class="form-control input-sm" id="st54mn" name="st54mn" onchange="fnShowEmps(5,4,'wk54nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[28][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn54tm" name="fn54tm" onchange="fnShowEmps(5,4,'wk54nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[28][3]); ?></select>
	    				<select class="form-control input-sm" id="fn54mn" name="fn54mn" onchange="fnShowEmps(5,4,'wk54nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[28][4]); ?></select><br>  
	    				<span id="wk54nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk54nmOpt'><?php echo $dfEmpSetArr[5][28] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st64tm" name="st64tm" onchange="fnShowEmps(6,4,'wk64nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[34][1]); ?></select>
	    				<select class="form-control input-sm" id="st64mn" name="st64mn" onchange="fnShowEmps(6,4,'wk64nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[34][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn64tm" name="fn64tm" onchange="fnShowEmps(6,4,'wk64nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[34][3]); ?></select>
	    				<select class="form-control input-sm" id="fn64mn" name="fn64mn" onchange="fnShowEmps(6,4,'wk64nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[34][4]); ?></select><br> 
	    				<span id="wk64nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk64nmOpt'><?php echo $dfEmpSetArr[6][34] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st74tm" name="st74tm" onchange="fnShowEmps(7,4,'wk74nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[40][1]); ?></select>
	    				<select class="form-control input-sm" id="st74mn" name="st74mn" onchange="fnShowEmps(7,4,'wk74nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[40][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn74tm" name="fn74tm" onchange="fnShowEmps(7,4,'wk74nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[40][3]); ?></select>
	    				<select class="form-control input-sm" id="fn74mn" name="fn74mn" onchange="fnShowEmps(7,4,'wk74nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[40][4]); ?></select><br>
	    				<span id="wk74nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk74nmOpt'><?php echo $dfEmpSetArr[7][40] ?></select></span> 	    				
	    			</td>
	    		</tr>
	    		<!-- End of 4 seq -->
	    		<!-- Start of 5 seq  -->
	    		<tr>
	    			<td style="padding:4px">5</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st15tm" name="st15tm" onchange="fnShowEmps(1,5,'wk15nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[5][1]); ?></select>
	    				<select class="form-control input-sm" id="st15mn" name="st15mn" onchange="fnShowEmps(1,5,'wk15nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[5][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn15tm" name="fn15tm" onchange="fnShowEmps(1,5,'wk15nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[5][3]); ?></select>
	    				<select class="form-control input-sm" id="fn15mn" name="fn15mn" onchange="fnShowEmps(1,5,'wk15nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[5][4]); ?></select><br>
	    				<span id="wk15nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk15nmOpt'><?php echo $dfEmpSetArr[1][5] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st25tm" name="st25tm" onchange="fnShowEmps(2,5,'wk25nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[11][1]); ?></select>
	    				<select class="form-control input-sm" id="st25mn" name="st25mn" onchange="fnShowEmps(2,5,'wk25nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[11][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn25tm" name="fn25tm" onchange="fnShowEmps(2,5,'wk25nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[11][3]); ?></select>
	    				<select class="form-control input-sm" id="fn25mn" name="fn25mn" onchange="fnShowEmps(2,5,'wk25nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[11][4]); ?></select><br>	
	    				<span id="wk25nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk25nmOpt'><?php echo $dfEmpSetArr[2][11] ?></select></span>   	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st35tm" name="st35tm" onchange="fnShowEmps(3,5,'wk35nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[17][1]); ?></select>
	    				<select class="form-control input-sm" id="st35mn" name="st35mn" onchange="fnShowEmps(3,5,'wk35nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[17][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn35tm" name="fn35tm" onchange="fnShowEmps(3,5,'wk35nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[17][3]); ?></select>
	    				<select class="form-control input-sm" id="fn35mn" name="fn35mn" onchange="fnShowEmps(3,5,'wk35nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[17][4]); ?></select><br>  
	    				<span id="wk35nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk35nmOpt'><?php echo $dfEmpSetArr[3][17] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st45tm" name="st45tm" onchange="fnShowEmps(4,5,'wk45nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[23][1]); ?></select>
	    				<select class="form-control input-sm" id="st45mn" name="st45mn" onchange="fnShowEmps(4,5,'wk45nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[23][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn45tm" name="fn45tm" onchange="fnShowEmps(4,5,'wk45nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[23][3]); ?></select>
	    				<select class="form-control input-sm" id="fn45mn" name="fn45mn" onchange="fnShowEmps(4,5,'wk45nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[23][4]); ?></select><br>	  
	    				<span id="wk45nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk45nmOpt'><?php echo $dfEmpSetArr[4][23] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st55tm" name="st55tm" onchange="fnShowEmps(5,5,'wk55nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[29][1]); ?></select>
	    				<select class="form-control input-sm" id="st55mn" name="st55mn" onchange="fnShowEmps(5,5,'wk55nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[29][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn55tm" name="fn55tm" onchange="fnShowEmps(5,5,'wk55nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[29][3]); ?></select>
	    				<select class="form-control input-sm" id="fn55mn" name="fn55mn" onchange="fnShowEmps(5,5,'wk55nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[29][4]); ?></select><br>  
	    				<span id="wk55nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk55nmOpt'><?php echo $dfEmpSetArr[5][29] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st65tm" name="st65tm" onchange="fnShowEmps(6,5,'wk65nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[35][1]); ?></select>
	    				<select class="form-control input-sm" id="st65mn" name="st65mn" onchange="fnShowEmps(6,5,'wk65nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[35][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn65tm" name="fn65tm" onchange="fnShowEmps(6,5,'wk65nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[35][3]); ?></select>
	    				<select class="form-control input-sm" id="fn65mn" name="fn65mn" onchange="fnShowEmps(6,5,'wk65nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[35][4]); ?></select><br> 
	    				<span id="wk65nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk65nmOpt'><?php echo $dfEmpSetArr[6][35] ?></select></span>  	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st75tm" name="st75tm" onchange="fnShowEmps(7,5,'wk75nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[41][1]); ?></select>
	    				<select class="form-control input-sm" id="st75mn" name="st75mn" onchange="fnShowEmps(7,5,'wk75nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[41][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn75tm" name="fn75tm" onchange="fnShowEmps(7,5,'wk75nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[41][3]); ?></select>
	    				<select class="form-control input-sm" id="fn75mn" name="fn75mn" onchange="fnShowEmps(7,5,'wk75nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[41][4]); ?></select><br>
	    				<span id="wk75nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk75nmOpt'><?php echo $dfEmpSetArr[7][41] ?></select></span>   	    				
	    			</td>
	    		</tr>
	    		<!-- End of 5 seq -->
	    		<!-- Start of 6 seq  -->
	    		<tr>
	    			<td style="padding:4px">6</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st16tm" name="st16tm" onchange="fnShowEmps(1,6,'wk16nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[6][1]); ?></select>
	    				<select class="form-control input-sm" id="st16mn" name="st16mn" onchange="fnShowEmps(1,6,'wk16nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[6][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn16tm" name="fn16tm" onchange="fnShowEmps(1,6,'wk16nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[6][3]); ?></select>
	    				<select class="form-control input-sm" id="fn16mn" name="fn16mn" onchange="fnShowEmps(1,6,'wk16nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[6][4]); ?></select><br>
	    				<span id="wk16nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk16nmOpt'><?php echo $dfEmpSetArr[1][6] ?></select></span>
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st26tm" name="st26tm" onchange="fnShowEmps(2,6,'wk26nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[12][1]); ?></select>
	    				<select class="form-control input-sm" id="st26mn" name="st26mn" onchange="fnShowEmps(2,6,'wk26nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[12][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn26tm" name="fn26tm" onchange="fnShowEmps(2,6,'wk26nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[12][3]); ?></select>
	    				<select class="form-control input-sm" id="fn26mn" name="fn26mn" onchange="fnShowEmps(2,6,'wk26nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[12][4]); ?></select><br>   	
	    				<span id="wk26nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk26nmOpt'><?php echo $dfEmpSetArr[2][12] ?></select></span>    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st36tm" name="st36tm" onchange="fnShowEmps(3,6,'wk36nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[18][1]); ?></select>
	    				<select class="form-control input-sm" id="st36mn" name="st36mn" onchange="fnShowEmps(3,6,'wk36nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[18][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn36tm" name="fn36tm" onchange="fnShowEmps(3,6,'wk36nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[18][3]); ?></select>
	    				<select class="form-control input-sm" id="fn36mn" name="fn36mn" onchange="fnShowEmps(3,6,'wk36nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[18][4]); ?></select><br>   	 
	    				<span id="wk36nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk36nmOpt'><?php echo $dfEmpSetArr[3][18] ?></select></span>   				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st46tm" name="st46tm" onchange="fnShowEmps(4,6,'wk46nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[24][1]); ?></select>
	    				<select class="form-control input-sm" id="st46mn" name="st46mn" onchange="fnShowEmps(4,6,'wk46nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[24][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn46tm" name="fn46tm" onchange="fnShowEmps(4,6,'wk46nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[24][3]); ?></select>
	    				<select class="form-control input-sm" id="fn46mn" name="fn46mn" onchange="fnShowEmps(4,6,'wk46nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[24][4]); ?></select><br>  
	    				<span id="wk46nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk46nmOpt'><?php echo $dfEmpSetArr[4][24] ?></select></span>	    				
	    			</td>
	    			<td style="padding:2px">
	    				<select class="form-control input-sm" id="st56tm" name="st56tm" onchange="fnShowEmps(5,6,'wk56nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[30][1]); ?></select>
	    				<select class="form-control input-sm" id="st56mn" name="st56mn" onchange="fnShowEmps(5,6,'wk56nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[30][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn56tm" name="fn56tm" onchange="fnShowEmps(5,6,'wk56nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[30][3]); ?></select>
	    				<select class="form-control input-sm" id="fn56mn" name="fn56mn" onchange="fnShowEmps(5,6,'wk56nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[30][4]); ?></select><br>  
	    				<span id="wk56nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk56nmOpt'><?php echo $dfEmpSetArr[5][30] ?></select></span> 	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st66tm" name="st66tm" onchange="fnShowEmps(6,6,'wk66nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[36][1]); ?></select>
	    				<select class="form-control input-sm" id="st66mn" name="st66mn" onchange="fnShowEmps(6,6,'wk66nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[36][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn66tm" name="fn66tm" onchange="fnShowEmps(6,6,'wk66nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[36][3]); ?></select>
	    				<select class="form-control input-sm" id="fn66mn" name="fn66mn" onchange="fnShowEmps(6,6,'wk66nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[36][4]); ?></select><br>	
	    				<span id="wk66nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk66nmOpt'><?php echo $dfEmpSetArr[6][36] ?></select></span>   	    				
	    			</td>
	    			<td style="padding:2px" bgcolor="#ffeb99">
	    				<select class="form-control input-sm" id="st76tm" name="st76tm" onchange="fnShowEmps(7,6,'wk76nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[42][1]); ?></select>
	    				<select class="form-control input-sm" id="st76mn" name="st76mn" onchange="fnShowEmps(7,6,'wk76nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[42][2]); ?></select> ~
	    				<select class="form-control input-sm" id="fn76tm" name="fn76tm" onchange="fnShowEmps(7,6,'wk76nm')"><?=fnGetSlct($tmCd, $dfTmSetArr[42][3]); ?></select>
	    				<select class="form-control input-sm" id="fn76mn" name="fn76mn" onchange="fnShowEmps(7,6,'wk76nm')"><?=fnGetSlct($mnCd, $dfTmSetArr[42][4]); ?></select><br> 
	    				<span id="wk76nm"><select class='form-control' style='margin-top:5px;width:126px;' name='wk76nmOpt'><?php echo $dfEmpSetArr[7][42] ?></select></span>  	    				
	    			</td>
	    		</tr>
	    		<!-- End of 6 seq --> 
	    	</tbody>
	    	<tfoot>
	    		<tr>
		    		<td colspan='8'  align="right">
		    			<button type='submit' class='btn btn-primary' id='btnUpdateSave' formaction='dbSaveConfirmRoster.php?Modify=Y'>Update</button>
		    			<button type="submit" class="btn btn-info" id="btnTmpSave" formaction="dbSaveTemporalRoster.php">Temporary Save</button>
						<button type="submit" class="btn btn-danger" id="btnCfmSave" formaction="dbSaveConfirmRoster.php?Modify=N">Confirm</button>
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