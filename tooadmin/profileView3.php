<?php  
$page="profileView3";
$xpan="no";
include_once("../class/config.php");
include_once ("../includes/functions.php");
extract($_REQUEST);



$sql1="SELECT customer_organisation_id,user_id,co_name,co_email,co_website,co_language,co_phone,co_fax,co_address,co_country,co_state,co_city,co_pincode,co_pan_number,co_tin_number,co_taxno,co_bank_details
 FROM customer_organisation WHERE customer_organisation_id='$id'";
$st1=$mysqli->prepare($sql1);
$st1->execute();
$st1->store_result();
$st1->bind_result($customer_organisation_id,$user_id,$co_name,$co_email,$co_website,$co_language,$co_phone,$co_fax,$co_address,$co_country,$co_state,$co_city,$co_pincode,$co_taxno,$co_pan_number,$co_tin_number,$co_bank_details);
$st1->fetch();





$sql5="select user_email from too_users where user_id='$user_id'";
$st5=$mysqli->prepare($sql5);
$st5->execute();
$st5->store_result();
$st5->bind_result($user_email);
$st5->fetch();
if($type=='CIN'){
$name12='Representative of Institution Organization';
}
elseif($type=='CIS'){
$name12='Representative of Internship Organization';
}
elseif($type=='CRC'){
$name12='Representative of Recruiting Organization';
}
elseif($type=='COO'){
$name12='Representative of Institution Coordinator';
}



include("header.php"); ?>

<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
<?php echo $name12; ?> &raquo;  Detail View
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
	<div class="col-md-5 col-sm-6 text-bold">xxxx</div>
	<div class="gap1"></div>
</div>


</div> 
<div class="gap10"></div> 

<h4>Organisation Details </h4>
<div class="viewTab">
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Organisation Name</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_name;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Email</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_email;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Website Address</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_website;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Official Language</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_language;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Phone Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_phone;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Fax </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_fax;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Address </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_address;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Country</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCountryName($co_country);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">State</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getStateName($co_state);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Suburb/Town/City </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo getCityName($co_city);?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Postal Code </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_pincode;?></div>
	<div class="gap1"></div>
</div> 
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">PAN Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_pan_number;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">TIN Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_tin_number;?></div>
	<div class="gap1"></div>
</div>
<div class="viewTab1">
	<label class="col-md-3 col-sm-6">Service Tax Number </label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_taxno;?></div>
	<div class="gap1"></div>
</div>

<div class="viewTab1" id="bank">
	<label class="col-md-3 col-sm-6">Bank Details</label>
	<div class="col-md-5 col-sm-6 text-bold"><?php echo $co_bank_details;?></div>
	<div class="gap1"></div>
</div>
 <?php ?>
</div>
<div class="gap10"></div> 
<h4>Representative Details </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Name </td>
    <td>ID No.</td>
    <td>Designation/Role </td>
    <td>Language </td>
    <td>Email Address</td>
    <td id="alteremail">Alternative Email ID</td>
    <td>Phone Number</td>
    <td id="alterphone">Alternative Phone Number</td>
    <td>Country</td>
    <td>State</td>
    <td>City</td>
    <td>Postal Code</td>
    
  </tr>

<?php 
$sql2="SELECT co_representative_details_id,user_id,cr_name,cr_id_no,cr_designation,cr_language,cr_email,cr_alt_email,cr_phone,cr_alt_phone,cr_city,cr_pincode,cr_country,cr_state,cr_photo FROM co_representative_details WHERE user_id='$user_id'";
$st2=$mysqli->prepare($sql2);
$st2->execute();
$st2->store_result();
$st2->bind_result($co_representative_details_id,$user_id,$cr_name,$cr_id_no,$cr_designation,$cr_language,$cr_email,$cr_alt_email,$cr_phone,$cr_alt_phone,$cr_city,$cr_pincode,$cr_country,$cr_state,$state);
while($st2->fetch())
{
?>
  <tr>
    <td><?php echo $cr_name;?></td>
    <td><?php echo $cr_id_no;?></td>
    <td><?php echo $cr_designation;?></td>
    <td><?php echo $cr_language;?></td>
    <td><?php echo $cr_email;?></td>
    <td class="alteremail1"><?php echo $cr_alt_email;?></td>
    <td><?php echo $cr_phone;?></td>
    <td class="alterphone1"><?php echo $cr_alt_phone;?></td>
    <td><?php echo getCountryName($cr_country);?></td>
    <td><?php echo getStateName($cr_state);?></td>
    <td><?php echo getCityName($cr_city);?></td>
    <td><?php echo $cr_pincode;?></td>
  </tr>
<?php } ?>
</table>
<div class="gap10"></div> 

<h4>Agreement</h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Agreement No </td>
    <td>Start Date</td>
    <td>End Date </td>
    <td>Pay Date </td>
    <td>Pay Amount</td>
    <td id="note">Note</td>
  </tr>
<?php 


$sql3="SELECT co_agreement_id,user_id,ca_agree_no,ca_start_date,ca_end_date,ca_pay_date,ca_pay_amt,ca_note FROM co_agreement WHERE user_id='$user_id'";
$st3=$mysqli->prepare($sql3);
$st3->execute();
$st3->store_result();
$st3->bind_result($co_agreement_id,$user_id,$ca_agree_no,$ca_start_date,$ca_end_date,$ca_pay_date,$ca_pay_amt,$ca_note);
while($st3->fetch())
{
?>

  <tr>
    <td><?php echo $ca_agree_no;?></td>
    <td><?php echo sysDBDateConvert($ca_start_date);?></td>
    <td><?php echo sysDBDateConvert($ca_end_date);?></td>
    <td><?php echo sysDBDateConvert($ca_pay_date);?></td>
    <td><?php echo $ca_pay_amt;?></td>
    <td class="note1"><?php echo $ca_note;?></td>  
  </tr>
<?php } ?>
</table>

<div class="gap10"></div> 
<h4>Drop Down Details </h4>
<table width="100%" class="table table-striped border">
  <tr>
    <td>Type of procurement</td>
    <td>Price</td>
    <td>Unit of measure</td>
    <td>Quality </td>
    <td>Draw Down Amount</td>  
  </tr>
<?php
      

$sql4="SELECT draw_down_payment_details_id,user_id,type_of_procurement,price,unit_of_measure,quality,draw_down_amount FROM draw_down_payment_details WHERE user_id='$user_id'";
$st4=$mysqli->prepare($sql4);
$st4->execute();
$st4->store_result();
$st4->bind_result($draw_down_payment_details_id,$user_id,$type_of_procurement,$price,$unit_of_measure,$quality,$draw_down_amount);
while($st4->fetch())
{
if($type_of_procurement=='1'){
$ab1='Buy Projects';
}
elseif($type_of_procurement=='2'){
$ab1='mentor service type';
}


?>
  <tr>
    <td><?php echo $ab1;?></td>
    <td><?php echo $price;?></td>
    <td><?php echo $unit_of_measure;?></td>
    <td><?php echo $quality;?></td>
    <td><?php echo $draw_down_amount;?></td>
  </tr>
<?php } ?>
</table>




<?php include("footer.php"); ?>
<?php if($name12=='Representative of Internship Organization'||$name12=='Representative of Institution Coordinator') { ?>
<script>
$('#bank').hide();
</script>
<?php } ?>

<?php if($name12=='Representative of Institution Organization') { ?>
<script>
$('#alteremail').hide();
$('#alterphone').hide();
$('#note').hide();
$('.note1').hide();
$('.alteremail1').hide();
$('.alterphone1').hide();
</script>
<?php } ?>


