<?php
$page="myTransactionMEN";
$title="My Transaction Mentor";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
if ($_SESSION["type"]=='SPC'){
	$user_id=$uridC;
}else {
	$user_id=$_SESSION["userid"];
}

		$sql = "SELECT project_id,name,paid_amt,DATE_FORMAT(added_date, '%d/%m/%Y') as date FROM too_projects  WHERE created_by='$user_id' ORDER BY proj_id DESC";
		$statement=$mysqli->prepare($sql);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($project_id,$proj_name,$total_amt,$date);
		$nrows=$statement->num_rows();

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
			<td>Total Amount</td>
		</tr>
<?php
$i=1;
while($statement->fetch()) { 
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $date;?></td>
			<td><?php echo $project_id;?></td>
			<td><?php echo $proj_name;?></td>
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
