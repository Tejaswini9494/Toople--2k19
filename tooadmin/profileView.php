<?php  
$page="profileView";
$xpan="no";
include("header.php"); 
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
//echo $id;

if($type=='SP'){
$name12='Project Student';
}
elseif($type=='SI'){
$name12='Intern Student';
}

$sql=$sql_login_info="SELECT user_id FROM student_info WHERE student_info_id='$id'";
$st=$mysqli->prepare($sql);
$st->execute();
$st->store_result();
$st->bind_result($user_id);
$st->fetch();


$sql_logininfo="SELECT user_email FROM too_users WHERE user_id='$user_id'";
$st_login_info=$mysqli->prepare($sql_logininfo);
$st_login_info->execute();
$st_login_info->store_result();
$st_login_info->bind_result($user_email);
$st_login_info->fetch();


$sql_personalinfo = "SELECT s_first_name,s_last_name,s_dob,s_gender,s_identify_number FROM student_info  where user_id='$user_id'";
$sql_personal_info=$mysqli->prepare($sql_personalinfo);
$sql_personal_info->execute();
$sql_personal_info->store_result();
$sql_personal_info->bind_result($s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number);
$sql_personal_info->fetch();


if($s_gender=='m') $s_gender='Male';
if($s_gender=='f') $s_gender='Female';
$s_dob1=sysDBDateConvert($s_dob);


$sql_contactinfo = "SELECT s_addressline1,s_addressline2,s_country,s_state,s_city,s_primary_contact,s_secondary_contact FROM  student_info  where user_id='$user_id'";
$sql_contact_info=$mysqli->prepare($sql_contactinfo);
$sql_contact_info->execute();
$sql_contact_info->store_result();
$sql_contact_info->bind_result($s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_secondary_contact);
$sql_contact_info->fetch();


$sql_eduqualiinfo = "SELECT s_qualification_id,s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_institution_name,s_institution_country,
s_institution_state,s_institution_city,s_institution_zip FROM  student_qualifications  where user_id='$user_id' ORDER BY Created_on DESC";
$sql_edu_quali_info=$mysqli->prepare($sql_eduqualiinfo);
$sql_edu_quali_info->execute();
$sql_edu_quali_info->store_result();
$sql_edu_quali_info->bind_result($s_qualification_id,$s_program,$s_branch,$s_year_of_start,$s_year_of_completion,$s_percentage_achieved,$s_institution_name,$s_institution_country,
$s_institution_state,$s_institution_city,$s_institution_zip);
//echo $sql_eduqualiinfo;


$sql_techskills = "SELECT s_technical_id,s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills where user_id='$user_id' ORDER BY Created_on DESC";
$sql_tech_skills=$mysqli->prepare($sql_techskills);
$sql_tech_skills->execute();
$sql_tech_skills->store_result();
$sql_tech_skills->bind_result($s_technical_id,$s_technical_area,$s_institution_name,$s_start_date,$s_end_date,$s_duration,$s_efficiency_level);



$sql_certidetails = "SELECT s_certification_id,s_exam_name,s_date_of_cleared FROM student_certifcation_details where user_id='$user_id' ORDER BY Created_on DESC";
$sql_certi_details=$mysqli->prepare($sql_certidetails);
$sql_certi_details->execute();
$sql_certi_details->store_result();
$sql_certi_details->bind_result($s_certification_id,$s_exam_name,$s_date_of_cleared);


$sql_workexp = "SELECT s_experience_id,s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date FROM student_work_experience where user_id='$user_id' ORDER BY Created_on DESC";
$sql_wrok_exp=$mysqli->prepare($sql_workexp);
$sql_wrok_exp->execute();
$sql_wrok_exp->store_result();
$sql_wrok_exp->bind_result($s_experience_id,$s_organisation_name,$s_work_experience,$s_technology,$s_job_role,$s_start_date,$s_end_date);			
?>

<?php if($_SESSION["usertype"]==1) { ?>
<h3>
<span class="pull-right">
<a href="Javascript:history.back()" class="submitM">Back</a>
<a href="userAdd.php" class="submitM">Edit</a>
</span>
My Profile &raquo;  Detail View</h3>
<?php } else{?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Student &raquo;  Detail View</h3>
<?php } ?>


<div class="gap10"></div>

<h4>Type of Users</h4>
<div class="viewTab">
<div class="viewTab1 text-center">
<?php echo $name12; ?>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 
<h4>Login Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email ID</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $user_email;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Password</label>
	<div class="col-md-5 col-sm-6 text-bold">****************</div>
	<div class="gap1"></div>
</div>



</div>
<div class="gap10"></div> 
<h4>Personal Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_first_name." ".$s_last_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Date of Birth</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_dob;?></div>
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
</div>
<div class="gap10"></div> 

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
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Secondary Contact </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_secondary_contact;?></div>
	<div class="gap1"></div>
</div> 
</div>
<div class="gap10"></div> 


<h4>Educational Qualification</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td><strong>Program</strong></td>
    <td><strong>Department</strong></td>
    <td><strong>Yr of Str</strong></td>
    <td><strong>Yr of Complt</strong></td>
    <td><strong>% Achvd</strong></td>
    <td><strong>Institution Name</strong></td>
    <td><strong>Institution Country</strong></td>
    <td><strong>Institution State</strong></td>
    <td><strong>Institution City</strong></td>
    <td><strong>Institution Zip</strong></td>
  </tr>
<?php 
while($sql_edu_quali_info->fetch()) {
	$s_startdate=sysConvertYear($s_year_of_start);
	$s_enddate=sysConvertYear($s_year_of_completion);
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
		<td><?php echo $s_startdate;?></td>
		<td><?php echo $s_enddate;?></td>
		<td><?php echo $s_percentage_achieved;?></td>
		<td><?php echo $s_institution_name;?></td>							
		<td><?php echo getCountryName($s_institution_country);?></td>
		<td><?php echo getStateName($s_institution_state);?></td>
		<td><?php echo getCityName($s_institution_city);?></td>
		<td><?php echo $s_institution_zip;?></td>
	</tr>
<?php } ?>
</table>
<div class="gap10"></div> 
<h4>Technical Skills</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td><strong>Technical Area</strong></td>
    <td><strong>Trained By</strong></td>
    <td><strong>Trained From</strong></td>
    <td><strong>Trained Upto</strong></td>
    <td><strong>Knowledge Level</strong></td>
  </tr>
<?php 
  while($sql_tech_skills->fetch()) {
$sqlC = "SELECT category_name FROM master_category WHERE category_id='$s_technical_area'";
$statement1C=$mysqli->prepare($sqlC);	
$statement1C->execute();
$statement1C->store_result();
$statement1C->bind_result($program_name);		
$statement1C->fetch();

		if($s_efficiency_level=='low') $s_efficiency_level='Low';
		if($s_efficiency_level=='i') $s_efficiency_level='Intermediate';
		if($s_efficiency_level=='e') $s_efficiency_level='Expert';
		$s_startdate=sysConvertYear($s_start_date);
		$s_enddate=sysConvertYear($s_end_date);
?>
	<tr>
		<td><?php echo $program_name;?></td>
		<td><?php echo $s_institution_name;?></td>
		<td><?php echo $s_startdate;?></td>
		<td><?php echo $s_enddate;?></td>
		<td><?php echo $s_efficiency_level;?></td>
	
	</tr>
<?php } ?>
</table>
<div class="gap10"></div> 
<h4>Cetification Details</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td><strong>Select Certification Name</strong></td>
    <td><strong>Date of Cleared</strong></td>
  </tr>
  <?php 

 while($sql_certi_details->fetch()) {
	
	$s_date=sysConvertYear($s_date_of_cleared);
?>
<tr>
	<td><?php echo $s_exam_name;?></td>
	<td><?php echo $s_date_of_cleared;?></td>
</tr>
		<?php } ?>
</table>
<div class="gap10"></div> 
<h4>Work Experienace </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td><strong>Organisation Name</strong></td>
    <td><strong>Desigination</strong></td>
    <td><strong>Str Date</strong></td>
    <td><strong>End date</strong></td>
  </tr>
<?php
  while($sql_wrok_exp->fetch()) {
			
		?>
			<tr>
				<td><?php echo $s_organisation_name;?></td>
				<td><?php echo $s_work_experience;?></td>

				<td><?php echo $s_start_date;?></td>
				<td><?php echo $s_end_date;?></td>
				
						</tr>
<?php } ?>
</table>
<div class="gap30"></div> 
 
 
<div class="gap30"></div>


<?php include("footer.php"); ?>
