<?php
$page="myProjectView";
$title="My Project View";
include("header.php"); 
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$ses_user_id=$_SESSION["userid"];

if($_SESSION["type"]=="SP") {
	$confirmTxt="ARE YOU ABSOLUTELY SURE YOU WANT TO MAKE ASSIGNMENT FOR MENTORS?";
} else {
	$confirmTxt="ARE YOU ABSOLUTELY SURE YOU WANT TO MAKE ASSIGNMENT FOR SELECTED STUDENTS,COORDINATORS AND MENTORS ONLY?";
}


if($ip_id!=''){
$_SESSION['ip_id']=$ip_id;
}

$ip_id=$_SESSION['ip_id'];

$sql = "SELECT project_id, no_of_students, mentor_type_name, mentor_hrs FROM institution_project where institution_project_id='$ip_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id, $no_of_students1, $mentor_type_name1, $mentor_hrs);
$statement1->fetch();

$sqlp = "SELECT name FROM too_projects where proj_id='$proj_id'";
$statementp=$mysqli->prepare($sqlp);
$statementp->execute();
$statementp->store_result();
$statementp->bind_result($project_name);
$statementp->fetch();



if(isset($make_assign)) {

$sql_st_add="INSERT INTO institution_project_assign(institution_project_id,institution_id,mentor_id,mentor_type,created_on) VALUES('$ip_id','$ses_user_id','$mentor_id','$mentor_type',now()) ";
$stat_st_add=$mysqli->prepare($sql_st_add);
$stat_st_add->execute();

for($ia=1; $ia<=$hid_cal_val_count; $ia++) {
	$calTemp_id=$hid_cal_val[$ia];
	$query11aa="UPDATE too_calender SET institution_project_id='$ip_id', status='B' WHERE calender_id='$calTemp_id'";
	$statement11aa=$mysqli->prepare($query11aa);
	$statement11aa->execute();
}

if($_SESSION["type"]=="SP") {
	$sql_st_add="INSERT INTO institution_project_assign(institution_project_id,institution_id,student_id,created_on) VALUES('$ip_id','$ses_user_id','$ses_user_id',now()) ";
	$stat_st_add=$mysqli->prepare($sql_st_add);
	$stat_st_add->execute();
	$stat_st_add->close();
}

$up_query="UPDATE institution_project SET assigned_status='Y' WHERE institution_project_id='$ip_id'";
$st_up_query=$mysqli->prepare($up_query);
$st_up_query->execute();

if($_SESSION["type"]=="SP") {
	header("location:myProject.php");
} else {
	header("location:institutionProject.php");
}
exit;
}


//echo $_SESSION['ip_id'];
if(isset($student_add)) {
$sql_st_add="INSERT INTO institution_project_assign(institution_project_id,institution_id,student_id,created_on) VALUES('$ip_id','$ses_user_id','$student_id',now()) ";
$stat_st_add=$mysqli->prepare($sql_st_add);
$stat_st_add->execute();
header("location:projectAssign.php");
}
if(isset($co_ordinator_add)) {
$sql_st_add="INSERT INTO institution_project_assign(institution_project_id,institution_id,coordinator_id,created_on) VALUES('$ip_id','$ses_user_id','$co_add',now()) ";
$stat_st_add=$mysqli->prepare($sql_st_add);
$stat_st_add->execute();
header("location:projectAssign.php");
}
/*
if(isset($co_mentor_add)) {
	$sql_st_add="INSERT INTO institution_project_assign(institution_project_id,institution_id,mentor_id,mentor_type,created_on) VALUES('$ip_id','$ses_user_id','$mentor_id','$mentor_type',now()) ";
	$stat_st_add=$mysqli->prepare($sql_st_add);
	$stat_st_add->execute();

	for($ia=1; $ia<=$hid_cal_val_count; $ia++) {
		$calTemp_id=$hid_cal_val[$ia];
		$query11aa="UPDATE too_calender SET institution_project_id='$ip_id', status='B' WHERE calender_id='$calTemp_id'";
		$statement11aa=$mysqli->prepare($query11aa);
		$statement11aa->execute();
	}
	header("location:projectAssign.php");
}
*/
if(isset($del)) {
$sql_d="DELETE FROM institution_project_assign WHERE institution_project_assign_id='$del'";
$del=$mysqli->prepare($sql_d);
$del->execute();
}

if($_SESSION["type"]!="SP") {
	$nrowst2=0;
	$sql2= "SELECT institution_project_assign_id FROM institution_project_assign WHERE institution_project_id='$ip_id' AND student_id!='0'";
	$stat2=$mysqli->prepare($sql2);
	$stat2->execute();
	$stat2->store_result();
	$stat2->bind_result($institution_project_assign_idt2);
	$nrowst2=$stat2->num_rows();
	$stat2->close();
	//echo $no_of_students1."#".$nrowst2."<br>";

	$nrowst3=0;
	$sql3= "SELECT institution_project_assign_id FROM institution_project_assign WHERE institution_project_id='$ip_id' AND coordinator_id!='0'";
	$stat3=$mysqli->prepare($sql3);
	$stat3->execute();
	$stat3->store_result();
	$stat3->bind_result($institution_project_assign_idt3);
	$nrowst3=$stat3->num_rows();
	$stat3->close();
}

$nrowst4=0;
$sql4= "SELECT institution_project_assign_id FROM institution_project_assign WHERE institution_project_id='$ip_id' AND mentor_id!='0'";
$stat4=$mysqli->prepare($sql4);
$stat4->execute();
$stat4->store_result();
$stat4->bind_result($institution_project_assign_idt4);
$nrowst4=$stat4->num_rows();
$stat4->close();

?>
    
<h3>Project Assignment 
 <h3><?php echo $project_name;?></h3></h3>
<div class="gap20"></div>
<form method="post">
	<?php if($_SESSION["type"]!="SP") { ?>
		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Student Name  :</label>
			<div class="col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="student_id" id="student_id" class="form-control">
						<option value="">Select</option>
						<?php
		
						$sql_e="select user_id, user_email from too_users where rsp_id='$ses_user_id' AND user_type='SP' AND status='A'";
						$stat_e=$mysqli->prepare($sql_e);
						$stat_e->execute();
						$stat_e->store_result();
						$stat_e->bind_result($user_id_e, $usermail);

						while($stat_e->fetch()) {
						$sql_sp = "SELECT user_id,s_first_name,s_last_name,s_email_id,student_info_id,s_identify_number FROM student_info WHERE user_id=$user_id_e";
						$stat_sp=$mysqli->prepare($sql_sp);
						$stat_sp->execute();
						$stat_sp->store_result();
						$stat_sp->bind_result($user_id,$s_first_name,$s_last_name,$s_email_id,$student_info_id,$s_identify_number);
						$stat_sp->fetch();
						?>
						<option value="<?php echo $user_id;?>"><?php echo $s_identify_number."-".$s_first_name."-".$usermail?></option>
						<?php }?>
					</select>
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-sm-2">
			<?php if($no_of_students1>$nrowst2) { ?>
				<button name="student_add" class="btn btn-primary">+ Add</button>
			<?php } ?>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="tr1">
					<td width="150">S.No.</td>
					<td>Student Name</td>
					<td width="150">Action</td>
				</tr>

			<?php 
			$sql= "SELECT a.institution_project_assign_id,a.student_id,b.s_first_name,s_last_name from institution_project_assign a,student_info b where a.institution_project_id='$ip_id' and b.user_id=a.student_id;";
			$stat=$mysqli->prepare($sql);
			//echo $sql;
			$stat->execute();
			$stat->store_result();
			$stat->bind_result($institution_projet_assign_id,$student_id,$first_name,$last_name);$i=0;
			while($stat->fetch()){ $i++;
				
					?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $first_name."".$last_name;?></td>
					<td align="center"><a class="delete" href="projectAssign.php?del=<?php echo $institution_projet_assign_id;?>" class=""><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
			</table>
		</div>

		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Coordinator Name  :</label>
			<div class="col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>

<?php 

?>
					<select name="co_add" id="co_add" class="form-control">
						<option value="">Select</option>
						<?php 
						$sql_co = "SELECT co_representative_details_id,cr_name,cr_email,cr_id_no FROM co_representative_details WHERE user_id='$ses_user_id'";
						$stat_co=$mysqli->prepare($sql_co);
						$stat_co->execute();
						$stat_co->store_result();
						//echo $sql_co;
						$stat_co->bind_result($co_representative_details_id,$cr_name,$cr_email,$cr_id_no);
						$b=0;
						while($stat_co->fetch()) {  $b++; ?>
						<option value="<?php echo $co_representative_details_id;?>"><?php echo $cr_id_no."-".$cr_name."-".$cr_email;?></option>
						<?php } ?>
`					</select>
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-sm-2">
			<?php if($nrowst3<1) { ?>
				<button name="co_ordinator_add" class="btn btn-primary">+ Add</button>
			<?php } ?>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="tr1">
					<td width="150">S.No.</td>
					<td>Coordinator Name</td>
					<td width="150">Action</td>
				</tr>
				<tr>
					<?php $sql1= "SELECT a.institution_project_assign_id,a.student_id,b.cr_name from institution_project_assign a,co_representative_details b where a.institution_project_id='$ip_id' and b.co_representative_details_id=a.coordinator_id;";
			$stat1=$mysqli->prepare($sql1);
			//echo $sql1;
			$stat1->execute();
			$stat1->store_result();
			$stat1->bind_result($institution_projet_assign_id,$student_id,$cr_name);$i=0;
			while($stat1->fetch()){ $i++;?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $cr_name;?></td>
					<td align="center"><a class="delete" href="projectAssign.php?del=<?php echo $institution_projet_assign_id;?>" class=""><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php } ?>
				</tr>
			</table>
		</div>
	<?php } ?>

		<div class="gap15"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Mentor Type  :</label>
			<div class="col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="mentor_type" id="mentor_type" class="form-control" readonly>
						<option value="<?php echo $mentor_type_name1; ?>" selected><?php echo $mentor_type_name1; ?></option>
					</select>
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap5"></div>
		<div class="form-group">
			<label class="col-sm-3 text-right">Mentor Name :</label>
			<div class="col-sm-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="mentor_id" id="mentor_id" class="form-control">
						<option value="">Select</option>
					   <?php

						$sqll1="select user_id,s_first_name from student_info where m_status='$mentor_type_name1'";
						$statll1=$mysqli->prepare($sqll1);
						
						$statll1->execute();
						$statll1->store_result();
						$statll1->bind_result($men_id,$men_name);$i=0;
						while($statll1->fetch()){ $i++;
						$sqlll2="select mentor_interested_project_id from mentor_interested_project where mentor_id='$men_id' AND proj_id='$proj_id'";
						$statll2=$mysqli->prepare($sqlll2);
						$statll2->execute();
						$statll2->store_result();
						$statll2->bind_result($mentor_interested_project_id);
						$norowsll2=$statll2->num_rows();

						$sqlll3="select SUM(total_hrs) as total_hrs from too_calender where user_id='$men_id' AND status='A'";
						$statll3=$mysqli->prepare($sqlll3);
						$statll3->execute();
						$statll3->store_result();
						$statll3->bind_result($total_hrs);
						$statll3->fetch();

						if($norowsll2>0 && $total_hrs>=$mentor_hrs){
						echo "<option value='".$men_id."'>".$men_name."</option>";
						 } } ?>
					</select>
				</div>
				<div class="gap1"></div>
				<span for="user_name" class="errors"></span>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-sm-2">
			<?php if($nrowst4<1) { ?>
				<button type="button" class="btn btn-primary" onclick="modal_cal_trig()"><i class="fa fa-calendar"></i></button>
			<?php } ?>
		<!--	<button name="co_mentor_add" class="btn btn-primary">+ Add</button>	-->
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="tr1">
					<td width="150">S.No.</td>
					<td>Mentor Type</td>
					<td>Mentor Name</td>
				<!--	<td width="150">Action</td>	-->
				</tr>
				<tr id="men_cal_table">
				</tr>
			</table>
		</div>
		<div class="gap15"></div>
		<div id="load_hidden_cal">
		</div>


	<?php
	if($_SESSION["type"]!="SP") { 
		if($no_of_students1==$nrowst2 && $nrowst3=='1') { ?>
			<input type="submit" value="Make Assignment" id="make_assign" name="make_assign" class="btn submitM pull-right">
	<?php } } else { ?>
		<input type="submit" value="Make Assignment" id="make_assign" name="make_assign" class="btn submitM pull-right">
	<?php } ?>
</form>
<div class="gap30"></div>
<?php include("footer.php"); ?>
<?php include("modal_mentor_calendar.php"); ?>
<!--
<script>
$(document).ready(function()
{
	load_mentorname();
	function load_mentorname()
	{
		var con=$('#mentor_type').val();
		if(con=='') {
			$('#mentor_id').html('<option>Select status First</option>');
		}
		else
		{
		   $.ajax({    //create an ajax request to functions.php
			type: "POST",
			url: "projectstatus1.php",             
			data: {con},                 
			success: function(response){
			$('#mentor_id').html(response);
			}
		    });
		}
	}
});
</script>
-->
<script>
$(document).ready(function()
{
$('#make_assign').click(function() {
 var cTxt="<?php echo $confirmTxt; ?>";
 var agree=confirm(cTxt);
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
});
</script>
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


function modal_cal_trig() {
	var val1=$( "#mentor_id option:selected" ).val();

	if(val1!="") {
	$.ajax({
		url:'ajax_modal_cal_trig.php', 
		type:'POST',
		data: {m_id11:val1},
		success:function(result){ //alert(result);
			$("#load_modal_cal_trig").html(result);
			$('#modal_mentor_calendar').modal('show');
		}
	});
	}
}

</script>
