<?php
include('../resource/config.php');
include('dbFetchDefaultInfo.php');
include('../freeBoardA/dbSelectPostsListInHomePage.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML  4.0 Transitional//EN">
<html lang="en" style="height:100%">
<head>
	<title>Weekly Roster List</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
</head>

<body>
	<div align="center">
	<div class="container-fluid">
		<h3  align="left">Gloria' Jeans Lorne St Staff Room!!</h3>	
		<form  id='search'>
			<hr class="div_line">			
			
			<div style="max-width:1000px;>
				<div class="row" > 			
			<!-- Today Roster, images sliding -->
	    		<div class="col-sm-5">    			
				<div>
					<div style="padding-bottom:10px;" align="left">
							<div style="display:inline;font-size:large;color:darkblue;"> Today Roster </div>
					</div>	
	    			<table class="table table-bordered" style="background:rgb(243,242,236);">
		    		<thead >
			    	  	<tr>
							<th style="text-align:center;"><?php echo $todayTimeTable[0][0] ?></th>
							<th style="text-align:center;"><?php echo $todayTimeTable[0][1] ?></th>
							<th style="text-align:center;"><?php echo $todayTimeTable[0][2] ?></th>
			    		</tr>
		    		</thead>
		    		<tbody align="center">  
			    		<?php
							for($i=1; $i<7 ; $i++){	    
			    		?>
			    		<tr>                   
			    			<td><?php echo $todayTimeTable[$i][0] ?></td>
			    			<td><?php echo $todayTimeTable[$i][1] ?></td>
			    			<td><?php echo $todayTimeTable[$i][2] ?></td>
			    		</tr>
			    		<?php
			    			}
			    		?>
		    		</tbody>
		    		</table>	    		
	    			<!-- images sliding -->
		    		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  			<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
						<!-- slide 1,2,3-->
							<div class="item active"><img src="../img/cafe1.png" style="width:100%" alt="First slide"></div>
							<div class="item"><img src="../img/cafe2.png" style="width:100%" data-src="" alt="Second slide"></div>
							<div class="item"><img src="../img/cafe3.png" style="width:100%" data-src="" alt="Third slide"></div>
			  			</div>
			  			<br>
	    			</div>    			
				</div>	
				</div>	
				
	    		<!-- Free Board -->
	    		<div class="col-sm-7">
	    	    	<div >
						<div style="padding-bottom:10px;"  align="left">
							<div style="display:inline;font-size:large;color: sandybrown;"> Free Board </div>
						</div>					
						<div align="center">
				    	<div class="table-responsive" id='dispEmpInfo'>
						<table class="table table-hover" style="background:rgb(243,242,236);max-width:1000px;" >
						    <thead align="center">
						    <tr>
								<th>Category</th>
						        <th>Title</th>
						        <th>Posted</th>	
						    </tr>
						    </thead>
						    <tbody>
					    	<?php
								for($i=0; $i< $arrLength ; $i++){
					    	?>
						   	<tr onClick="location.href='../freeBoardA/vwPostDetail.php?Flg=U&Seq='+<?php echo $dataList[$i][0] ?>">
						        <td><?php echo $dataList[$i][1] ?></td>
						        <td align="left"><?php echo $dataList[$i][2] ?> [<?php echo $dataList[$i][7] ?>]</td>
						        <td><?php echo $dataList[$i][4] ?></td>
						    </tr>
					    	<?php
					    		$cur_num --;
					    		}
					    	?>
						    </tbody>
						</table>
						</div>
						
						</div>
					</div>
				</div>
			</div>  <!-- Finish Row -->	
				
			</div>
		</form>
	</div>
</div>
</body>

<script>
	function fnSearchPost(){
		var s = $('#searchKey').val();  //01-08-2016
		location.href='vwFreeboardList.php?searchKey='+s;
	}
	
	function changeCSS(target) {
		var box_selected = document.getElementById(target);
		box_selected.className = "current";
		if(current_selected != target) {
			var box_unselected = document.getElementById(current_selected);
			box_unselected.className = "";
			current_selected = target;
		}
	}
</script>

</html>