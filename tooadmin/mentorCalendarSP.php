<?php 
$page="mentorCalendarSP";
include_once ("../includes/functions.php");
include_once ("../class/config.php");
extract($_REQUEST);


$query1 = "SELECT proj_id, name FROM too_projects WHERE proj_id!='' AND status='A'";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id, $project_name);

$query2 = "SELECT a.user_id, b.s_first_name, b.s_last_name FROM too_users a, student_info b WHERE a.user_type='MEN' AND a.status='A' AND b.status='A' AND a.user_id=b.user_id AND a.rsp_id='$userid'";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($men_id, $men_first_name, $men_last_name);

$nrows3=0;
$sqry="";
if(isset($search_submit)) {

  if($search_project!='' || $search_mentor!='' || $search_from!='' || $search_to!='') {

	if($search_project!='') {
		$sqry="AND project_id='$search_project'";
	}
	if($search_mentor!='') {
		$sqry="AND user_id='$search_mentor'";
	}
	if($search_from!='') {
		$sqry="AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from'";
	}
	if($search_to!='') {
		$sqry="AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}
	if($search_from!='' && $search_to!='') {
		$sqry="AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from' AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}
	if($search_project!='' && $search_from!='' && $search_to!='') {
		$sqry="AND project_id='$search_project' AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from' AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}
	if($search_mentor!='' && $search_from!='' && $search_to!='') {
		$sqry="AND user_id='$search_mentor' AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from' AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}
	if($search_project!='' && $search_mentor!='') {
		$sqry="AND project_id='$search_project' AND user_id='$search_mentor'";
	}
	if($search_project!='' && $search_mentor!='' && $search_from!='') {
		$sqry="AND project_id='$search_project' AND user_id='$search_mentor' AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from'";
	}
	if($search_project!='' && $search_mentor!='' && $search_to!='') {
		$sqry="AND project_id='$search_project' AND user_id='$search_mentor' AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}

	if($search_project!='' && $search_mentor!='' && $search_from!='' && $search_to!='') {
		$sqry="AND project_id='$search_project' AND user_id='$search_mentor' AND DATE_FORMAT(rep_date, '%m/%d/%Y') >= '$search_from' AND DATE_FORMAT(rep_date, '%m/%d/%Y') <= '$search_to'";
	}


	$query3 = "SELECT project_mentor_report_id, institution_project_id, project_id, user_id, DATE_FORMAT(rep_date, '%d/%m/%Y') as rep_date, time FROM too_project_mentor_report WHERE project_mentor_report_id!='' AND status='A' $sqry ORDER BY rep_date DESC";
	//echo $query3;
	$statement3=$mysqli->prepare($query3);
	$statement3->execute();
	$statement3->store_result();
	$statement3->bind_result($project_mentor_report_id, $institution_project_id, $project_id, $men_id3, $rep_date, $time);
	$nrows3=$statement3->num_rows();

  }
}


include("header.php");




/* if ($user_type=='SPM')
{
$type='Mentor';
}
else
{
$type='CP';
}  */

?> 
<h3>
<a href="user2View.php" class="submitM pull-right">Back</a>
Mentor Time Sheet Report</h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>

<div class="well filterBox">

<form name="frm1" id="frm1" action="" method="post" >
		<table class=" " align="center" >
			<tbody>
				<tr>
					<td>
						<select class="form-control" id="search_project" name="search_project">
							<option value="">Project Name</option>
						<?php while($statement1->fetch()) { ?>
							<option value="<?php echo $proj_id; ?>" <?php if($proj_id==$search_project) { echo "selected"; } ?>><?php echo $project_name; ?></option>
						<?php } ?>
						</select>
					</td>
					<td>
						<select class="form-control" id="search_mentor" name="search_mentor">
							<option value="">Mentor Name</option>
						<?php while($statement2->fetch()) { ?>
							<option value="<?php echo $men_id; ?>" <?php if($men_id==$search_mentor) { echo "selected"; } ?>><?php echo $men_first_name." ".$men_last_name; ?></option>
						<?php } ?>
						</select>
					</td>
					<td>
						<input type="text" class="form-control date" id="search_from" name="search_from" placeholder="From Date" value="<?php echo $search_from; ?>">
					</td>
					<td>
						<input type="text" class="form-control date" id="search_to" name="search_to" placeholder="To Date" value="<?php echo $search_to; ?>">
					</td>
					<td><input type="submit" class="btn submitM" id="search_submit" name="search_submit" value="Search"> &nbsp;
					<a href="mentorCalendarSP.php?userid=<?php echo $userid; ?>" class="btn submitM">Cancel</a></td>
				</tr>
			</tbody>
		</table>
	</form>


</div>
 
<form name="frm" action="#" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
	<td width="30">S.No.</td>
	<td>Date</td>
	<td>Project Name</td>
	<td>Program Id</td>
	<td>Hours</td>
    </tr>
  </thead>
	<?php $i=1; $sumTime=0; if($nrows3>0) { while($statement3->fetch()) {

		$nrows6=0;
		$query6 = "SELECT user_id FROM too_users WHERE user_id='$men_id3' AND rsp_id='$userid'";
		//echo $query6;
		$statement6=$mysqli->prepare($query6);
		$statement6->execute();
		$statement6->store_result();
		$statement6->bind_result($user_id6);
		$nrows6=$statement6->num_rows();

		if($nrows6 > 0) {
		$project_name5="";
		$query5 = "SELECT name FROM too_projects WHERE proj_id='$project_id'";
		//echo $query4;
		$statement5=$mysqli->prepare($query5);
		$statement5->execute();
		$statement5->store_result();
		$statement5->bind_result($project_name5);
		$statement5->fetch();
	?>
		<tr>
			<td width="30"><?php echo $i; ?></td>
			<td><?php echo $rep_date; ?></td>
			<td><?php echo $project_name5; ?></td>
			<td><?php echo $institution_project_id; ?></td>
			<td><?php echo $time; ?></td>
		</tr>
	<?php $i++; $sumTime=$sumTime+$time; } } ?>
		<tr>
			<td colspan="4" align="right"><strong>Total Hours</strong></td>
			<td><strong><?php echo $sumTime; ?></strong></td>
		</tr>

	<?php } else{ ?>
		<tr>
			<td colspan="5" style="text-align:center;">No records found</td>	
		</tr>
	<?php } ?>
</table>
</div>
</form>
<?php  include("footer.php"); ?>
