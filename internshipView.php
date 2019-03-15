<?php
$page="internshipView";
$title="Internship View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$sql1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id='$insid'";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);
$statement1->fetch();

$tsdate=sysDBDateConvert($tsdate);
$tedate=sysDBDateConvert($tedate);
$doi=sysDBDateConvert($doi);

$sql4 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id=$category";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id, $category_id, $subcategory_name);
$statement4->fetch();

$sql5 = "SELECT category_name FROM  master_category  WHERE category_id=$ecprogram";
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($category_name1);
$statement5->fetch();

$sql6 = "SELECT category_name FROM  master_category  WHERE category_id=$techarea";
$statement6=$mysqli->prepare($sql6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($category_name2);
$statement6->fetch();

$sql7 = "SELECT category_name FROM  master_category  WHERE category_id='$job'";
$statement7=$mysqli->prepare($sql7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($category_name3);
$statement7->fetch();

/*
$sql6 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id=$techarea";
$statement6=$mysqli->prepare($sql6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($subcategory_id2, $category_id2, $subcategory_name2);
$statement6->fetch();

$sql7 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id=$certificate";
$statement7=$mysqli->prepare($sql7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($subcategory_id3, $category_id3, $subcategory_name3);
$statement7->fetch();
*/
include("header.php"); ?>
<h3 class=""><?php echo $ins_title; ?>
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<h5>Internship Category</h5>
<strong><?php echo $subcategory_name; ?></strong>
<div class="gap15"></div>

<h5>Company</h5>
<strong><?php echo $company; ?></strong>
<div class="gap15"></div>

<h5>Job Role</h5>
<strong><?php echo $category_name3; ?></strong>
<div class="gap30"></div>

<h4>Eligibility Criteria</h4>
<div class="gap10"></div>
<div class="well">
	<div class="col-md-3 col-sm-6">
		<h5>Program</h5>
		<strong><?php echo $category_name1; ?></strong>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<h5>Year of Completion</h5>
		<strong><?php echo $ecyoc; ?></strong>
	</div>
	<div class="gap15 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<h5>% Required</h5>
		<strong><?php echo numbToDesi($ecpercent); ?></strong>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<h5>Gender</h5>
		<strong><?php echo $ecgender; ?></strong>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap15"></div>

<h5>Compensation</h5>
<strong><?php echo $compensation; ?></strong>
<div class="gap30"></div>

<div class="well">
	<div class="col-sm-6">
		<h5>Technical Area</h5>
		<strong><?php echo $category_name2; ?></strong>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-sm-6">
		<h5>Certification</h5>
		<strong><?php echo $certificate; ?></strong>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap15"></div>

<h5>Tentative Start Date</h5>
<strong><?php echo $tsdate; ?></strong>
<div class="gap15"></div>

<h5>Tentative End Date</h5>
<strong><?php echo $tedate; ?></strong>
<div class="gap15"></div>

<h5>Job Location</h5>
<strong><?php echo $joblocation; ?></strong>
<div class="gap15"></div>

<h5>Work type</h5>
<strong><?php echo $worktype; ?></strong>
<div class="gap15"></div>

<h5>Hiring Process</h5>
<strong><?php echo $hireprocess; ?></strong>
<div class="gap15"></div>

<h5>Date of Interview</h5>
<strong><?php echo $doi; ?></strong>

<div class="gap20"></div>
<?php include("footer.php"); ?>
