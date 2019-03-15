<?php
$page="internship_matches";
$title="Internship Matches";

include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];

if(isset($apply_submit)) {

	
	/*
	$query3 = "SELECT created_by FROM  too_internship  WHERE internship_id=$apply_submit";
	$statement3=$mysqli->prepare($query3);
	$statement3->execute();
	$statement3->store_result();
	$statement3->bind_result($internshiper_id);
	*/
	$status="SFA";
	$query2 = "INSERT INTO  too_intern_applied (internship_id, user_id, created_by, added_date, status) VALUES(?,?,?, now(), ?)";
	$statement2= $mysqli->prepare($query2);
	$statement2->bind_param('iiis', $apply_submit, $userid, $userid, $status);
	$statement2->execute();

	header("location:myInternships.php");
	exit;
}


if(isset($search_submit)) {

	if($joblocation!='' || $worktype!='' || $compensation!='') {
		$qry.=" AND joblocation LIKE '%".$joblocation."%' AND worktype LIKE '%".$worktype."%' AND compensation LIKE '%".$compensation."%'";
	} else {
		$qry='';
	}
}

$query1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id!='' $qry ORDER BY internship_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);

include("header.php"); ?>

<h3>Internship Matches</h3>
<div class="gap20"></div>
<form id="form_apply" method="POST" enctype="multipart/form-data">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Intership ID</td>
			<td>Internship Name</td>
			<td>Location</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>View</td>
			<td>Action</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {


		$query4 = "SELECT internship_id FROM  too_intern_applied  WHERE user_id=$userid AND internship_id=$internship_id";
		$statement4=$mysqli->prepare($query4);
		$statement4->execute();
		$statement4->store_result();
		$statement4->bind_result($internship_id11);
		$appNos=$statement4->num_rows();
		//echo "1#<br>";
		$query2 = "SELECT s_program FROM  student_qualifications  WHERE user_id='$userid' AND s_program='$ecprogram'";
		$statement2=$mysqli->prepare($query2);
		$statement2->execute();
		$statement2->store_result();
		$statement2->bind_result($s_program);

		while($statement2->fetch()) {
		//echo "2#<br>";
		$tsdate=sysDBDateConvert($tsdate);
		$tedate=sysDBDateConvert($tedate);
		$doi=sysDBDateConvert($doi);



		

	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $internship_id; ?></td>
			<td><?php echo $ins_title; ?></td>
			<td><?php echo $joblocation; ?></td>
			<td><?php echo $tsdate; ?></td>
		        <td><?php echo $tedate; ?></td>
			<td><a href="internshipView.php?insid=<?php echo $internship_id; ?>"><i class="fa fa-search"></i></a></td>
			<td align="center"><?php if($appNos>0) { echo "Applied"; } else { ?><button type="submit" id="apply_submit" name="apply_submit" value="<?php echo $internship_id; ?>">Apply</button><?php } ?></td>
		</tr>
	<?php $i++; } } ?>
	</table>
</div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
