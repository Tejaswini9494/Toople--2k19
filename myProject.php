<?php
$page="myProject";
$title="My Projects";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
if ($_SESSION["type"]=='CIN'){
	$userid=$usid;
}else {
	$userid=$_SESSION["userid"];
}

$query1 = "SELECT institution_project_assign_id, institution_project_id, institution_id, student_id FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND student_id=$userid ORDER BY institution_project_assign_id DESC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id, $institution_project_id, $institution_id, $student_id);
$nrows1=$statement1->num_rows();

include("header.php"); ?>

<h3 class="">My Projects</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Project Code</td>
			<td>Project Name</td>
			<td>Program ID</td>
			<td width="60%">Abstract</td>
			<td>View</td>
<!--			<td>Status</td>-->
		</tr>
	<?php $i=1; while($statement1->fetch()) {
		$query3 = "SELECT project_id FROM  institution_project  WHERE institution_project_id=$institution_project_id";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($proj_id);
		$statement3->fetch();

		$query4 = "SELECT project_id, name, proj_abstract FROM  too_projects  WHERE proj_id=$proj_id";
		$statement4=$mysqli->prepare($query4);
		$statement4->execute();
		$statement4->store_result();
		$statement4->bind_result($project_id1, $name1, $proj_abstract1);
		$statement4->fetch();
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $project_id1; ?></td>
			<td><?php echo $name1; ?></td>
			<td><?php echo $institution_project_assign_id; ?></td>
			<td><?php echo $proj_abstract1; ?></td>
			<td><a href="myProjectView.php?ipaid=<?php echo $institution_project_assign_id; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
<!--		        <td><?php include("in_range.php"); ?></td>-->
		</tr>
	<?php $i++; } if($nrows1<1) { ?>
		<tr class="text-center"><td colspan="6" >No Records Found</td></tr>
	<?php } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
