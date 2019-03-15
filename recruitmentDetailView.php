<?php
$page="recuritmentEdit.php";
$title="Recuritment Edit";
$ses="no";
include("header.php");
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
//$user_id="2";

	$sql_det = "SELECT company,position,eligibility_program,eligibility_year_of_completion,eligibility_percentage_achieved
,eligibility_gender,recruitment_program,certificate,job_location,hiring_process FROM recruitment_details WHERE recruitment_id='$id'";
	$sql_detail= $mysqli->prepare($sql_det);  
	$sql_detail->execute();
	$sql_detail->store_result();
	$sql_detail->bind_result($company,$position,$eligibility_program,$eligibility_year_of_completion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitment_program,$certificate,$job_location,$hiring_process);
	$sql_detail->fetch();

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
	
	/*$s2 = "SELECT category_name FROM master_category WHERE category_id IN ($eligibility_year_of_completion) AND category_for=8";
	$statement2=$mysqli->prepare($s2);	
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($category_name1);
	while($statement2->fetch())
	{
	$e_yoc[]=$category_name1;
	}*/	
	//$yoc=implode("  ,  ",$e_yoc);

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

	/*$s4 = "SELECT category_name FROM master_category WHERE category_id IN ($recruitment_year_of_completion) AND category_for=8";
	$statement4=$mysqli->prepare($s4);	
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($category_name3);
	while($statement4->fetch())
	{
	$r_yoc[]=$category_name3;
	}	
	$ryoc=implode("  ,  ",$r_yoc);*/
if($eligibility_gender=='m')
{
$eligibility_gender='Male';
}
elseif($eligibility_gender=='f')
{
$eligibility_gender='Female';
}

?>
<h3><a href="Javascript:history.back()" class="btn btn-primary pull-right">&raquo; Back</a>Recruitment View</h3>
<div class="gap30"></div>

	
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Company</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $company;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Position</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $position;?></div>
			<div class="gap1"></div>
		</div>

	</div>
<div class="gap20"></div>
<h4>Eligibility Criteria</h4>
<div class="gap20"></div>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Program</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $pgm;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Year Of Completion</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $eligibility_year_of_completion;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Percentege Achieved</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $eligibility_percentage_achieved;?></div>
			<div class="gap1"></div>
		</div>


		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Gender</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $eligibility_gender;?></div>
			<div class="gap1"></div>
		</div>
	</div>

<div class="gap20"></div>
<h4>Requirements</h4>
<div class="gap20"></div>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Technical Area</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $rpgm;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Certification</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $certificate;?></div>
			<div class="gap1"></div>
		</div>

	</div>

<div class="gap40"></div>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Job Location</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $job_location;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Hiring Process</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $hiring_process;?></div>
			<div class="gap1"></div>
		</div>

	</div>


<div class="gap20"></div>
<?php include("footer.php"); ?>
