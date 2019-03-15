<?php
$page="myrspo_mentor";
$title="My Mentor";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];

$uType=$_SESSION["type"];

if($uType=='SPM' || $uType=='MEN'){
$name1='Mentors';
}
elseif($uType=='SPC' || $uType=='CP'){
$name1='Content Providers';
}
//echo $_SESSION['add_user_id']."#";
if($delete_id!="")
{	
	$sql_delete = "DELETE FROM student_info WHERE user_id=$delete_id";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();

	$sql_delete1 = "DELETE FROM too_users WHERE user_id=$delete_id";
	$statement_delete1=$mysqli->prepare($sql_delete1);
	$statement_delete1->execute();
}

include("header.php"); ?>

<h3 class="pull-right"><a href="add_user.php" class="btn btn-primary">Add</a></h3>
<h3 class="">My <?php echo $name1; ?></h3>
<div class="gap30"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
		<!--	<td>Edit</td>	-->
			<td><?php echo $name1; ?> Name</td>
			<td><?php echo $name1; ?> Mail ID</td>
			<td class="act">Status</td>
			<td class="act">Action</td>
			<td>View</td>
			<td>Activity</td>
			<td>Payment Details</td>
			<td>Delete</td>
		<!--	<td>Calendar Info</td>	-->
		</tr>
		<?php


$sql = "SELECT user_id,s_institution_name,s_first_name,s_last_name,s_email_id,user_id,m_status,cost_hour FROM student_info where s_institution_name=$user_id ORDER BY created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id,$s_institution_name,$s_first_name,$s_last_name,$s_email_id,$user_id,$m_status,$cost_hour);
$nrows1=$statement1->num_rows();

$i=0;
while($statement1->fetch()) {
$i++

							

					?>
						<tr>
							<td><?php echo $i;?></td>
						<!--	<td align="center"><a href="reg-mentor1.php?edit_id=<?php echo $user_id;?>&email=<?php echo $s_email_id;?>"><i class="fa fa-pencil edit"></i></a></td>	-->
							<td><?php echo $s_first_name." ".$s_last_name;?></td>
							<td><?php echo $s_email_id;?></td>
							<td  class="act" align="center"><?php echo $m_status;?></td>
							<td  class="act" align="center"><a href="mentorstatus.php?id=<?php echo $user_id;?>"><i class="fa fa-search edit"></i></a></td>
							<td align="center"><a class="btn btn-default" href="profileView.php?view=<?php echo $user_id; ?>"><i class="fa fa-share"></i></a></td>
							<?php if($uType=='SPM'){ ?>
							<td align="center"><a class="btn btn-default" href="mentorProject.php?usid=<?php echo $user_id; ?>"><i class="fa fa-history"></i></a></td>
							<?php }else { ?>
							<td align="center"><a class="btn btn-default" href="addContents.php?usid=<?php echo $user_id; ?>"><i class="fa fa-history"></i></a></td>
							<?php } ?>
							<?php if($uType=='SPM'){ ?>
							<td align="center"><a class="btn btn-default" href="myTransactionMEN.php?uridM=<?php echo $user_id; ?>"><i class="fa fa-share"></i></a></td>
							<?php }else { ?>
							<td align="center"><a class="btn btn-default" href="myTransactionCP.php?uridC=<?php echo $user_id; ?>"><i class="fa fa-history"></i></a></td>
							<?php } ?>
							<td align="center"><a id="delete" href="myrspo_mentor.php?delete_id=<?php echo $user_id;?>"><i class="fa fa-trash trash"></i></a></td>
						<!--	<td align="center"><a href="mentorCalendarSP.php?muid=<?php echo $user_id;?>"><i class="fa fa-calendar"></i></a></td>	-->
						</tr>
					<?php } if($nrows1<1) { ?>
						<tr class="text-center"><td colspan="6" >No Records Found</td></tr>
					<?php } ?>
					</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>

<?php if($uType=='SPC' || $uType=='CP' ) {?>
<script>
$('.act').hide();
</script>
<?php  } ?>

<script>
$(document).ready(function()
{
$('#delete').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
});

</script>
