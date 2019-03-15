<?php
$page="internshipAdd.php";
$title="Internship Add";
$ses="no";
include("header.php"); ?>
<h3 class="">Student Add</h3>
<div class="gap30"></div>
<form action="studentMgnt.php" method="post">

	<div class="form-group">
		<label class="col-md-3 text-right">Would you like to upload bulk data?<span class="red">*</span></label>
		<div class="col-md-9">
			<label><input type="radio" id="yes" name="yesno"> Yes</label> &emsp;
			<label><input type="radio" id="no" name="yesno"> No</label>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<span class="red">/*--------------------------------------If Yes Below will appear----------------------------------*/</span>
	<div class="gap15"></div>
	<div class="form-group">
		<label class="col-md-3 text-right">Upload CSV <span class="red">*</span></label>
		<div class="col-md-9">
			<input type="file" class="form-control" id="" name="">
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<span class="red">/*-----------------------------------------If No Below will appear--------------------------------*/</span>
	<div class="gap15"></div>
	<?php include("in_register1asa.php");?>
	<?php include("in_register1bsa.php");?>
	<div class="col-sm-9 col-sm-push-3">
	<input type="submit" class="btn btn-primary" value="Submit"> &nbsp;
	<input type="submit" class="btn btn-danger" value="Reset">
	</div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
