<?php 
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$query1 = "SELECT institution_project_assign_id, institution_project_id, institution_id, student_id FROM  institution_project_assign  WHERE institution_project_assign_id='$id'";	
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id, $institution_project_id, $institution_id, $student_id);
$statement1->fetch();
$statement1->close();

$query2 = "SELECT co_name FROM  customer_organisation  WHERE user_id='$institution_id'";	
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($institution_name);
$statement2->fetch();
$statement2->close();

$query3 = "SELECT s_first_name, s_last_name FROM  student_info  WHERE user_id='$student_id'";	
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($s_first_name, $s_last_name);
$statement3->fetch();
$statement3->close();

$query4 = "SELECT a.name, a.category, a.duration, a.dev_platform, a.created_by, DATE_FORMAT(b.updated_on, '%d') as com_date, DATE_FORMAT(b.updated_on, '%b') as com_month, DATE_FORMAT(b.updated_on, '%Y') as com_year FROM  too_projects a, institution_project b  WHERE a.proj_id=b.project_id AND b.institution_project_id='$institution_project_id'";	
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($proj_name, $category_id, $duration, $dev_platform, $created_by, $com_date, $com_month, $com_year);
$statement4->fetch();
$statement4->close();

if($com_date=='1' || $com_date=='11' || $com_date=='21' || $com_date=='31') {
	$com_date_txt=$com_date."";
} elseif($com_date=='2' || $com_date=='12' || $com_date=='22') {
	$com_date_txt=$com_date."";
} elseif($com_date=='3' || $com_date=='13' || $com_date=='23') {
	$com_date_txt=$com_date."";
} else {
	$com_date_txt=$com_date."";
}


$query5 = "SELECT COUNT(a.student_info_id), a.s_first_name, a.s_last_name, a.s_upload_photo FROM  student_info a, too_users b  WHERE a.user_id=b.user_id AND b.user_id='$created_by' AND b.admin_type!='AD'";	
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($partnerCnt, $part_first_name, $part_last_name, $partner_photo);
$statement5->fetch();
$statement5->close();


$query6 = "SELECT category_name FROM  master_category  WHERE category_id='$category_id'";	
$statement6=$mysqli->prepare($query6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($category_name);
$statement6->fetch();
$statement6->close();


$query7 = "SELECT category_name FROM  master_category  WHERE category_id='$dev_platform'";	
$statement7=$mysqli->prepare($query7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($tech_name);
$statement7->fetch();
$statement7->close();

?>

<html>
<head>
<title>TOOOPLE Certificate</title>
</head>
<body>
<div style="background: transparent url('images/certificateback.png') no-repeat scroll 0px 0px / 100% 100%; width: 900px; padding: 135px 150px 130px; margin: 0px auto;">
	<div style="text-align:center;position:relative;"> 
		<!--<span style="font-size: 20px; float: left; position: absolute; left: 52px; top: 12px;">No</span>-->
		<span style="font-weight: bold; color: rgb(121, 31, 85); font-size: 40px; ">TOOOPLE</span>
		<span style="font-weight: bold; font-size: 40px; position: absolute; right: 26px; ">
		<?php if($partnerCnt!='') { ?>
			<img src="<?php echo $partner_photo; ?>" width="50px">
		<?php } ?>
		</span>
	</div>
	<p style="font-style: italic; text-decoration: underline; font-weight: bold; font-size: 23px;text-align: center;">Project Completion Certificate</p>

	<div style="text-align: left; line-height: 29px; font-size: 16px; padding-left: 0;">This is to certify that <span style="text-transform: uppercase;"><?php echo $s_first_name." ".$s_last_name; ?></span> from <span style="text-transform: uppercase;"><?php echo $institution_name; ?></span> has successfully completed TOOOPLE Pte. Ltd.'s <span style="text-transform: uppercase;"><?php echo $category_name; ?></span> on <span style="text-transform: uppercase;"><?php echo $tech_name; ?></span> lasting a duration of <span style=""><?php echo $duration." weeks, on " .$com_date_txt."-".$com_month ."-". $com_year; ?> </span>	
	</div>
<!--
	<div style="text-align: left; line-height: 29px; font-size: 16px; padding: 25px 0;">TOOOPLE Pte. Ltd. has caused this Certificate to be signed by its duly authorized officers and its Corporate Seal is to be hereunto affixed this  <span style=""><?php echo $com_date_txt; ?> </span>day of  <span style=""><?php echo $com_month; ?></span>,  <span style=""><?php echo $com_year; ?></span>.
	</div>-->

	<div style="display: inline-block; width:26%;font-size:15px">
		<img src="images/redaeal.png" width="86%" style="margin-top: 20px;"><br>
		The Virtual Projects Company 
	</div>

	<div style="display: inline-block; width: 35%;padding-left:13px">
		<p style="padding: 30px 0;">Signed by:</p>
		<hr style="float: left; width: 21%;">
		<p style="padding: 35px 0px 0px 0;">
			Authorised Signatory<br><br>
			TOOOPLE Pte. Ltd. 
		</p>
	</div>
<?php if($partnerCnt!='') { ?>
	<div style="display: inline-block; width:35%; text-align:right;">
		<p style="padding: 30px 0;">Signed by:</p>
		<hr style="float: right; width: 21%;">
		<p style="padding: 35px 0px 0px 0;">
			Authorised Signatory<br><br>
			<?php echo $part_first_name." ".$part_last_name; ?>
		</p>
	</div>
<?php } ?>
</div>

</body>
</html>
<script src="js/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function ($) {
    window.print();
});
</script>
