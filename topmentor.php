<?php
$page="topmentor";
$title="Top Mentor ";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");


extract($_REQUEST);


include("header.php"); 


$a=0;
$sql4 = "SELECT user_id FROM too_users  WHERE user_type='MEN' AND status= 'A'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($user_id);


?>
<div class="gap20"></div>

<div class="gap20"></div>

<h3 class="">Top Mentors</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Name</td>
			<td>Technology</td>
			<td>Rank</td>
			
			
		</tr>
<?php $i=1; while($statement4->fetch()) {
$query1 = "select institution_project_id FROM institution_project_assign where mentor_id='$user_id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_id);
$projAssign=$statement1->num_rows();

$query2 = "select s_first_name FROM student_info where user_id ='$user_id'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($s_first_name);
$statement2->fetch();

$query3 = "select s_technical_area FROM student_technical_skills where user_id='$user_id'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($s_technical_area);
$statement3->fetch();
$sum=0;
while($statement1->fetch()){



$query5 = "select sum(star) FROM too_project_review where institution_project_assign_id='$institution_project_id' AND category_id IN (55,56,57,58)";
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($sum_of_star);
$statement5->fetch();
$sum+=($sum_of_star/4);
}
	
$a++;	
?>
		<tr>
			<td><?php echo $a; ?></td>
			<td><?php echo $s_first_name; ?></td>
			<td><?php echo $s_technical_area; ?></td> 
			<td><?php
			if($projAssign==0){ $projAssign=1;} echo $sum/$projAssign; ?></td>
		</tr>
	<?php  } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
