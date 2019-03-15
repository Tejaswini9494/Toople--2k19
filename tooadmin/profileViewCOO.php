<?php  
$page="profileView3";
$xpan="no";
include_once("../class/config.php");
include_once ("../includes/functions.php");
extract($_REQUEST);



$sql1="SELECT coordinator_id,cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_alt_email,cr_phone,cr_alt_phone,cr_country,cr_state,cr_city,cr_pincode,cr_photo
 FROM co_representative_details WHERE co_representative_details_id='$id'";
$st1=$mysqli->prepare($sql1);
$st1->execute();
$st1->store_result();
$st1->bind_result($coordinator_id,$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_alt_email,$cr_phone,$cr_alt_phone,$cr_country,$cr_state,$cr_city,$cr_pincode,$cr_photo);
$st1->fetch();

$sql5="select user_email from too_users where user_id='$coordinator_id'";
$st5=$mysqli->prepare($sql5);
$st5->execute();
$st5->store_result();
$st5->bind_result($user_email);
$st5->fetch();

include("header.php"); ?>

<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
Representative of Institution Coordinator &raquo;  Detail View
</h3>

<div class="gap10"></div>
 
<h4>Login Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $user_email;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Password</label>
	<div class="col-md-5 col-sm-6 text-bold">xxxx</div>
	<div class="gap1"></div>
</div>

</div> 
<div class="gap10"></div> 

<h4>Organisation Details </h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">ID No</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_id_no;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Designation</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_designation;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Official Language</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_language;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_email;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Phone No </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_phone;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($cr_country);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">State</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getStateName($cr_state);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Suburb/Town/City </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCityName($cr_city);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Postal Code </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $cr_pincode;?></div>
	<div class="gap1"></div>
</div> 

</div>
<?php include("footer.php"); ?>
<?php if($name12=='Representative of Internship Organization'||$name12=='Representative of Institution Coordinator') { ?>
<script>
$('#bank').hide();
</script>
<?php } ?>
