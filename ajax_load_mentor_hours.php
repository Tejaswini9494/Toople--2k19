<?php
require_once 'class/config.php';
require_once 'includes/functions.php';

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id11=$_SESSION["userid"];

//echo $mentor_currency."#".mentor_price_amt."#".mentor_price_name."<br>";
//exit;

//echo $hid_proj_count."#".$nrows2aa1;

if($del_id!='') {
	$result = $mysqli->query("DELETE FROM too_mentorhours_temp WHERE mentorhours_temp_id='$del_id' ");
} else {

	require_once("class/FormValidator.class.php");//This class for form validation in PHP
	$err=0;
	$fv = new FormValidator();

	//country
	$fv->isEmpty("mentor_temp_type", "Please Select Type");

	//cost
	$fv->isEmpty("mentor_temp_hours", "Please Enter Hours");

	//Error message display	

	if ($fv->isError()) {
	    $err=1;
		$errorval=0;
		$errors = $fv->getErrorList();
	
		foreach ($errors as $e) $val.=$e['msg']."<br>";   
		for($j=0;$j<count($errorval);$j++) $val.=$errorval[$j]."<br>";
		$valsuc="N";
	} else {
		if($hid_proj_count > $nrows2aa1) {
			/*-------------------------------------------------*/



			if($user_id11!='' && $type=='CIN') {
				$query3ab = "SELECT co_country FROM  customer_organisation  WHERE user_id=$user_id11";
			} elseif($user_id11!='' && $type=='SP') {
				$query3ab = "SELECT s_country FROM  student_info  WHERE user_id=$user_id11";
			}

			$statement3ab=$mysqli->prepare($query3ab);
			$statement3ab->execute();
			$statement3ab->store_result();
			$statement3ab->bind_result($co_country3ab);
			$statement3ab->fetch();

			$query3aa = "SELECT mentor_price_amt FROM  master_mentor_price  WHERE mentor_price_name='$mentor_temp_type' AND mentor_currency=$co_country3ab";
			//echo $query3aa; exit;
			$statement3aa=$mysqli->prepare($query3aa);
			$statement3aa->execute();
			$statement3aa->store_result();
			$statement3aa->bind_result($mentor_price_amt);
			$statement3aa->fetch();
			$mentor_tot_amt=$mentor_price_amt*$mentor_temp_hours;

			$status="A";
			$query1 = "INSERT INTO too_mentorhours_temp (sesshr_id, hid_proj, mentor_temp_type, mentor_temp_hours, mentor_tot_amt, added_date, status) VALUES(?,?,?,?,?, now(), ?)";
			$statement1 = $mysqli->prepare($query1);
			$statement1->bind_param('ssssss', $sesshr_id, $hid_proj, $mentor_temp_type, $mentor_temp_hours, $mentor_tot_amt, $status);
			$statement1->execute();
			$costid=$statement1->insert_id;

			/*-------------------------------------------------*/
			$valsuc="Y";
		}
	}
}

$nrows2aa1=0;
$query2aa = "SELECT mentorhours_temp_id, sesshr_id, hid_proj, mentor_temp_type, mentor_temp_hours, mentor_tot_amt FROM  too_mentorhours_temp  WHERE sesshr_id='$sesshr_id'";
//echo $query2aa;
$statement2aa=$mysqli->prepare($query2aa);
$statement2aa->execute();
$statement2aa->store_result();
$statement2aa->bind_result($mentorhours_temp_id, $sesshr_id, $hid_proj, $mentor_temp_type, $mentor_temp_hours, $mentor_tot_amt);
$mentor_all_amt=0;
$nrows2aa1=$statement2aa->num_rows();

if($hid_proj_count == $nrows2aa1) {
	$validCnt="Y";
} else {
	$validCnt="N";
}
?>
<?php  if($val!='') { ?>
    <!--<div style="color:#ff0000;padding:10px;" align="center"><?php echo $val;?></div>-->
<?php } elseif($valsuc=="Y") { ?>
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Mentor Hours successfully added.
	</div>
<?php } ?>
	<input type="hidden" id="nrows2aa1" name="nrows2aa1" value="<?php echo $nrows2aa1; ?>">
	<input type="hidden" id="modalValid" name="modalValid" value="<?php echo $validCnt; ?>">
	<table class="table table-striped table-bordered">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Mentor Type</td>
			<td>Hour(s)</td>
			<td>Action</td>
		</tr>
	<?php $i=1; while($statement2aa->fetch()) {
		$mentor_all_amt=$mentor_all_amt+$mentor_tot_amt;
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $mentor_temp_type; ?></td>
			<td><?php echo $mentor_temp_hours; ?></td>
			<td><button type="button" onclick="deleteInsiderTips('<?php echo $mentorhours_temp_id;?>', '<?php echo $sesshr_id;?>');"><i class="fa fa-trash"></i></button></td>
		</tr>
	<?php $i++; } ?>
	</table>
	<input type='hidden' id="temp_tot" name="temp_tot" value="<?php echo $mentor_all_amt; ?>">

