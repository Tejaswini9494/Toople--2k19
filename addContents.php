<?php
$page="addContents";
$title="My Contents";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);
session_start();
if ($_SESSION["type"]=='SPC'){
	$user_id=$usid;
}else {
	$user_id=$_SESSION["userid"];
}

$sql2 = "SELECT algo_id, algorithm_id, name, objectives, status FROM  too_algorithm  WHERE created_by='$user_id' ORDER BY algo_id DESC";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($algo_id, $algorithm_id, $name, $objectives, $status);

$sql3 = "SELECT proj_id, project_id, name, proj_abstract, status FROM  too_projects  WHERE created_by='$user_id' ORDER BY proj_id DESC";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($proj_id1, $project_id1, $name1, $proj_abstract1, $status1);


include("header.php"); ?>

<h3 class="">My Contents
<?php if($_SESSION["type"]!='SPC'){ ?>
<span class="pull-right"><a href="addContent.php" class="btn submitM">Add</a></span>
<?php } ?>
</h3>
<div class="gap30"></div>

<h4 class="">My Projects</h4>
<div class="gap20"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Edit</td>
			<td>Project Code</td>
			<td>Product Name</td>
			<td width="50%">Details</td>
			<td>View</td>
			<td>Status</td>
		</tr>
	<?php $j=1; while($statement3->fetch()) { 
		if($status1=="H") {
			$statusText1="Hold";
		} elseif($status1=="SFA") {
			$statusText1="Sending For Approval";
		} elseif($status1=="A") {
			$statusText1="Approved";
		} elseif($status1=="D") {
			$statusText1="Rejected";
		}
	?>
		<tr>
			<td><?php echo $j; ?></td>
			<td><a href="addContent.php?pt=PT1&pid=<?php echo $proj_id1; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			<td><?php echo $project_id1; ?></td>
			<td><?php echo $name1; ?></td>
			<td><?php echo $proj_abstract1; ?></td>
			<td><a href="tooprojects_view.php?pid=<?php echo $proj_id1; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
		        <td><?php echo $statusText1; ?></td>
		</tr>
	<?php $j++; } ?>
	</table>
</div>
<div class="gap30"></div>

<h4 class="">My Algorithms</h4>
<div class="gap20"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Edit</td>
			<td>Algorithm Code</td>
			<td>Algorithm Name</td>
			<td width="50%">Details</td>
			<td>View</td>
			<td>Status</td>
		</tr>
	<?php $i=1; while($statement2->fetch()) { 
		if($status=="SFA") {
			$statusText="Sending For Approval";
		} elseif($status=="A") {
			$statusText="Approved";
		} elseif($status=="D") {
			$statusText="Rejected";
		}
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><a href="addContent.php?pt=PT2&aid=<?php echo $algo_id; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			<td><?php echo $algorithm_id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $objectives; ?></td>
			<td><a href="tooAlgorithms_view.php?aid=<?php echo $algo_id; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
		        <td><?php echo $statusText; ?></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
