<?php
$page="profileView";
$title="Profile View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);
$userr_id=$_GET['view'];
session_start();
$uType=$_SESSION["type"];

$sql_personalinfo = "SELECT user_id, s_first_name, s_last_name, s_dob, s_gender, s_identify_number, s_addressline1, s_addressline2, s_country, s_state, s_city, s_primary_contact, s_email_id, s_secondary_contact FROM student_info  where user_id='$userr_id'";
//echo $sql_personalinfo;
$sql_personal_info=$mysqli->prepare($sql_personalinfo);
$sql_personal_info->execute();
$sql_personal_info->store_result();
$sql_personal_info->bind_result($user_id, $s_first_name, $s_last_name, $s_dob, $s_gender, $s_identify_number, $s_addressline1, $s_addressline2, $s_country, $s_state, $s_city, $s_primary_contact, $s_email_id, $s_secondary_contact);
$sql_personal_info->fetch();

if($s_gender=='m') $s_gender='Male';
if($s_gender=='f') $s_gender='Female';
$s_dob1=sysDBDateConvert($s_dob);

$sql_eduqualiinfo = "SELECT s_qualification_id,s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_university_name,s_institution_name,s_institution_country,
s_institution_state,s_institution_city,s_institution_zip FROM  student_qualifications  where user_id='$userr_id' ORDER BY Created_on DESC";
$sql_edu_quali_info=$mysqli->prepare($sql_eduqualiinfo);
$sql_edu_quali_info->execute();
$sql_edu_quali_info->store_result();
$sql_edu_quali_info->bind_result($s_qualification_id,$s_program,$s_branch,$s_year_of_start,$s_year_of_completion,$s_percentage_achieved,$s_university_name,$s_institution_name,$s_institution_country,
$s_institution_state,$s_institution_city,$s_institution_zip);
//echo $sql_eduqualiinfo;


$sql_techskills = "SELECT s_technical_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills where user_id='$userr_id' ORDER BY Created_on DESC";
$sql_tech_skills=$mysqli->prepare($sql_techskills);
$sql_tech_skills->execute();
$sql_tech_skills->store_result();
$sql_tech_skills->bind_result($s_technical_id,$s_technical_area,$s_institution_name1,$s_start_date,$s_end_date,$s_duration,$s_efficiency_level);


$sql_certidetails = "SELECT s_certification_id,s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details where user_id='$userr_id' ORDER BY Created_on DESC";
$sql_certi_details=$mysqli->prepare($sql_certidetails);
$sql_certi_details->execute();
$sql_certi_details->store_result();
$sql_certi_details->bind_result($s_certification_id,$s_exam_name,$s_exam_code,$s_date_of_cleared);


$sql_workexp = "SELECT s_experience_id,s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date FROM student_work_experience where user_id='$userr_id' ORDER BY Created_on DESC";
$sql_wrok_exp=$mysqli->prepare($sql_workexp);
$sql_wrok_exp->execute();
$sql_wrok_exp->store_result();
$sql_wrok_exp->bind_result($s_experience_id,$s_organisation_name,$s_designation,$s_technology,$s_job_role,$s_start_date1,$s_end_date1);

$sql_awdrwd = "SELECT sp_awards,sp_rewards FROM service_provider_details where user_id='$userr_id'";
$sql_awd_rwd=$mysqli->prepare($sql_awdrwd);
$sql_awd_rwd->execute();
$sql_awd_rwd->store_result();
$sql_awd_rwd->bind_result($sp_awards,$sp_rewards);
$sql_awd_rwd->fetch();

include("header.php"); ?>

<h3 class="">Profile View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap10"></div>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
	
		<div class="gap10"></div> 

	<!--Info1-->
	<h4>Personal Info</h4>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Name</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_first_name." ".$s_last_name;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Date of Birth</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_dob1;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Gender</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_gender;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Identity Number</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_identify_number;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Email</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_email_id;?></div>
			<div class="gap1"></div>
		</div>
	</div>
	<div class="gap20"></div> 

	<!--Info2-->
	<h4>Contact Info</h4>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Address Line1</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_addressline1;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Address Line2</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_addressline2;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Country</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($s_country);?></div>
			<div class="gap1"></div>
		</div>

		<div class="gap30"></div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">State</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo getStateName($s_state);?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">City</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo getCityName($s_city);?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Primary Contact</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_primary_contact;?></div>
			<div class="gap1"></div>
		</div>
	</div>
	<div class="gap20"></div> 	

	<!--Info3-->
	<h4>Educational Qualification</h4>
	<table width="100%" class="table table-striped border">
		  <tr class="tr1">
		    <td><strong>Program</strong></td>
		    <td><strong>Department</strong></td>
		    <td><strong>Year of Start</strong></td>
		    <td><strong>Year of Completion</strong></td>
		    <td><strong>% Achieved</strong></td>
		    <td><strong>University Name</strong></td>
		    <td><strong>Institution Name</strong></td>
		    <td><strong>Institution Country</strong></td>
		    <td><strong>Institution State</strong></td>
		    <td><strong>Institution City</strong></td>
		    <td><strong>Institution Zip</strong></td>
		  </tr>
		  <?php 
		  while($sql_edu_quali_info->fetch()) {
			$s_startyear=sysConvertYear($s_year_of_start);
			$s_endyear=sysConvertYear($s_year_of_completion);
			$sql1 = "SELECT category_name FROM master_category where category_id='$s_program'";
			$statement1s=$mysqli->prepare($sql1);	
			$statement1s->execute();
			$statement1s->store_result();
			$statement1s->bind_result($program_name);		
			$statement1s->fetch();
			$sql2= "SELECT subcategory_name FROM master_subcategory where subcategory_id='$s_branch'";
			$statement2=$mysqli->prepare($sql2);	
			$statement2->execute();
			$statement2->store_result();
			$statement2->bind_result($branch_name);		
			$statement2->fetch();
		 ?>	
		<tr>
			<td><?php echo $program_name;?></td>
			<td><?php echo $branch_name;?></td>
			<td><?php echo $s_startyear;?></td>
			<td><?php echo $s_endyear;?></td>
			<td><?php echo $s_percentage_achieved;?></td>
			<td><?php echo $s_university_name;?></td>
			<td><?php echo $s_institution_name;?></td>							
			<td><?php echo getCountryName($s_institution_country);?></td>
			<td><?php echo getStateName($s_institution_state);?></td>
			<td><?php echo getCityName($s_institution_city);?></td>
			<td><?php echo $s_institution_zip;?></td>
		</tr>
		<?php } ?>
	</table>
	<div class="gap10"></div> 

	<!--Info4-->
	<h4>Technical Skill</h4>
	<table width="100%" class="table table-striped border">
		  <tr class="tr1">
		    <td><strong>Technical Area</strong></td>
		    <td><strong>Institution Name</strong></td>
		    <td><strong>Start Date</strong></td>
		    <td><strong>End Date</strong></td>
		    <td><strong>Duration</strong></td>
		    <td><strong>Proficiency Level</strong></td>
		  </tr>
		  <?php 
		  while($sql_tech_skills->fetch()) {
			if($s_efficiency_level=='low') $s_efficiency_level='Low';
			if($s_efficiency_level=='i') $s_efficiency_level='Intermediate';
			if($s_efficiency_level=='e') $s_efficiency_level='Expert';
			$tsdate=sysDBDateConvert($s_start_date);
			$tedate=sysDBDateConvert($s_end_date);
			$sql1 = "SELECT category_name FROM master_category where category_id='$s_technical_area'";
			$statement1s=$mysqli->prepare($sql1);	
			$statement1s->execute();
			$statement1s->store_result();
			$statement1s->bind_result($technical_area);		
			$statement1s->fetch();
		 ?>	
		<tr>
			<td><?php echo $technical_area;?></td>
			<td><?php echo $s_institution_name1;?></td>							
			<td><?php echo $tsdate;?></td>
			<td><?php echo $tedate;?></td>
			<td><?php echo $s_duration;?></td>
			<td><?php echo $s_efficiency_level;?></td>
		</tr>
		<?php } ?>
	</table>
	<div class="gap10"></div> 

	<!--Info5-->
	<h4>Certification Details</h4>
	<table width="100%" class="table table-striped border">
		  <tr class="tr1">
		    <td><strong>Exam Name</strong></td>
		    <td><strong>Exam Code</strong></td>
		    <td><strong>Date of Cleared</strong></td>
		  </tr>
		  <?php 
		  while($sql_certi_details->fetch()) {
			$doc=sysDBDateConvert($s_date_of_cleared);
		 ?>	
		<tr>
			<td><?php echo $s_exam_name;?></td>
			<td><?php echo $s_exam_code;?></td>							
			<td><?php echo $doc;?></td>
		</tr>
		<?php } ?>
	</table>	
	<div class="gap10"></div>

	<!--Info6-->
	<h4>Work Experience</h4>
	<table width="100%" class="table table-striped border">
		  <tr class="tr1">
		    <td><strong>Organisation Name</strong></td>
		    <td><strong>Designation</strong></td>
		    <td><strong>Technology</strong></td>
		    <td><strong>Job Role</strong></td>
		    <td><strong>Start Date</strong></td>
		    <td><strong>End Date</strong></td>
		  </tr>
		  <?php 
		  while($sql_wrok_exp->fetch()) {
			$s_date1=sysDBDateConvert($s_start_date1);
			$e_date1=sysDBDateConvert($s_end_date1);
			$sql1 = "SELECT category_name FROM master_category where category_id='$s_job_role'";
			$statement1s=$mysqli->prepare($sql1);	
			$statement1s->execute();
			$statement1s->store_result();
			$statement1s->bind_result($job_role);		
			$statement1s->fetch();
		 ?>	
		<tr>
			<td><?php echo $s_organisation_name;?></td>
			<td><?php echo $s_designation;?></td>							
			<td><?php echo $s_technology;?></td>
			<td><?php echo $job_role;?></td>
			<td><?php echo $s_date1;?></td>
			<td><?php echo $e_date1;?></td>
		</tr>
		<?php } ?>
	</table>	
	<div class="gap10"></div>

<?php if($uType!='CIN' && $uType!='CRC'){ ?>
	<!--Info7-->
	<h4>Rewards and Awards</h4>
	<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Awards</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $sp_awards;?></div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Rewards</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $sp_rewards;?></div>
			<div class="gap1"></div>
		</div>
		<div class="gap30"></div>
	</div>
	<div class="gap20"></div> 
<?php } ?>  		

		<div class="gap20"></div>
	</div>
</div>
<div class="gap30"></div>
<?php include("footer.php"); ?>
