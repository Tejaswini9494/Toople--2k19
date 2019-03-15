<?php  
$page="profileView2";
$xpan="no";

include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);



$sql1="SELECT representative_service_provider_id,user_id,rsp_org_name,rsp_email,rsp_web,rsp_lang,rsp_phone,rsp_city,rsp_postal,rsp_state,rsp_country,rsp_pan,rsp_tin,rsp_tax,rsp_bank_details,rsp_bank_name,rsp_branch_name,rsp_branch_code,rsp_country1,rsp_type_account,rsp_benefi_name,rsp_account_no,rsp_bank_details1,rsp_agreement,rsp_start_date,rsp_end_date,rsp_note FROM representative_service_provider WHERE representative_service_provider_id='$id'";
$st1=$mysqli->prepare($sql1);
$st1->execute();
$st1->store_result();
$st1->bind_result($representative_service_provider_id,$user_id,$rsp_org_name,$rsp_email,$rsp_web,$rsp_lang,$rsp_phone,$rsp_city,$rsp_postal,$rsp_state,$rsp_country,$rsp_pan,$rsp_tin,$rsp_tax,$rsp_bank_details,$rsp_bank_name,$rsp_branch_name,$rsp_branch_code,$rsp_country1,$rsp_type_account,$rsp_benefi_name,$rsp_account_no,$rsp_bank_details1,$rsp_agreement,$rsp_start_date,$rsp_end_date,$rsp_note);
$st1->fetch();


$sql2="SELECT representative_service_provider_details_id,user_id,rsp_name,rsp_emp_id,rsp_role,rsp_email_id,rsp_alter_email,rsp_phone_no,rsp_alter_phone,rsp_photo FROM representative_service_provider_details WHERE user_id='$user_id'";
$st2=$mysqli->prepare($sql2);
$st2->execute();
$st2->store_result();
$st2->bind_result($representative_service_provider_details_id,$user_id,$rsp_name,$rsp_emp_id,$rsp_role,$rsp_email_id,$rsp_alter_email,$rsp_phone_no,$rsp_alter_phone,$rsp_photo);
$st2->fetch();


$sql3="select user_type from too_users where user_id='$user_id'";
$st3=$mysqli->prepare($sql3);
$st3->execute();
$st3->store_result();
$st3->bind_result($type);
$st3->fetch();

if($type=='SPM'){
$type1='Mentor of Service Provider';
}
elseif($type=='SPC'){
$type1='Content Provider';
}


include("header.php"); ?>

<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
Representative of Service Provider Organization  &raquo;  Detail View
</h3>

<div class="gap10"></div>

<h4>Type of Users</h4>
<div class="viewTab">
<div class="viewTab1 text-center">
<?php echo $type1; ?>
	<div class="gap1"></div>
</div>
</div>
<div class="gap10"></div> 
<h4>Login Info</h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email ID</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_email ?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Password</label>
	<div class="col-md-5 col-sm-6 text-bold">xxxx</div>
	<div class="gap1"></div>
</div>

</div>
<div class="gap10"></div> 

<h4><?php echo $type1; ?> Organization Details </h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Organization Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_org_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_email;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Website Address</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_web;?></div>
	<div class="gap1"></div>
</div>



<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Official Language</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_lang;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Phone Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_phone;?></div>
	<div class="gap1"></div>
</div>


<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($rsp_country);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">State</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getStateName($rsp_state);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Suburb/Town/City </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCityName($rsp_city);?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1">
	<label class="col-md-3 col-sm-6">PAN Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_pan;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">TIN Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_tin;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Service Tax Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_tax;?></div>
	<div class="gap1"></div>
</div>
> 
</div>
<div class="gap10"></div> 

<h4><?php echo $type1; ?> Bank Details  </h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Bank Name </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_bank_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Branch Name </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_branch_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Branch Code </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_branch_code;?></div>
	<div class="gap1"></div>
</div>

<?php
 if ($rsp_type_account==1){
$rsp_type_account1='Current';
}
elseif($rsp_type_account==2){
$rsp_type_account1='Saving';
}
?>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($rsp_country1);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Type of Account  </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_type_account1;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Beneficiary Name  </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_benefi_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Account Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_account_no;?></div>
	<div class="gap1"></div>
</div> 
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Bank Details</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_bank_details1;?></div>
	<div class="gap1"></div>
</div>

</div>
<h4><?php echo $type1; ?> Representative Details </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Name </td>
    <td>Employee ID No.</td>
    <td>Designation/Role </td>
    <td>Email ID</td>
    <td>Alternative Email ID</td>
    <td>Phone Number</td>
    <td>Alternative Phone Number</td>
    
  </tr>
  <tr>
    <td><?php echo $rsp_name;?></td>
    <td><?php echo $rsp_emp_id;?></td>
    <td><?php echo $rsp_role;?></td>
    <td><?php echo $rsp_email_id;?></td>
    <td><?php echo $rsp_alter_email;?></td>
    <td><?php echo $rsp_phone_no;?></td>
    <td><?php echo $rsp_alter_phone;?></td>
    
  </tr>
</table>
<div class="gap10"></div> 

<h4><?php echo $type1; ?> Agreement </h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Agreement No</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_agreement;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Start Date </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo sysDBDateConvert($rsp_start_date);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">End Date </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo sysDBDateConvert($rsp_end_date);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Note </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $rsp_note;?></div>
	<div class="gap1"></div>
</div>

</div>
<div class="gap30"></div> 
 


<?php include("footer.php"); ?>
