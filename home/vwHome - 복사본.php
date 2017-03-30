<?php
include('../resource/config.php');
//From session
include('dbFetchDefaultInfo.php');
include('../db/dbFunctions.php');
include('../common/commonFunctions.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<head>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/home.css">	
	<link rel="stylesheet" type="text/css" href="../css/menu.css">	
    <script src="../js/menuFrame.js"></script>   
	<script type="text/javascript" src="../js/commonJS.js"></script>
</head>

<body>
	<div class="container-fluid" >		
		<h3>Gloria' Jeans Lorne St Staff Room!!</h3>		
		<hr class="div_line">	
				
		<div class="row"> 
			<!-- Today Roster, images sliding -->
    		<div class="col-xs-4">    			
			<div>
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
    			</div>    			
			</div>	
			</div>	
				
    		<!-- Free Board -->
    		<div class="col-xs-6">
    	    	<div style="padding:10px;">
					<div style="padding-bottom:10px;">
						<div id="listTitle" style="display:inline;"> Free Board </div>
						<div style="display:inline;float:right;padding-right:15px;"><a style="font-size:20px;" onclick="parent.changeCSS('freeBoardA')" href="../freeBoardA/vwFreeboardList.php?flag=0">More</a></div>
					</div>
					
					
					<?php
						$resultFreeBoard = fnSelectFreeBoardData();
					?>
					<table style="table-layout:fixed;width:100%;" >
						<tr height="32px" style="font-weight:bold; text-align:center; background:url(../img/title_bg.gif) repeat-x;">
							<td class="tbl_bT tbl_bB" width="15%">Category</td>
							<td class="tbl_bT tbl_bB" width="65%">Title</td>
							<td class="tbl_bT tbl_bB" width="20%">Date</td>
						</tr>
						<?php
								$resultFreeBoard = fnSelectFreeBoardData();
								if(mysqli_num_rows($resultFreeBoard)>0) {
									while($rowFreeBoard = mysqli_fetch_array($resultFreeBoard)){
						?>
						<tr class="tbl_bB" onmouseover="this.style.backgroundColor='#d4cfba'" onmouseout="this.style.backgroundColor='#F3F2EC'" style="background-color:#F3F2EC;cursor:pointer;" height="30px">
							<td align="center" width="15%" onclick="parent.changeCSS('freeBoard'); goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name; ?>', '<?php echo $EmpID; ?>')"><?php echo $rowFreeBoard[1] ?></td>
							<td width="45%" style="padding-left:5px;padding-right:5px" onclick="parent.changeCSS('freeBoard'); goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name; ?>', '<?php echo $EmpID; ?>')"><?php setLockinTitle($rowFreeBoard[7], $rowFreeBoard[2], $rowFreeBoard[4], $Name); ?></td>
							<td align="center" width="20%" onclick="parent.changeCSS('freeBoard'); goPostDetail(<?php echo $rowFreeBoard[0]?>, '<?php echo $rowFreeBoard[4]?>', <?php echo $rowFreeBoard[7]?>, '<?php echo $Name; ?>', '<?php echo $EmpID; ?>')">
							<?php
									$date = convertDatetoString($rowFreeBoard[5], 'home');
									echo $date;
								?>
							</td>
						</tr>
						<?php
									}
								}else {
						?>
						<tr class="tbl_bB" style="background-color:#e5e5e5;cursor:pointer;" height="30px">
							<td align="center" colspan="6">No Free Board Record</td>
						</tr>
						<?php
							}
						?>
					</table>
				</div>
			</div>
		</div>  <!-- Finish Row -->		
		<hr class="div_line">
	</div>
</body>
</html>