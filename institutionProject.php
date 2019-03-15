<?php
$page="myProject";
$title="My Projects";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
//echo $user_id;
$sql1 = "SELECT institution_project_id,project_id FROM institution_project WHERE user_id='$user_id' AND assigned_status=''";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_id,$project_id);
$nrows1=$statement1->num_rows();

$sql1s = "SELECT institution_project_id,project_id FROM institution_project WHERE user_id='$user_id' AND assigned_status='Y'";
$statement1s=$mysqli->prepare($sql1s);
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($institution_project_id1,$project_id1);
$nrows1s=$statement1s->num_rows();

include("header.php"); 


?>

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
			<td>Assign</td>
		</tr>
<?php $i=0; While($statement1->fetch()) { $i++;
$sql2 = "SELECT proj_id,project_id,name,proj_abstract FROM too_projects WHERE proj_id='$project_id'";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($proj_id,$project_id,$name,$proj_abstract);
$statement2->fetch();
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $project_id;?></td>
			<td><?php echo $name;?></td>
			<td><?php echo $institution_project_id;?></td>
			<td><?php echo $proj_abstract;?></td>
			<td><a href="tooprojects_view.php?pid=<?php echo $proj_id;?>&shw=Y" class="btn btn-success"><i class="fa fa-search"></i></a></td>
			<td><a href="projectAssign.php?ip_id=<?php echo $institution_project_id;?>">Assign</a></td>
		</tr>
<?php } if($nrows1<1) { ?>
	<tr class="text-center"><td colspan="7" >No Records Found</td></tr>
<?php } ?>

	</table>
</div>

<div class="gap20"></div>
<h3 class="">Assigned Projects</h3>
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
		</tr>
<?php $i=0; While($statement1s->fetch()) { $i++;
$sql2 = "SELECT proj_id,project_id,name,proj_abstract FROM too_projects WHERE proj_id='$project_id1'";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($proj_id1,$project_id1,$name1,$proj_abstract1);
$statement2->fetch();
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $project_id1;?></td>
			<td><?php echo $name1;?></td>
			<td><?php echo $institution_project_id1;?></td>
			<td><?php echo $proj_abstract1;?></td>
			
			<td><a href="mentorProjectView.php?ipid=<?php echo $institution_project_id1;?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
		</tr>
<?php } if($nrows1s<1) { ?>
	<tr class="text-center"><td colspan="7" >No Records Found</td></tr>
<?php } ?>		
	</table>
</div>
<div class="gap20"></div>
<?php include("footer.php"); ?>
