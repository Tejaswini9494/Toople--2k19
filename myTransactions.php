<?php
$page="myTransactions";
$title="My Transactions";

include_once("class/config.php");
include_once("includes/functions.php");

include("header.php"); 

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
//echo $user_id;
$sql1 = "SELECT trans_id, user_id, trans_currency, trans_amt, DATE_FORMAT(updated_on, '%d/%m/%Y') as updated_on FROM too_transactions WHERE user_id=$user_id";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($trans_id1, $user_id1, $trans_currency1, $trans_amt1, $updated_on1);
$nrows1=$statement1->num_rows();

$sql1s = "SELECT order_id, tax, total_amount, grand_total, DATE_FORMAT(updated_on, '%d/%m/%Y') as updated_on FROM project_orders WHERE user_id=$user_id AND status='A'";
$statement1s=$mysqli->prepare($sql1s);
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($order_id1s, $tax1s, $total_amount1s, $grand_total1s, $updated_on1s);
$nrows1s=$statement1s->num_rows();
?>

<h3 class="">My Transactions</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Date</td>
			<td>Transaction ID</td>
			<td>Currency</td>
			<td>Transaction Amount</td>
		</tr>
<?php $i=1; $total_amt=0; While($statement1->fetch()) {

	$sql1a = "SELECT currency FROM master_country WHERE country_id=$trans_currency1";
	$statement1a=$mysqli->prepare($sql1a);
	$statement1a->execute();
	$statement1a->store_result();
	$statement1a->bind_result($currency1a);
	$statement1a->fetch();

	$total_amt=$total_amt+$trans_amt1;
?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $updated_on1;?></td>
			<td><?php echo $trans_id1;?></td>
			<td><?php echo $currency1a;?></td>
			<td><?php echo numbToDesi($trans_amt1);?></td>
		</tr>
<?php $i++; } if($nrows1<1) { ?>
	<tr class="text-center"><td colspan="5" >No Records Found</td></tr>
<?php } ?>
		<tr class="text-bold">
			<td colspan="4" class="text-right">TOTAL</td>
			<td><?php echo numbToDesi($total_amt);?></td>
		</tr>
	</table>
</div>

<div class="gap20"></div>
<h3 class="">My Orders</h3>
<div class="gap30"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td>Date</td>
			<td>Order Id</td>
			<td>Order Amount</td>
			<td>Tax</td>
			<td>Total Amount</td>
		</tr>
<?php
	$ii=1; $total_amt1s=0;
	While($statement1s->fetch()) {
	$total_amt1s=$total_amt1s+$grand_total1s;
?>
		<tr>
			<td><?php echo $ii;?></td>
			<td><?php echo $updated_on1s;?></td>
			<td><?php echo $order_id1s;?></td>
			<td><?php echo numbToDesi($total_amount1s);?></td>
			<td><?php echo numbToDesi($tax1s);?></td>
			<td><?php echo numbToDesi($grand_total1s);?></td>
		</tr>
<?php $ii++; } if($nrows1s<1) { ?>
	<tr class="text-center"><td colspan="6" >No Records Found</td></tr>
<?php } ?>
		<tr class="text-bold">
			<td colspan="5" class="text-right">TOTAL</td>
			<td><?php echo numbToDesi($total_amt1s);?></td>
		</tr>
		<tr class="text-bold">
			<td colspan="5" class="text-right">BALANCE</td>
			<td><?php echo numbToDesi($total_amt-$total_amt1s);?></td>
		</tr>
	</table>
</div>
<div class="gap20"></div>
<?php include("footer.php"); ?>
