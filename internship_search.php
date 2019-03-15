<?php
$page="internship_search";
$title="Internship List";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];

if(isset($apply_submit)) {

	//echo $apply_submit;
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


$query1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id!='' AND status='A' $qry ORDER BY internship_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);


include("header.php"); ?>
<div class="gap20"></div>
<div class="row">
<div class="col-md-3">
	<form id="form_search" method="POST" enctype="multipart/form-data">
		<h3>Search Filters</h3>
		<div class="gap10"></div>
		<div class="searchBox">
			<div class="form-group">
				<label>Top Locations</label>
				<input type="text" name="joblocation" id="joblocation" class="form-control" value="<?php echo $joblocation; ?>">
			</div>
		</div>
		<div class="gap20"></div>

		<div class="searchBox">
			<div class="form-group">
				<label>Work Type</label>
				<input type="text" name="worktype" id="worktype" class="form-control" value="<?php echo $worktype; ?>">
			</div>
		</div>
		<div class="gap20"></div>
<!--
		<div class="searchBox">
			<div class="form-group">
				<label>Employer Type</label>
				<select name="usertype" id="usertype" class="form-control" required="required">
					<option value="">Select</option>		
					<option value="1">All</option>
					<option value="2">Local</option>
					<option value="3">Remote</option>
				</select>
			</div>
		</div>
		<div class="gap20"></div>
-->
		<div class="searchBox">
			<div class="form-group">
				<label>Compensation</label>
				<input type="text" name="compensation" id="compensation" class="form-control" value="<?php echo $compensation; ?>">
			</div>
		</div>
		<div class="gap20"></div>

		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="internship_search.php" class="btn submitM cancelBtn">Cancel</a>
		<div class="gap1"></div>
	</form>
</div>
<div class="gap30 yes800"></div>

<div class="col-md-9">
<h3>Internship List</h3>
<div class="gap10"></div>
<form id="form_apply" method="POST" enctype="multipart/form-data">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Internship ID</td>
			<td>Internship Name</td>
			<td>Location</td>
			<td>Start Date</td>
			<td>End Date</td>
			<td>View</td>
			<td>Action</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {
		$tsdate=sysDBDateConvert($tsdate);
		$tedate=sysDBDateConvert($tedate);
		$doi=sysDBDateConvert($doi);

		$query4 = "SELECT internship_id FROM  too_intern_applied  WHERE user_id=$userid AND internship_id=$internship_id";
		$statement4=$mysqli->prepare($query4);
		$statement4->execute();
		$statement4->store_result();
		$statement4->bind_result($internship_id11);
		$appNos=$statement4->num_rows();

	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $internship_id; ?></td>
			<td><?php echo $ins_title; ?></td>
			<td><?php echo $joblocation; ?></td>
			<td><?php echo $tsdate; ?></td>
		        <td><?php echo $tedate; ?></td>
			<td><a href="internshipView.php?insid=<?php echo $internship_id; ?>"><i class="fa fa-search"></i></a></td>
			<td align="center"><?php if($appNos>0) { echo "Applied"; } else { ?><button type="submit" id="search_submit" name="apply_submit" value="<?php echo $internship_id; ?>">Apply</button><?php } ?></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>
</form>
</div>
<div class="gap20"></div>
</div>
<?php include("footer.php"); ?>
