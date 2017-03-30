<?php
include('./resource/config.php');
//session_start();
if(!isset($_SESSION['EmpID']) || !isset($_SESSION['Name'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.php'>";
	exit;
}
$EmpID = $_SESSION['EmpID'];
$Name = $_SESSION['Name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>	
    <title>Roster Creator</title>    
	<?php
		include('./resource/resource.php');
	?>
    <script src="./js/menuFrame.js"></script>   
	<link rel="stylesheet" type="text/css" href="./css/menu.css">
	
	
	
</head>

<body>	
<div class="container-fluid">
	<div class="row" >
    	<div class="col-xs-12 col-sm-12 col-md-12">
    		<table>
    		<tr>
    			<td>
    				<marquee behavior="alternate" scrollAbount="8">Hello! <?php echo $Name ?> in Gloria Jeans' Lorne ST !! </marquee>
    			</td>
    			<td class="logout">
    				<a href='logout.php'><img src="./img/logout.gif"/></a>
    			</td>
    		</tr>
    		</table>
    	</div>
	</div>	
	
	<div class="row" style="BACKGROUND:#2d2929;">    	  	
    	<div class="col-md-6" style="PADDING-TOP: 10px;" >
			<a href="home/vwHome.php" target="sexybody"><img src="img/menuLogo.png" /></a>
		</div>		
		<div class="col-md-6" id="header">
			<ul class="nav nav-tabs pull-right">
                <li id="home"       class="current" onClick="changeCSS('home')"><a href="home/vwHome.php" target="sexybody">Home<br>&nbsp;</a></li>
				<li id="setRoster"  class="" onClick="changeCSS('setRoster')"><a href="./setRoster/vwSetRoster.php" target="sexybody">Set<br>Roster</a></li>
				<li id="record"     class="" onClick="changeCSS('record')"><a href="./tradingRecord/vwTradingRecord.php?flag=0" target="sexybody">Trading<br>Record</a></li>
				<li id="freeboardA"  class="" onClick="changeCSS('freeboardA')"><a href="./freeBoardA/vwFreeboardList.php" target="sexybody">Free<br>Board</a></li>
				<?php if($EmpID=='0001'||$EmpID=='0008'){/* Daniel, Lim */ ?> 
				<li id="calculation"  class="" onClick="changeCSS('calculation')"><a href="./calculator/vwCalRoster.php" target="sexybody">Working<br>Hours</a></li>
				<li id="workerInfo" class="" onClick="changeCSS('workerInfo')"><a href="./workerInfo/vwWorkerInfo.php" target="sexybody">Worker's<br>Infomation</a></li>
				<?php } ?>
			</ul>
		</div>
    </div>
  	<div class="embed-responsive embed-responsive-4by3" style="width:100%;min-height:750px;">
		<iframe class="embed-responsive-item" src="home/vwHome.php"  name="sexybody"  style="width:100%;"  scrolling="yes" frameborder="0"></iframe>
	</div> 
    
</div>
</body>
</html>