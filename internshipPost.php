<?php
$page="internshipPost";
$title="My Internships";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

if($did!='') {
	$mysqli->query("DELETE FROM too_internship WHERE internship_id='$did' ");
}

$sql1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id!='' ORDER BY internship_id DESC";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);

include("header.php"); ?>
<h3 class="pull-right"><a href="internshipAdd.php" class="btn btn-primary">Add</a></h3>
<h3 class="">My Internships</h3>
<div class="gap30"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Edit</td>
			<td>Intership ID</td>
			<td>Internship Name</td>
			<td>Location</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>Status</td>
			<td>Delete</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {
		$ts_date=sysDBDateConvert($tsdate);
		$te_date=sysDBDateConvert($tedate);
		$doi=sysDBDateConvert($doi);
if($status=='A'){
$status1='Approved';
}
elseif($status=='D'){
$status1='Rejected';
}
elseif($status=='SFA'){
$status1='Sending For Approval';
}

	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><a href="internshipAdd.php?insid=<?php echo $internship_id; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
			<td><a href="internshipView.php?insid=<?php echo $internship_id; ?>"><?php echo $internship_id; ?></a></td>
			<td><?php echo $ins_title; ?></td>
			<td><?php echo $joblocation; ?></td>
			<td><?php echo $ts_date; ?></td>
		        <td><?php echo $te_date; ?></td>
			<td><?php echo $status1; ?></td>
			<td align="center"><a class="delete" href="internshipPost.php?did=<?php echo $internship_id; ?>"><i class="fa fa-trash"></i></a></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
$(document).ready(function()
{
$('.delete').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
});
</script>
