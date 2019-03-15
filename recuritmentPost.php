<?php
$page="recuritmentPost.php";
$title="Recuritment";
$ses="no";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
//$user_id="2";

if(isset($delete_id)) {
$sql_recdelete="DELETE FROM recruitment_details WHERE recruitment_id='$delete_id'";
$sql_rec_delete=$mysqli->prepare($sql_recdelete);
$sql_rec_delete->execute();

header("location:recuritmentPost.php");
}

include("header.php"); 

$sql_recview = "SELECT recruitment_id,company,position,eligibility_program,eligibility_year_of_completion,eligibility_percentage_achieved
,eligibility_gender,recruitment_program,certificate,job_location,hiring_process,status FROM recruitment_details ORDER BY recruitment_id DESC";
$sql_rec_view= $mysqli->prepare($sql_recview);  
$sql_rec_view->execute();
$sql_rec_view->store_result();
$sql_rec_view->bind_result($recruitment_id,$company,$position,$eligibility_program,$eligibility_year_of_completion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitment_program,$certificate,$job_location,$hiring_process,$status);


?>
<h3 class="pull-right"><a href="recuritmrntAdd.php" class="btn btn-primary">Add</a></h3>
<h3 class="">Recuritment</h3>
<div class="gap30"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Edit</td>
			<td>Company</td>
			<td>Position</td>
			<td>Degree</td>
			<td>Technical Skill</td>
			<td>Job Location</td>
			<td>Status</td>
			<td>Student Details</td>			
			<td>Delete</td>
		</tr>
<?php $i=0; while($sql_rec_view->fetch()) { $i++;
$e_pgm='';
$r_pgm='';
$pgm='';
$rpgm='';

if($status=='A'){
$status='Approved';
}
elseif($status=='D'){
$status='Rejected';
}
elseif($status=='SFA'){
$status='Sending For Approval';
}
			$s1 = "SELECT category_name FROM master_category WHERE category_id IN ($eligibility_program) AND category_for=2";
			$statement1=$mysqli->prepare($s1);	
			$statement1->execute();
			$statement1->store_result();
			$statement1->bind_result($category_name);
			while($statement1->fetch())
			{
			$e_pgm[]=$category_name;
			}	
			$pgm=implode("  ,  ",$e_pgm);

			$s3 = "SELECT category_name FROM master_category WHERE category_id IN ($recruitment_program) AND category_for=9";
			$statement3=$mysqli->prepare($s3);	
			$statement3->execute();
			$statement3->store_result();
			$statement3->bind_result($category_name2);
			while($statement3->fetch())
			{
			$r_pgm[]=$category_name2;
			}	
			$rpgm=implode("  ,  ",$r_pgm);
 ?>
		<tr>
			<td><?php echo $i;?></td>
			<td><a href="recuritmentEdit.php?id=<?php echo $recruitment_id?>"><i class="fa fa-pencil-square-o"></i></a></td>
			<td><a style="color:#00f;" href="recruitmentDetailView.php?id=<?php echo $recruitment_id;?>"><?php echo $company;?></a></td>
			<td><?php echo $position;?></td>
			<td><?php echo $pgm;?></td>
			<td><?php echo $rpgm;?></td>
			<td><?php echo $job_location;?></td>
			<td><?php echo $status;?></td>
			<td><a href="recuritStudInfo.php?tid=<?php echo $recruitment_program?>"><i class="fa fa-search"></i></a></td>			
			<td><a class="delete" id="delete" href="recuritmentPost.php?delete_id=<?php echo $recruitment_id;?>"><i class="fa fa-trash trash"></i></td>
		</tr>
<?php } ?>
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
