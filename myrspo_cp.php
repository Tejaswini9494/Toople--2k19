<?php
$page="myrspo_cp";
$title="My Content Providers";
$type=$_GET['t'];
include("header.php"); ?>

<h3 class="pull-right"><a href="rspo_cpProfileAdd.php" class="btn btn-primary">Add</a></h3>
<h3 class="">My Content Providers</h3>
<div class="gap30"></div>
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Edit</td>
			<td>Content Provider Name</td>
			<td>Content Provider Mail ID</td>
			<td>View</td>
		</tr>
		<tr>
			<td>1</td>
			<td><a href="rspo_cpProfileAdd.php"><i class="fa fa-pencil-square-o"></i></a></td>
			<td>Jack</td>
			<td>Jack@gmail.com</td>
			<td><a href="myrspo_cp_view.php" class="btn submitS"><i class="fa fa-search"></i></a></td>
		</tr>
		<tr>
			<td>2</td>
			<td><a href="rspo_cpProfileAdd.php"><i class="fa fa-pencil-square-o"></i></a></td>
			<td>John</td>
			<td>John@gmail.com</td>
			<td><a href="myrspo_cp_view.php" class="btn submitS"><i class="fa fa-search"></i></a></td>
		</tr>
		<tr>
			<td>3</td>
			<td><a href="rspo_cpProfileAdd.php"><i class="fa fa-pencil-square-o"></i></a></td>
			<td>Edwards</td>
			<td>Edwards@gmail.com</td>
			<td><a href="myrspo_cp_view.php" class="btn submitS"><i class="fa fa-search"></i></a></td>
		</tr>
		<tr>
			<td>4</td>
			<td><a href="rspo_cpProfileAdd.php"><i class="fa fa-pencil-square-o"></i></a></td>
			<td>Albert</td>
			<td>Albert@gmail.com</td>
			<td><a href="myrspo_cp_view.php" class="btn submitS"><i class="fa fa-search"></i></a></td>
		</tr>
		<tr>
			<td>5</td>
			<td><a href="rspo_cpProfileAdd.php"><i class="fa fa-pencil-square-o"></i></a></td>
			<td>Taylor</td>
			<td>Taylor@gmail.com</td>
			<td><a href="myrspo_cp_view.php" class="btn submitS"><i class="fa fa-search"></i></a></td>
		</tr>
	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>
