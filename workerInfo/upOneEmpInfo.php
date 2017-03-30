<?php
include('../resource/config.php');
//From session
include('../db/dbDefaultSelect.php');
include('dbSelectEmployee.php');

?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	<title>Detail Roster</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
    <script src="../js/setRoster.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/commonCSS.css">
    
</head>

<body style="height:95%">		
	<div class="container-fluid">	
	<h3><?php echo $SearchEmpNm ?> Infomation</h1></h3>			
	<hr class="div_line">	
		
	<div class="row">
	  	<div class="col-md-4">&nbsp;</div>
	  	<div class="col-md-4" style="background:rgb(243,242,236);padding:5px;">		
			<form method="post" action="dbSaveEmp.php" id="updatePernalInfo">				
				<input type="hidden" id='flag'       name='flag'       value='U' />	
				<input type="hidden" id='o_upNm'     name='o_upNm'     value='<?php echo $t_Name ?>'   />
				<input type="hidden" id='o_upStat'   name='o_upStat'   value='<?php echo $t_OnOff ?>'   />	
				<input type="hidden" id='t_upStat'   name='t_upStat'   value='<?php echo $t_OnOff ?>'   />	
				<input type="hidden" id='o_upStYmd'  name='o_upStYmd'  value='<?php echo $t_Startdt ?>' />	
				<input type="hidden" id='t_upStYmd'  name='t_upStYmd'  value='<?php echo $t_Startdt ?>' />	
				<input type="hidden" id='o_upExpYmd' name='o_upExpYmd' value='<?php echo $t_Expired ?>' />	
				<input type="hidden" id='t_upExpYmd' name='t_upExpYmd' value='<?php echo $t_Expired ?>' />
								
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Name:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upNm" name="upNm" style="width:98%" value="<?php echo $t_Name ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>ID:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upId" name="upId" style="width:98%" value="<?php echo $t_EmpID ?>" readOnly >
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>PW:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upPw" name="upPw" style="width:98%" value="<?php echo $t_EmpPw ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Phone:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upPhn" name="upPhn" style="width:98%" value="<?php echo $t_PhoneNo ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Level:</h4></label><br>
					<div class="col-mid-10">
						<select class="form-control" id="upLvl" name="upLvl" ><option value="">--</option>							
						<?php
				        	foreach($levelCd as $mnList){ ?>
				    		<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_Level){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				    	<?php } ?>	
						</select>
					</div>
				</div>					
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Status:</h4></label><br>
					<div class="col-mid-10">
						<input type="text" class="inputFrm" id="upStat" name="upStat" style="width:98%" value="<?php echo $t_Status ?>" readOnly >
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Start Date:</h4></label><br>
					<div class="col-mid-10">
						<select class="inputFrm" id="upStDt" name="upStDt" >						
						<?php foreach($dateCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_StDay){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="upStMn" name="upStMn" >						
						<?php foreach($monthCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_SrtMonth){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="upStYr" name="upStYr" >						
						<?php foreach($yearCd as $mnList){ ?>
				        	<option value="<?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_SrtYear){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-mid-2 control-label"><h4>Expired Date:</h4></label><br>
					<div class="col-mid-10">							
						<select class="inputFrm" id="upExpDt" name="upExpDt" disabled="disabled" ><option value="">--</option>	
						<?php foreach($dateCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_ExpDay){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="upExpMn" name="upExpMn" disabled="disabled" ><option value="">--</option>					
						<?php foreach($monthCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_ExpMonth){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>
						<select class="inputFrm" id="upExpYr" name="upExpYr" disabled="disabled" ><option value="">--</option>							
						<?php foreach($yearCd as $mnList){ ?>
				        	<option value=" <?php echo $mnList[0] ?>" <?php if($mnList[0]==$t_ExpYear){ ?> selected <?php } ?>> <?php echo $mnList[1] ?></option>
				        <?php } ?>	
						</select>							
						<button type="button" class="btn btn-warning" data-dismiss="modal" onClick="fnSetResign()">Resign</button>
					</div>
				</div>
				<br>
				<div align="right">
					<button type="button" class="btn btn-success" onClick="fnSubmitSave()"><span class="glyphicon glyphicon-ok"></span>Save</button>
					<a href="vwWorkerInfo.php">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
						Cancel
					</button>
					</a>
				</div>
				
			</form>
		</div>
  		<div class="col-md-4">&nbsp;</div>	
  	</div>  	
	<hr class="div_line">	
	</body>
	
<script>
	
function fnSetResign()
{ 
	$('#upExpDt').removeAttr('disabled'); 
	$('#upExpMn').removeAttr('disabled'); 
	$('#upExpYr').removeAttr('disabled'); 
	
} 

function fnSubmitSave(){
	
	var inExtDt = $('#upExpYr').val().trim()+$('#upExpMn').val().trim()+$('#upExpDt').val().trim();
	var inStDt  = $('#upStYr').val().trim() +$('#upStMn').val().trim() +$('#upStDt').val().trim();
	
	if(($('#upStat').val()=='On')&& (inExtDt!='')){		
		//values check
		if($('#upExpDt').val()=='') {alert('Not fulfil the expired day value!'); return;}
		else if($('#upExpMn').val()=='') {alert('Not fulfil the expired month value!'); return;}
		else if($('#upExpYr').val()=='') {alert('Not fulfil the expired year value!'); return;}
		
		if(confirm('Are you sure '+ $(upNm).val() + ' to resign?')){	
			$('#t_upStYmd').val(inStDt);
			$('#t_upExpYmd').val(inExtDt);	
			$('#t_upStat').val('0');
			document.getElementById('updatePernalInfo').submit();
		}
		else return;
	}
	else {
		if(confirm('Are you sure to update?')){			
			$('#t_upStYmd').val(inStDt);
			$('#t_upExpYmd').val(inExtDt);	
			document.getElementById('updatePernalInfo').submit();
		}
		else return;
	}			
}

</script>	
	
</html>