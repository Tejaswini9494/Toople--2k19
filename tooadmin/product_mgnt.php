<?php  
$page="product_mgnt";
$xpan="no";
include("header.php");
include_once("../class/config.php");
extract($_REQUEST);

$query1="select proj_id from too_projects";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id);
$project_num_rows=$statement1->num_rows();


$query2="select algo_id from too_algorithm";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($algo_id);
$algo_num_rows=$statement2->num_rows();

$query3="select recruitment_id from recruitment_details";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($recruitment_id);
$recruitment_num_rows=$statement3->num_rows();

$query4="select internship_id from too_internship";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($internship_id);
$internship_num_rows=$statement4->num_rows();

 ?>

<div class="dashB" style="min-height: 70vh;">
<div class="col-md-8 col-md-push-2">
	<div class="col-sm-6">
		<a href="products.php" class="x_panel font16 ic1">
			<div class="col-xs-4"><img src="images/ic1.png"></div>
			<div class="col-xs-8">
				<strong class="font32"><?php echo $project_num_rows;?></strong><br>
				Project Management
			</div>
		</a>
	</div>

	<div class="col-sm-6">
		<a href="selectedProjects.php" class="x_panel font16 ic2">
			<div class="col-xs-4"><img src="images/ic2.png"></div>
			<div class="col-xs-8">
				<strong class="font32"><?php echo $algo_num_rows;?></strong><br>
				Algorithm Management
			</div>
		</a>
	</div>
	<div class="gap10"></div>
</div>

<div class="col-md-8 col-md-push-2">
	<div class="col-sm-6">
		<a href="recruitment.php" class="x_panel font16 ic1">
			<div class="col-xs-4"><img src="images/ic1.png"></div>
			<div class="col-xs-8">
				<strong class="font32"><?php echo $recruitment_num_rows;?></strong><br>
				Recruitment Management
			</div>
		</a>
	</div>

	<div class="col-sm-6">
		<a href="internship.php" class="x_panel font16 ic2">
			<div class="col-xs-4"><img src="images/ic2.png"></div>
			<div class="col-xs-8">
				<strong class="font32"><?php echo $internship_num_rows;?></strong><br>
				Internship Management
			</div>
		</a>
	</div>
	<div class="gap10"></div>
</div>
</div>
<?php include("footer.php"); ?>
