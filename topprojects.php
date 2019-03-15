<?php
$page="topproject";
$title="Top project ";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");


extract($_REQUEST);


include("header.php"); 

$a=0;
$sql4 = "SELECT proj_id FROM too_projects WHERE status= 'A'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($proj_id);


?>
<div class="gap20"></div>

<div class="gap20"></div>

<h3 class="">Top Projects</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Name</td>
			<td>Duration</td>
			<td>Technology</td>
			<td>Star</td>
			
			
		</tr>
<?php $i=1; while($statement4->fetch()) {

$query0 = "select institution_project_id FROM institution_project where project_id ='$proj_id'";
$statement0=$mysqli->prepare($query0);
$statement0->execute();
$statement0->store_result();
$statement0->bind_result($institution_project_id);

$query2 = "select name,duration,dev_platform  FROM too_projects where proj_id ='$proj_id'";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($name,$duration,$dev_platform);
$statement2->fetch();

$projAssign=$statement0->num_rows();
$sum=0;
while($statement0->fetch()){

$query1 = "select institution_project_assign_id FROM institution_project_assign where institution_project_id='$institution_project_id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id);
$statement1->fetch();





$query5 = "select sum(star) FROM too_project_review where institution_project_assign_id='$institution_project_assign_id' AND category_id IN (50,51,52,53,54)";
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($sum_of_star);
$statement5->fetch();
$sum+=($sum_of_star/5);
}

$a++;		
?>
		<tr>
			<td><?php echo $a; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $duration; ?></td>
			<td><?php echo $dev_platform; ?></td> 
			<td><?php
			if($projAssign==0){ $projAssign=1;} echo $sum/$projAssign; ?></td>
		</tr>
	<?php   } ?>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
