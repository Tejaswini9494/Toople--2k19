<?php
$page="studentMgnt.php";
$title="Student Managment";
$ses="no";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];


$sql="SELECT a.user_id,b.s_technical_area FROM too_users a,student_technical_skills b WHERE a.user_type='SP' AND a.user_id=b.user_id AND a.status='A' AND b.s_technical_area IN ($tid) GROUP BY a.user_id";
$statement=$mysqli->prepare($sql);
$statement->execute();
$statement->store_result();
$statement->bind_result($userid,$s_technical_area);
include("header.php"); 

?>
<h3 class="">Student Details
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap20"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Student Name</td>
			<td>Student Email Id</td>
			<td>Student Identify Number</td>
			<td>View</td>
		</tr>
<?php  
$i=0; 
while($statement->fetch()){
$sql1 = "SELECT student_info_id,user_id,s_first_name,s_last_name,s_identify_number,s_email_id FROM  student_info  WHERE user_id='$userid'";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($student_info_id,$user_id,$s_first_name,$s_last_name,$s_identify_number,$email);
$statement1->fetch();
$i++;
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $s_first_name.' '.$s_last_name;?></td>
			<td><?php echo $email;?></td>
			<td><?php echo $s_identify_number;?></td>
			<td align="center"><a class="btn btn-default" href="profileView.php?view=<?php echo $user_id; ?>"><i class="fa fa-share"></i></a></td>
		</tr>
<?php } ?>	
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
