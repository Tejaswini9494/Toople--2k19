<?php 
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

$sqlS = "SELECT mentor_temp_type,mentor_temp_hours FROM too_mentorhours_temp WHERE sesshr_id='$order_id'";
$statementS=$mysqli->prepare($sqlS);
$statementS->execute();
$statementS->store_result();
$statementS->bind_result($mentor_type,$mentor_hours);
?>

	<table class="table table-striped table-bordered">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Mentor Type</td>
			<td>Hour(s)</td>
		</tr>
<?php 
$i=1; 
while($statementS->fetch()) {
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $mentor_type; ?></td>
			<td><?php echo $mentor_hours; ?></td>
		</tr>
<?php $i++; } ?>
	</table>
