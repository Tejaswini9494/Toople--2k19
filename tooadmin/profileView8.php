<?php  
$page="profileView8";
$xpan="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
include("header.php");
extract($_REQUEST);


if($type=='MEN'){
$name12='Mentor of Service Provider Organization';
}
elseif($type=='CP'){
$name12='Content Provider Organization';
}

$sql1="SELECT student_info_id,user_id,s_institution_name,s_first_name,s_last_name,s_dob,s_gender,s_identify_number,s_upload_photo,s_addressline1,
s_addressline2,s_country,s_state,s_city,s_primary_contact,s_email_id,s_alternate_email_id,s_secondary_contact FROM student_info WHERE student_info_id='$id'";
$st1=$mysqli->prepare($sql1);
$st1->execute();
$st1->store_result();
$st1->bind_result($student_info_id,$user_id,$s_institution_name,$s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number,$s_upload_photo,$s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_email_id,$s_alternate_email_id,$s_secondary_contact);
$st1->fetch();

if($s_gender=='m') $s_gender='Male';
if($s_gender=='f') $s_gender='Female';

$sql_info="SELECT rsp_org_name FROM  representative_service_provider WHERE user_id='$s_institution_name'";
$st_info=$mysqli->prepare($sql_info);
$st_info->execute();
$st_info->store_result();
$st_info->bind_result($name);
$st_info->fetch();

$sql_logininfo="SELECT user_email FROM too_users WHERE user_id='$user_id'";
$st_login_info=$mysqli->prepare($sql_logininfo);
$st_login_info->execute();
$st_login_info->store_result();
$st_login_info->bind_result($user_email);
$st_login_info->fetch();




$sql5="SELECT sp_content_provided,sp_service_provided,sp_awards,sp_rewards FROM service_provider_details WHERE user_id='$user_id'";
$st5=$mysqli->prepare($sql5);
$st5->execute();
$st5->store_result();
$st5->bind_result($sp_content_provided,$sp_service_provided,$sp_awards,$sp_rewards);
$st5->fetch();

$sql_log="SELECT category_name FROM master_category WHERE category_id='$sp_service_provided'";
$st_log=$mysqli->prepare($sql_log);
$st_log->execute();
$st_log->store_result();
$st_log->bind_result($provider);
$st_log->fetch();
 ?>

<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
<?php echo $name12;?>  &raquo;  Detail View
</h3>

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
	<div class="col-md-5 col-sm-6 text-bold">password</div>
	<div class="gap1"></div>
</div>


</div> 
<div class="gap10"></div> 
<h4>Personal Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Organisation Belong to</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $name ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">First Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_first_name ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Last Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo  $s_last_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Date of Birth</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo sysDBDateConvert($s_dob) ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Gender</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo  $s_gender;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Identity Number</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_identify_number ;?></div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 

<h4>Contact Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Address Line1</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo  $s_addressline1;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Address Line2</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_addressline2 ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($s_country) ;?></div>
	<div class="gap1"></div>
</div>


<div class="viewTab1">
	<label class="col-md-3 col-sm-6">State</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getStateName($s_state);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">City</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCityName($s_city) ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Primary Contact</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo  $s_primary_contact;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email ID</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_email_id;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Alternate Email ID</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_alternate_email_id ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Secondary Contact </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_secondary_contact ;?></div>
	<div class="gap1"></div>
</div> 
</div>
<div class="gap10"></div> 


<h4>Educational Qualification</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Program</td>
    <td>Department</td>
    <td>Yr of Str</td>
    <td>Yr of Complt</td>
    <td>% Achvd</td>
    <td> University Name</td>
    <td>Institution Name</td>
    <td>Institution Country</td>
    <td>Institution State</td>
    <td>Institution City</td>
    <td>Institution Zip</td>
  </tr>
<?php 
$sql2="SELECT s_program,s_branch,s_year_of_start,s_year_of_completion,s_percentage_achieved,s_university_name,s_institution_name,s_institution_country,
s_institution_state,s_institution_city,s_institution_zip FROM student_qualifications WHERE user_id='$user_id'";
$st2=$mysqli->prepare($sql2);
$st2->execute();
$st2->store_result();
$st2->bind_result($s_program1,$s_branch1,$s_year_of_start1,$s_year_of_completion1,$s_percentage_achieved1,$s_university_name1,$s_institution_name1,$s_institution_country1,$s_institution_state1,$s_institution_city1,$s_institution_zip1);
while($st2->fetch())
{
$s_startdate=sysConvertYear($s_year_of_start1);
	$s_enddate=sysConvertYear($s_year_of_completion1);
	$sql1 = "SELECT category_name FROM master_category where category_id='$s_program1'";
	$statement1s=$mysqli->prepare($sql1);	
	$statement1s->execute();
	$statement1s->store_result();
	$statement1s->bind_result($program_name);		
	$statement1s->fetch();
	$sql2= "SELECT subcategory_name FROM master_subcategory where subcategory_id='$s_branch1'";
	$statement2=$mysqli->prepare($sql2);	
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($branch_name);		
	$statement2->fetch();
?>
  <tr>
    <td><?php echo  $program_name;?></td>
    <td><?php echo  $branch_name;?></td>
    <td><?php echo  $s_startdate;?></td>
    <td><?php echo  $s_startdate;?></td>
    <td><?php echo $s_percentage_achieved1 ;?></td>
    <td><?php echo $s_university_name1 ;?></td>
    <td><?php echo $s_institution_name1 ;?></td>
    <td><?php echo  getCountryName($s_institution_country1);?></td>
    <td><?php echo  getStateName($s_institution_state1);?></td>
    <td><?php echo  getCityName($s_institution_city1);?></td>
      <td><?php echo  $s_institution_zip1;?></td>
  </tr>
<?php
} 
?>
</table>
<div class="gap10"></div> 
<h4>Technical Skills</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Technical Area</td>
    <td>Institution Name</td>
    <td>Start Date</td>
    <td>End Date</td>
    <td>Duration</td>
    <td>Proficiency Level</td>
  </tr>
<?php 
$sql3="SELECT s_technical_area,s_institution_name,s_start_date,s_end_date,s_duration,s_efficiency_level FROM student_technical_skills WHERE user_id='$user_id'";
$st3=$mysqli->prepare($sql3);
$st3->execute();
$st3->store_result();
$st3->bind_result($s_technical_area2,$s_institution_name2,$s_start_date2,$s_end_date2,$s_duration2,$s_efficiency_level2);
while($st3->fetch())
{
$sqlt = "SELECT category_name FROM master_category WHERE category_id='$s_technical_area2'";
$statement1t=$mysqli->prepare($sqlt);	
$statement1t->execute();
$statement1t->store_result();
$statement1t->bind_result($tech_name);		
$statement1t->fetch();

if($s_efficiency_level2=='L') $s_efficiency_level2='Low';
if($s_efficiency_level2=='I') $s_efficiency_level2='Intermediate';
if($s_efficiency_level2=='E') $s_efficiency_level2='Expert';
?>
  <tr>
    <td height="21"><?php echo $tech_name ;?></td>
    <td><?php echo $s_institution_name2 ;?></td>
    <td><?php echo sysDBDateConvert($s_start_date2) ;?></td>
    <td><?php echo  sysDBDateConvert($s_end_date2);?></td>
    <td><?php echo $s_duration2 ;?></td>
    <td><?php echo $s_efficiency_level2 ;?></td>
  </tr>
<?php
} 
?>
</table>
<div class="gap10"></div> 


<h4>Cetification Details</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Exam Name</td>
    <td>Exam Code</td>
    <td>Date of Cleared</td>
  </tr>
<?php
$sql5="SELECT s_exam_name,s_exam_code,s_date_of_cleared FROM student_certifcation_details WHERE user_id='$user_id'";
$st5=$mysqli->prepare($sql5);
$st5->execute();
$st5->store_result();
$st5->bind_result($s_exam_name,$s_exam_code,$s_date_of_cleared);
while($st5->fetch())
{
?>
  <tr>
    <td height="21"><?php echo  $s_exam_name ;?></td>
    <td><?php echo  $s_exam_code ;?></td>
    <td><?php echo sysDBDateConvert($s_date_of_cleared) ;?></td>
  </tr>
<?php
}
?>
</table>
<div class="gap10"></div> 


<h4>Work Experienace </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Organisation Name</td>
    <td>Desgination</td>
    <td>Technology</td>
     <td>Job Role</td>
    <td>Start Date</td>
    <td>End Date</td>
  </tr>

<?php

$sql4="SELECT s_organisation_name,s_work_experience,s_technology,s_job_role,s_start_date,s_end_date FROM student_work_experience WHERE user_id='$user_id'";
$st4=$mysqli->prepare($sql4);
$st4->execute();
$st4->store_result();
$st4->bind_result($s_organisation_name3,$s_work_experience3,$s_technology3,$s_job_role3,$s_start_date3,$s_end_date3);
while($st4->fetch())
{
$sqlj = "SELECT category_name FROM master_category where category_id='$s_job_role3'";
$statement1j=$mysqli->prepare($sqlj);	
$statement1j->execute();
$statement1j->store_result();
$statement1j->bind_result($job_role);		
$statement1j->fetch();
?>
  <tr>
    <td height="21"><?php echo $s_organisation_name3 ;?></td>
    <td><?php echo $s_work_experience3 ;?></td>
    <td><?php echo $s_technology3 ;?></td>
    <td><?php echo $job_role ;?></td>
     <td><?php echo sysDBDateConvert($s_start_date3) ;?></td>
        <td><?php echo sysDBDateConvert($s_end_date3) ;?></td>
  </tr>
<?php
}
?>
</table>
<div class="gap30"></div> 
 
<div class="gap10"></div> 
<h4>Service Providing</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6"> Provider</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $provider ;?></div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 
<h4>Rewards and Awards</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Awards</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $sp_awards ;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Rewards</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $sp_rewards ;?></div>
	<div class="gap1"></div>
</div>
</div>
<div class="gap30"></div> 
<?php include("footer.php"); ?>
