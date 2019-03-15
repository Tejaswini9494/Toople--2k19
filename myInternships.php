<?php
$page="myInternships";
$title="My Internships";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];

$query1 = "SELECT intern_applied_id, internship_id, user_id, comments, status FROM  too_intern_applied  WHERE intern_applied_id!='' AND user_id=$userid ORDER BY intern_applied_id DESC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($intern_applied_id, $internship_id, $user_id, $comments, $status);


include("header.php"); ?>

<h3 class="">My Internships</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Internship Name</td>
			<td>Internship ID</td>
			<td>Location</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>View</td>
			<td>Status</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {

		if($status=="SFA") {
			$statusText="Sending For Approval";
		} elseif($status=="A") {
			$statusText="Approved";
		} elseif($status=="D") {
			$statusText="Rejected";
		}

		$query2 = "SELECT ins_title, tsdate, tedate, joblocation FROM  too_internship  WHERE internship_id=$internship_id";
		//echo $query2;
		$statement2=$mysqli->prepare($query2);
		$statement2->execute();
		$statement2->store_result();
		$statement2->bind_result($ins_title, $tsdate, $tedate, $joblocation);
		$statement2->fetch();

		$ts_date=sysDBDateConvert($tsdate);
		$te_date=sysDBDateConvert($tedate);
		if($ts_date=='00/00/0000' || $ts_date=='//')
		{
		$ts_date="";
		} 
		if($te_date=='00/00/0000' || $te_date=='//')
		{
		$te_date="";
		} 
	?>

		<tr>
			<td><?php echo $i; ?></td>
			<td><a href="internshipView.php?insid=<?php echo $internship_id; ?>"><?php echo $ins_title; ?></a></td>
			<td><?php echo $intern_applied_id; ?></td>
			<td><?php echo $joblocation; ?></td>
			<td><?php echo $ts_date; ?></td>
		        <td><?php echo $te_date; ?></td>
			<td align="center"><?php if($status=='A') { ?><a href="myInternships_view.php?insaid=<?php echo $intern_applied_id; ?>" class="btn btn-success"><i class="fa fa-search"></i></a><?php } else { echo "-"; } ?></td>
			<td align="center">
			<?php if($status=='R') { ?><a href="#" onclick="load_reject('<?php echo $comments; ?>');"><?php echo $statusText; ?></a><?php } else { echo $statusText; } ?>
			</td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>
<div class="gap20"></div>

<?php include("modal_reject.php"); ?>
<?php include("footer.php"); ?>

<script>
function load_reject(val1) {
	//alert(val1);
	$('#modid').html(val1);
	$('#modal_reject').modal('show');
}
</script>
