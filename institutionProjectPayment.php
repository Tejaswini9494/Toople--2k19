<?php
$page="paySummary";
$title="Payment Summary";
include("header.php"); 


?>

<h3 class="">Payment Summary</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td width="50">S.No.</td>
			<td>Project Code</td>
			<td>Project Name</td>
			<td width="100">Quantity</td>
			<td width="100">No. of Students</td>
			<td>Unit Price</td>
			<td>Net Price</td>
			<td>Mentor Details</td>
			<td>Total Price</td>
		</tr>
		<tr>
			<td>1</td>
			<td>CM11-IATA-ACD</td>
			<td>Project Title</td>
			<td>1</td>
			<td>4</td>
			<td>300.00</td>
			<td>1200.00</td>
			<td>High (500.00)<br>Medium (350.00)<br>Junior (200.00)</td>
			<td>2000.00</td>
		</tr>
		<tr>
			<td>2</td>
			<td>CM11-IATA-ACD</td>
			<td>Project Title</td>
			<td>1</td>
			<td>4</td>
			<td>300.00</td>
			<td>1200.00</td>
			<td>High (500.00)<br>Medium (350.00)<br>Junior (200.00)</td>
			<td>2000.00</td>
		</tr>
		<tr>
			<td>3</td>
			<td>CM11-IATA-ACD</td>
			<td>Project Title</td>
			<td>1</td>
			<td>4</td>
			<td>300.00</td>
			<td>1200.00</td>
			<td>High (500.00)<br>Medium (350.00)<br>Junior (200.00)</td>
			<td>2000.00</td>
		</tr>
		<tr>
			<td>4</td>
			<td>CM11-IATA-ACD</td>
			<td>Project Title</td>
			<td>1</td>
			<td>4</td>
			<td>300.00</td>
			<td>1200.00</td>
			<td>High (500.00)<br>Medium (350.00)<br>Junior (200.00)</td>
			<td>2000.00</td>
		</tr>
		<tr>
			<td>5</td>
			<td>CM11-IATA-ACD</td>
			<td>Project Title</td>
			<td>1</td>
			<td>4</td>
			<td>300.00</td>
			<td>1200.00</td>
			<td>High (500.00)<br>Medium (350.00)<br>Junior (200.00)</td>
			<td>2000.00</td>
		</tr>
		<tr>
			<td colspan="8" align="right">Total</td>
			<td><strong>10000.00</strong></td>
		</tr>
		<tr>
			<td colspan="8" align="right">Tax</td>
			<td><strong>10%</strong></td>
		</tr>
		<tr>
			<td colspan="8" align="right">Grand Total</td>
			<td><strong>11000.00</strong></td>
		</tr>
	</table>
</div>
<div class="gap20"></div>

<input type="submit" value="Make Payment" id="" name="" class="btn submitM pull-right" data-toggle="modal" data-target="#modal_success1">

<div class="gap30"></div>
<?php include("footer.php"); ?>
