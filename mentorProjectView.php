<?php
$page="mentorProjectView";
$title="Mentor Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];

$query1 = "SELECT institution_project_assign_id, institution_project_id, institution_id, student_id FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND institution_project_id='$ipid' AND student_id!='0' ORDER BY institution_project_assign_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id, $institution_project_id, $institution_id, $student_id);

$query3 = "SELECT project_id FROM  institution_project  WHERE institution_project_id='$ipid'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($proj_id);
$statement3->fetch();

$query4 = "SELECT project_id, name, proj_abstract FROM  too_projects  WHERE proj_id='$proj_id'";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($project_id1, $name1, $proj_abstract1);
$statement4->fetch();

$query6 = "SELECT mentor_id FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND institution_project_id='$ipid' AND mentor_id!='0'";
$statement6=$mysqli->prepare($query6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($mentor_id);
$statement6->fetch();

$query7 = "SELECT coordinator_id FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND institution_project_id='$ipid' AND coordinator_id!='0'";
$statement7=$mysqli->prepare($query7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($coordinator_id);
$statement7->fetch();

		$query8 = "SELECT s_first_name FROM student_info  WHERE user_id='$mentor_id'";
		$statement8=$mysqli->prepare($query8);
		$statement8->execute();
		$statement8->store_result();
		$statement8->bind_result($mentor_name);
		$statement8->fetch();


		$query9 = "SELECT cr_name FROM co_representative_details  WHERE user_id='$coordinator_id'";
		$statement9=$mysqli->prepare($query9);
		$statement9->execute();
		$statement9->store_result();
		$statement9->bind_result($coordinator_name);
		$statement9->fetch();

include("header.php"); ?>

<h3 class="">Project View <h4><?php echo $name1; ?></h4>
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<div align='center'>
	<?php if($mentor_name!='') { ?> Mentor Name :  <?php echo $mentor_name;?> <?php } ?>&nbsp;&nbsp;&nbsp;&nbsp; <?php if($coordinator_name!='') { ?> Coordinator Name : <?php echo $coordinator_name;?> <?php } ?> &nbsp;&nbsp;
</div>


<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tbody><tr class="tr1">
			<td width="150">S.No.</td>
			<td>Student Name</td>
			<td>Email ID</td>
			<td>Gender</td>
			<td>Attendance</td>
			<td>View</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {
		$query2 = "SELECT s_first_name, s_gender,s_email_id FROM  student_info  WHERE user_id=$student_id";
		$statement2=$mysqli->prepare($query2);
		$statement2->execute();
		$statement2->store_result();
		$statement2->bind_result($s_first_name, $s_gender, $s_email_id);
		$statement2->fetch();

		if($s_gender=='m'){$s_gender="Male";}
		if($s_gender=='f'){$s_gender="Female";}
	?>

		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $s_first_name; ?></td>
			<td><?php echo $s_email_id; ?></td>
			<td><?php echo $s_gender; ?></td>
			<td align="center"><a href="javascript:load_stdAtt(<?php echo $ipid; ?>, <?php echo $institution_project_assign_id; ?>);" data-toggle="modal" class="btn btn-success"><i class="fa fa-calendar"></i></a></td>
			<td align="center"><a href="myProjectView.php?ipaid=<?php echo $institution_project_assign_id; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
		</tr>
	<?php $i++; } ?>
	</tbody></table>
</div>

<div class="gap30"></div>

<!-- Modal Attandance -->
<div class="modal fade" id="modal_load_stdAtt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>  
<h2 class="modal-title" id="myModalLabel" style="width:auto;">Student Attendance Report</h2>
			</div>
			<div class="modal-body"> 
				<div id="load_stdAtt" class="col-sm-12">

				</div> 
				<br class="clear">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--/ Modal Attandance -->

<?php include("footer.php"); ?>

<script>
function load_stdAtt(val1, val2) {
	if(val1!="") {
	$.ajax({
		url:'ajax_load_stdAtt.php', 
		type:'POST',
		data: {ipid:val1, ipaid:val2},
		success:function(result){ //alert(result);
			$("#load_stdAtt").html(result);
			$('#modal_load_stdAtt').modal('show');
		}
	});
	}
}
</script>

