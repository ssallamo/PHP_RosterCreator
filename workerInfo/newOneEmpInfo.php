<?php
include('../resource/config.php');
//From session
include('../db/dbDefaultSelect.php');
//get default today
/*
echo  $mon_day .'<br>';
echo  $mon_mon .'<br>';
echo  $mon_yr  .'<br>';
echo  $sun_day .'<br>';
echo  $sun_mon .'<br>';
echo  $sun_yr  .'<br>';
*/
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	<title>Detail Roster</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
    <script src="../js/setRoster.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
    
</head>

<body style="height:95%" >		
	<div class="container-fluid">	
	<h3>New Employee Infomation</h3>			
	<hr class="div_line">	
		
	<div class="row">
	  	<div class="col-md-4">&nbsp;</div>
	  	<div class="col-md-4" style="background:rgb(243,242,236);padding:5px;">		
			<form method="post" action="dbSaveEmp.php" id="newPernalInfo">				
				<input type="hidden" id='flag'       name='flag'       value='I' />		
				<input type="hidden" id='o_upStat'  name='o_upStat'  value='1' />	
				<input type="hidden" id='t_upStat'  name='t_upStat'  value='1' />
				<input type="hidden" id='o_upStYmd'  name='o_upStYmd'  value='' />	
				<input type="hidden" id='t_upStYmd'  name='t_upStYmd'  value='' />
				<input type="hidden" id='o_upExpYmd' name='o_upExpYmd' value='' />	
				<input type="hidden" id='t_upExpYmd' name='t_upExpYmd' value='' />
								
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Name:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upNm" name="upNm" style="width:98%" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>ID:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upId" name="upId" style="width:98%;background-color:#e3f7f1;" value="" readOnly >
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>PW:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upPw" name="upPw" style="width:98%" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Phone:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upPhn" name="upPhn" style="width:98%" value="">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Level:</h4></label><br>
					<div class="col-mid-10">
						<select class="form-control" id="upLvl" name="upLvl"  style="width:98%" ><option value="">--</option>							
						<?php
				        	foreach($levelCd as $mnList){ ?>
				    		<option value="<?php echo $mnList[0] ?>"> <?php echo $mnList[1] ?></option>
				    	<?php } ?>	
						</select>
					</div>
				</div>					
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Status:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="newStat" name="newStat" style="width:98%;background-color:#e3f7f1;" value="On" readOnly >
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Start Date:</h4></label><br>
					<div class="col-mid-10">
						<select class="inputFrm" id="newStDt" name="newStDt" >						
						<?php foreach($dateCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$mon_day){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="newStMn" name="newStMn" >						
						<?php foreach($monthCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$mon_mon){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="newStYr" name="newStYr" >						
						<?php foreach($yearCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$mon_yr){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Expired Date:</h4></label><br>
					<div class="col-mid-10">							
						<select class="inputFrm" id="newExpDt" name="newExpDt" disabled="disabled" ><option value="">--</option>	
						<?php foreach($dateCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>"> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="newExpMn" name="newExpMn" disabled="disabled" ><option value="">--</option>					
						<?php foreach($monthCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>"> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="newExpYr" name="newExpYr" disabled="disabled" ><option value="">--</option>							
						<?php foreach($yearCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>"> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>							
					</div>
				</div>
				<br>
				<div align="right">
					<button type="button" class="btn btn-success" onClick="fnSubmitSave()"><span class="glyphicon glyphicon-ok"></span>Save</button>
					<a href="vwWorkerInfo.php">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
						Cancel
					</button>
				</div>
				
			</form>
		</div>
  		<div class="col-md-4">&nbsp;</div>	
  	</div>  	
	<hr class="div_line">	
	</body>
	
<script>
	
	
function fnSubmitSave(){
	
	var inExtDt = $('#newExpYr').val().trim()+$('#newExpMn').val().trim()+$('#newExpDt').val().trim();
	var inStDt  = $('#newStYr').val().trim() +$('#newStMn').val().trim() +$('#newStDt').val().trim();
	
	if($('#upNm').val()=='') {alert('Employee name is required!'); return;}
	//else if($('#upId').val()=='') {alert('Employee ID is required'); return;}
	else if($('#upPw').val()=='') {alert('Employee Password is required'); return;}
	else if($('#upLvl').val()=='') {alert('Employee Level is required'); return;}
	else if($('#newStDt').val()=='') {alert('Not fulfil the Start day value!'); return;}
	else if($('#newStMn').val()=='') {alert('Not fulfil the Start month value!'); return;}
	else if($('#newStYr').val()=='') {alert('Not fulfil the Start year value!'); return;}

	if(confirm('Are you sure '+ $(upNm).val() + ' to register?')){	
		$('#o_upStYmd').val(inStDt);	
		$('#t_upStYmd').val(inStDt);
		document.getElementById('newPernalInfo').submit();
	}
	else return;
	
			
}
</script>	
	
</html>