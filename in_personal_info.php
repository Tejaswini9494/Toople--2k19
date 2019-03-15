
<?php
$sql_personalinfo = "SELECT user_id, s_first_name, s_last_name, s_dob, s_gender, s_identify_number, s_addressline1, s_addressline2, s_country, s_state, s_city, s_primary_contact, s_email_id, s_secondary_contact FROM student_info  where user_id='$userr_id'";
$sql_personal_info=$mysqli->prepare($sql_personalinfo);
$sql_personal_info->execute();
$sql_personal_info->store_result();
$sql_personal_info->bind_result($user_id, $s_first_name, $s_last_name, $s_dob, $s_gender, $s_identify_number, $s_addressline1, $s_addressline2, $s_country, $s_state, $s_city, $s_primary_contact, $s_email_id, $s_secondary_contact);
$sql_personal_info->fetch();

if($s_gender=='m') $s_gender='Male';
if($s_gender=='f') $s_gender='Female';
$s_dob1=sysDBDateConvert($s_dob);

//echo $user_id."####".$sql_personalinfo;
?>

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
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $s_email_id;?></div>
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
</div>
<div class="gap10"></div> 

