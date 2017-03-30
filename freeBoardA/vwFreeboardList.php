<?php
include('../resource/config.php');
//include('dbSelectWeeklyList.php');
include('dbSelectPostsList.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML  4.0 Transitional//EN">
<html lang="en" style="height:100%">
<head>
	<title>Weekly Roster List</title>
	<?php include('../resource/resource.php'); ?>
	<link rel="stylesheet" type="text/css" href="../css/setRoster.css">	
</head>

<body>
	<div class="container-fluid">
		<h3>Free Bulletin Board </h3>
		<form  id='search'>
			<hr class="div_line">
			
			<div class="row">
				<div class="col-xs-4">&nbsp;</div>	
				<div class="col-xs-4"><input type="text" class="form-control" id="searchKey" name="searchKey" style="width:100%"></div>	
				<div class="col-xs-4"><button type="button" class="btn btn-warning" onclick="fnSearchPost();">Search</button></div>
			</div>
			
			<hr class="div_line">
			
			<div align="center">
				<div style="text-align:right;font-size:18px;font-weight:bold;max-width:1000px;">
					<a href="vwNewFreeBulletin.php?Seq=&Flg=I"><button type="button" class="btn btn-danger">New Post</button></a>
				</div>		
				<br>
				<div style="text-align:right;padding-right:20px;padding-bottom:10px;font-size:18px;font-weight:bold;max-width:1000px;">
					Total : <?php echo $total_no ?>
				</div>			
		    	<div class="table-responsive" id='dispEmpInfo'>
				<table class="table table-hover" style="background:rgb(243,242,236);max-width:1000px;" >
				    <thead align="center">
				    <tr>
				    	<th>No</th>
						<th>Category</th>
				        <th>Title</th>
				        <th>Writer</th>
				        <th>Posted</th>	
				        <th>Views</th>
				    </tr>
				    </thead>
				    <tbody>
			    	<?php
						for($i=0; $i< $arrLength ; $i++){
			    	?>
				   	<tr onClick="location.href='vwPostDetail.php?Flg=U&Seq='+<?php echo $dataList[$i][0] ?>">
				        <td><?php echo $dataList[$i][0] ?></td>
				        <td><?php echo $dataList[$i][1] ?></td>
				        <td align="left"><?php echo $dataList[$i][2] ?> [<?php echo $dataList[$i][7] ?>]</td>
				        <td><?php echo $dataList[$i][3] ?></td>
				        <td><?php echo $dataList[$i][4] ?></td>
				        <td><?php echo $dataList[$i][6] ?></td>
				    </tr>
			    	<?php
			    		$cur_num --;
			    		}
			    	?>
				    </tbody>
				    <tfoot>
				    	<tr>
				    		<td colspan='6' align='center'>
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
								    echo "<a href='vwSetRoster.php?page=1'>[First]</a>&nbsp;";
								}
								//go Previous
								if($page > 1) {
								    $go_page=$page-1;
								    echo "<a href='vwSetRoster.php?page=$go_page'>[<<]</a>";
								}
								//page Link
								for ($page_link=$first+1;$page_link<=$last;$page_link++) {
								   if($page_link==$page) echo "<font color=green><b>$page_link</b></font>";
								   else    echo "<a href='vwSetRoster.php?page=$page_link'>[$page_link]</a>";
								}
								//go Next
								if($total_page > $page) {
								    $go_page=$page+1;
								    echo "<a href='vwSetRoster.php?page=$go_page'>[>>]</a>";
								}
								//go Last
								if($block < $total_block) {
								    $next=$last+1;
								    echo "<a href='vwSetRoster.php?page=$total_page'>[Last]</a></p>";
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

<script>
	function fnSearchPost(){
		var s = $('#searchKey').val();  //01-08-2016
		location.href='vwFreeboardList.php?searchKey='+s;
	}
</script>

</html>