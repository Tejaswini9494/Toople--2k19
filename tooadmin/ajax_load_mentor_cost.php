<?php
require_once '../class/config.php';
require_once '../includes/functions.php';

extract($_REQUEST);

//echo $mentor_sess_id."#".$mentor_currency."#".$mentor_price_amt."#".$mentor_price_name."<br>"; exit;

if($del_id!='') {
	$result = $mysqli->query("DELETE FROM master_mentor_price_temp WHERE mentor_price_temp_id='$del_id' ");
} else {

	$nrows4=0;
	$query4 = "SELECT mentor_price_temp_id FROM  master_mentor_price_temp  WHERE mentor_sess_id='$mentor_sess_id' AND mentor_currency='$mentor_currency'";
	//echo $query2;
	$statement4=$mysqli->prepare($query4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($mentor_price_temp_id4);
	$nrows4=$statement4->num_rows();

	if($nrows4==0) {
	require_once("../class/FormValidator.class.php");//This class for form validation in PHP
	$err=0;
	$fv = new FormValidator();

	//country
	$fv->isEmpty("mentor_price_name", "Please Select Mentor Type");

	//country
	$fv->isEmpty("mentor_currency", "Please Select Currency");

	//cost
	$fv->isEmpty("mentor_price_amt", "Please Enter Mentor Cost");

	//Error message display	

	if ($fv->isError()) {
	    $err=1;
		$errorval=0;
		$errors = $fv->getErrorList();
	
		foreach ($errors as $e) $val.=$e['msg']."<br>";   
		for($j=0;$j<count($errorval);$j++) $val.=$errorval[$j]."<br>";
		$valsuc="N";
	} else {
		/*-------------------------------------------------*/
		$status="A";
		$query1 = "INSERT INTO master_mentor_price_temp (mentor_sess_id, mentor_price_name, mentor_currency, mentor_price_amt, added_date, status) VALUES(?,?,?,?, now(), ?)";
		$statement1 = $mysqli->prepare($query1);
		$statement1->bind_param('sssss', $mentor_sess_id, $mentor_price_name, $mentor_currency, $mentor_price_amt, $status);
		$statement1->execute();
		$costid=$statement1->insert_id;

		/*-------------------------------------------------*/
		$valsuc="Y";
	}
	}
}


$query2 = "SELECT mentor_price_temp_id, mentor_sess_id, mentor_price_name, mentor_currency, mentor_price_amt FROM  master_mentor_price_temp  WHERE mentor_sess_id='$mentor_sess_id'";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($mentor_price_temp_id, $mentor_sess_id, $mentor_price_name, $mentor_currency, $mentor_price_amt);

?>

<?php  if($val!='') { ?>
	<div style="color:#ff0000;padding:10px;" align="center"><?php echo $val;?></div>
<?php } elseif($valsuc=="Y") { ?>
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Mentor Cost successfully added.
	</div>
<?php } elseif($nrows4>0) { ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Mentor Cost already added for this currency.
	</div>
<?php } ?>


	<table class="table table-striped table-bordered">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Mentor Type</td>
			<td>Currency</td>
			<td>Mentor Cost</td>
			<td>Action</td>
		</tr>
	<?php $i=1; while($statement2->fetch()) {
		$query3="select country_name, currency from master_country where country_id=$mentor_currency";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($country_name, $currency);
		$statement3->fetch();
	?>
		<tr class="">
			<td><?php echo $i; ?></td>
			<td><?php echo $mentor_price_name; ?></td>
			<td><?php echo $currency."-".$country_name; ?></td>
			<td><?php echo numbToDesi($mentor_price_amt); ?></td>
			<td><button type="button" onclick="deleteInsiderTips('<?php echo $mentor_price_temp_id;?>', '<?php echo $mentor_sess_id;?>');"><i class="fa fa-trash"></i></button></td>
		</tr>
	<?php } ?>
	</table>


