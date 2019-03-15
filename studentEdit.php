<?php
$page="internshipEdit.php";
$title="Internship Edit";
$ses="no";
include("header.php"); ?>
<h3 class="">Student Edit</h3>
<div class="gap30"></div>
<form action="studentMgnt.php" method="post">
	<?php include("in_register1asa.php");?>
	<?php include("in_register1bsa.php");?>
	<div class="col-sm-9 col-sm-push-3">
	<input type="submit" class="btn btn-primary" value="Submit"> &nbsp;
	<input type="submit" class="btn btn-danger" value="Reset">
	</div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
