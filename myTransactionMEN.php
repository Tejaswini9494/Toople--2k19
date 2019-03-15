<?php
$page="myTransactionMEN";
$title="My Transaction Mentor";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
if ($_SESSION["type"]=='SPM'){
	$user_id=$uridM;
}else {
	$user_id=$_SESSION["userid"];
}

		$query1 = "SELECT program_id,paid_amt,pending_amt,total_amt,DATE_FORMAT(created_on, '%d/%m/%Y') as date FROM mentor_transaction WHERE mentor_id='$user_id'";
		$statement1=$mysqli->prepare($query1);
		$statement1->execute();
		$statement1->store_result();
		$statement1->bind_result($program_id,$paid_amt,$pending_amt,$total_amt,$date);
		$nrows=$statement1->num_rows();

include("header.php"); ?>

<h3 class="">My Transaction
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.NO</td>
			<td>Date</td>
			<td>Project ID</td>
			<td>Project Name</td>
			<td>Received Amount</td>
			<td>Pending Amount</td>
			<td>Total Amount</td>
		</tr>
<?php
$i=1;
while($statement1->fetch()) { 
$query2 = "SELECT project_id,name FROM too_projects WHERE proj_id='$program_id'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($project_id,$proj_name);
$statement2->fetch();
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $project_id;?></td>
			<td><?php echo $proj_name;?></td>
			<td><?php echo numbtoDesi($paid_amt);?></td>
			<td><?php echo numbtoDesi($pending_amt);?></td>
			<td><?php echo numbtoDesi($total_amt);?></td>
					
		</tr>
<?php $i++; } ?>

			<?php if($nrows<1) { ?>
				<tr class="text-center"><td colspan="6" >No Records Found</td></tr>
			<?php } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
