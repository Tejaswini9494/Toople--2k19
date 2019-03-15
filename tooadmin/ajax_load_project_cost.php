<?php
require_once '../class/config.php';
require_once '../includes/functions.php';

extract($_REQUEST);

//echo $country."#".$cost."#".$proj_temp_id."#".$et."#".$start."<br>";
//exit;

if($del_id!='') {
	if($et!='Y') {
		$result = $mysqli->query("DELETE FROM too_project_cost_temp WHERE projcost_temp_id='$del_id' ");
	} else {
		$result = $mysqli->query("DELETE FROM too_project_cost WHERE projcost_id='$del_id' ");
	}
} else {

	if($start!='str') {

		require_once("../class/FormValidator.class.php");//This class for form validation in PHP
		$err=0;
		$fv = new FormValidator();

		//country
		$fv->isEmpty("country", "Please Select Country");

		//cost
		$fv->isEmpty("cost", "Please Enter Cost");

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
			if($et!='Y') {
				$query1 = "INSERT INTO too_project_cost_temp (proj_temp_id, country_temp, cost_temp, added_date, status) VALUES(?,?,?, now(), ?)";
			} else {
				$query1 = "INSERT INTO too_project_cost (proj_id, country, cost, added_date, status) VALUES(?,?,?, now(), ?)";
			}

			$statement1 = $mysqli->prepare($query1);
			$statement1->bind_param('isss', $proj_temp_id, $country, $cost, $status);
			$statement1->execute();
			$costid=$statement1->insert_id;

			/*-------------------------------------------------*/
			?>
			<script>empty_form('project_submit3');</script>
			<?php
			$valsuc="Y";
		}
	}
}

//echo $et."3<br>";
if($et!='Y') {
	$query2 = "SELECT projcost_temp_id, proj_temp_id, country_temp, cost_temp FROM  too_project_cost_temp  WHERE proj_temp_id=$proj_temp_id";
} else {
	$query2 = "SELECT projcost_id, proj_id, country, cost FROM  too_project_cost  WHERE proj_id=$proj_temp_id";
}

//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($projcost_temp_id, $proj_temp_id1, $country_temp, $cost_temp);

?>

<?php  if($val!='') { ?>
    <div style="color:#ff0000;padding:10px;" align="center"><?php echo $val;?></div>
<?php } elseif($valsuc=="Y") { ?>
	<div class="alert alert-success alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Product Cost successfully added.
	</div>
<?php } ?>

	<div class="table-responsive">
	<table class="table table-bordered table-striped tabBorder dataTable no-footer">
		<tr class="tr1">
			<td width="50px">S.No.</td>
			<td>Country</td>
			<td>Currency</td>
			<td>Cost</td>
			<td>Action</td>
		</tr>
	<?php $i=1; while($statement2->fetch()) {
		$query3 = "SELECT country_name, currency FROM  master_country  WHERE country_id=$country_temp";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($country_name, $currency);
		$statement3->fetch();
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $country_name; ?></td>
			<td><?php echo $currency; ?></td>
			<td><?php echo numbToDesi($cost_temp); ?></td>
			<td align="center"><button type="button" onclick="deleteInsiderTips('<?php echo $projcost_temp_id;?>', '<?php echo $proj_temp_id1;?>', '<?php echo $et;?>');"><i class="fa fa-trash"></i></button></td>
		</tr>
	<?php $i++; } ?>
	</table>
	</div>

