<?php
$page="studentMgnt.php";
$title="Student Managment";
$ses="no";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];


if(isset($delete_id))
{	
	$sql_delete1 = "DELETE FROM student_info  WHERE user_id='$delete_id'";
	$statement_delete1=$mysqli->prepare($sql_delete1);
	$statement_delete1->execute();

	$sql_delete2 = "DELETE FROM too_users  WHERE user_id='$delete_id'";
	$statement_delete2=$mysqli->prepare($sql_delete2);
	$statement_delete2->execute();

	header("location:studentMgnt.php");
}

if(isset($search_submit)) {

	if($name!='' || $email_id!='') {
		$qry.="AND s_first_name LIKE '%".$name."%' AND s_email_id LIKE '%".$email_id."%'";
	} else {
		$qry='';
	}
}

$sql="SELECT user_email,user_id FROM too_users WHERE user_type='SP' AND rsp_id=$user_id AND status='A'";
$statementt1=$mysqli->prepare($sql);
$statementt1->execute();
$statementt1->store_result();
$statementt1->bind_result($s_email_id,$userid);

include("header.php"); 

?>
<h3 class="pull-right"><a href="add_user.php" class="btn btn-primary">Add</a></h3>
<h3 class="">Student Managment</h3>
<div class="gap30"></div>

<!----Search Box Starts---->
<div class="well1 filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<input type="text" id="name" name="name" class="form-control" placeholder="Student First Name" value="<?php echo $name; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="text" id="email_id" name="email_id" class="form-control" placeholder="Student Mail Id" value="<?php echo $email_id; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="studentMgnt.php" class="btn submitM">Cancel</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>
<div class="gap20"></div>
<!----Search Box End---->


<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Student Name</td>
			<td>Student Identify Number</td>
			<td>Student Mail ID</td>
			<td>E-Portfolio</td>
			<td>View</td>
			<td>Activity</td>
			<td>Delete</td>
		</tr>
<?php  
$i=0; 
while($statementt1->fetch()){
$sql1 = "SELECT student_info_id,user_id,s_first_name,s_last_name,s_identify_number,s_email_id FROM  student_info  WHERE user_id='$userid' $qry";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($student_info_id,$user_id,$s_first_name,$s_last_name,$s_identify_number,$email);
while($statement1->fetch()){
$i++;

$enc_USID=encrypt($user_id, "tooople");

?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $s_first_name." ".$s_last_name;?></td>
			<td><?php echo $s_identify_number;?></td>
			<td><?php echo $s_email_id;?></td>
			<td align="center"><a class="btn btn-default" href="myEportfolio/<?php echo $enc_USID; ?>/<?php echo $s_first_name.$s_last_name;?>"><i class="fa fa-search"></i></a></td>
			<td align="center"><a class="btn btn-default" href="profileView.php?view=<?php echo $user_id; ?>"><i class="fa fa-share"></i></a></td>
			<td align="center"><a class="btn btn-default" href="myProject.php?usid=<?php echo $user_id; ?>"><i class="fa fa-history"></i></a></td>
			<td align="center"><a class="delete" href="studentMgnt.php?delete_id=<?php echo $user_id;?>"><i class="fa fa-trash trash"></i></a></td>
		</tr>
<?php 
} } ?>	
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

