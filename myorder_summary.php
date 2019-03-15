<?php
$page="myorder_summary";
$title="My Order Summary";
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];

$query = "SELECT order_id FROM project_orders WHERE status='P' AND user_id='$user_id'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($order_id);
$statement->fetch();
$statement->close();

if(isset($proceed)) {

	$sql5 = "SELECT a.proj_id,a.project_id AS p_id,a.name AS p_name,b.quantity AS qty, b.cart_id AS cart_id5, b.no_of_students AS no_students,b.unit_price AS unit_price FROM too_projects a, project_cart b where b.project_id= a.proj_id AND b.user_id='$user_id' AND b.order_id='$order_id'";
	$statement5=$mysqli->prepare($sql5);
	$statement5->execute();
	$statement5->store_result();
	$statement5->bind_result($proj_id,$p_id,$p_name,$qty,$cart_id5,$n_students,$unit_price);
	while($statement5->fetch()) {
		for($j=0;$j<$qty;$j++) {

			$sql5aa = "SELECT mentor_temp_type, mentor_temp_hours FROM too_mentorhours_temp WHERE sesshr_id='$cart_id5' LIMIT $j, 1";
			$statement5aa=$mysqli->prepare($sql5aa);
			$statement5aa->execute();
			$statement5aa->store_result();
			$statement5aa->bind_result($mentor_temp_type, $mentor_temp_hours);
			$statement5aa->fetch();

			$sqlq="INSERT INTO institution_project(user_id, project_id, no_of_students, mentor_type_name, mentor_hrs, created_on) VALUES('$user_id', '$proj_id', '$n_students', '$mentor_temp_type', '$mentor_temp_hours', now())";
			$stq=$mysqli->prepare($sqlq);
			//echo $sql;
			$stq->execute();
		}
	}
		$active="UPDATE project_orders SET status='A' WHERE order_id='$order_id'";
		$sactive=$mysqli->prepare($active);
		$sactive->execute();

	getMessageNotification('PAY');
	if($type=='CIN') {
		header("location:institutionProject.php");
	}elseif($type=='SP') { 
		header("location:myOrders.php");
	}
	exit;
}
include("header.php");

$sql1 = "SELECT a.proj_id,a.project_id,a.name,b.quantity,b.cart_id,b.order_id,b.no_of_students as no_students,b.unit_price FROM too_projects a, project_cart b WHERE b.project_id= a.proj_id AND b.user_id='$user_id' AND b.order_id='$order_id'";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id,$proj_code,$proj_name,$qty,$cart_id1,$order_id1,$n_students,$unit_price);
?>


<h3 class="">My Order Summary</h3>
<div class="gap30"></div>

<form name="frm" method="POST">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td width="50">S.No.</td>
			<td>Project Code</td>
			<td>Project Name</td>
			<td width="100">Quantity</td>
			<td width="">No. of Students<br><span class="font12">( Per Quantity )</span></td>
			<td>Unit Price</td>
			<td>Net Price</td>
			<td>Mentor Details</td>
			<td>Total Price</td>
		</tr>
<?php  
$i=0;  
while($statement1->fetch()) {
$net_price=$qty*$n_students*$unit_price; 

$sql2 = "SELECT SUM(mentor_tot_amt) FROM too_mentorhours_temp WHERE sesshr_id='$cart_id1'";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($mentor_tot_amt);
$statement2->fetch(); 

$total_price=$net_price+$mentor_tot_amt;

$i++;
?>

		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $proj_code;?></td>
			<td><?php echo $proj_name;?></td>
			<td><?php echo $qty;?></td>
			<td><?php echo $n_students;?></td>
			<td><?php echo $unit_price;?></td>
			<td><?php echo $net_price;?></td>
			<td><a href="javascript:show_modal_order('<?php echo $cart_id1; ?>');" class="btn"><i class="fa fa-search"></i></a></td>
			<td><?php echo $total_price;?></td>
		</tr>
<?php }
$sql3 = "SELECT tax,total_amount,grand_total FROM project_orders WHERE user_id='$user_id' AND order_id='$order_id1' AND status='P'";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($tax,$total_amt,$grand_amt);
$statement3->fetch(); 
?>
		<tr>
			
			<td colspan="8" align="right">Total</td>
			<td id="f_total"><strong><?php echo $total_amt; ?></strong></td>
		</tr>
		<tr>
			<td colspan="8" align="right">Tax</td>
			<td><strong><?php echo $tax; ?></strong></td>
		</tr>
		<tr>
			<td colspan="8" align="right">Grand Total</td>
			<td id="grandtotal"><strong><?php echo $grand_amt; ?></strong></td>
		</tr>	
	</table>
</div>

<div class="gap10"></div>

<div class="pull-right">
	<button type="submit" name="proceed" id="proceed" class="btn btn-primary">Make Payment</button>
</div>
</form>
<div class="gap20"></div>

<?php include("footer.php"); ?>
<?php include("modal_order_summary.php"); ?>
<script>
function show_modal_order(val1) {

	//alert(val1);
	$.ajax({
		url:'ajax_show_modal_order.php', 
		type:'POST',
		data:{order_id:val1},
		success:function(resultdata){
			//alert(result);
			$("#show_modal_order").html(resultdata);
		}
	});
	$('#modal_order_summary').modal('show');
}
</script>
