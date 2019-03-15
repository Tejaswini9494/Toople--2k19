<?php
$page="myProject";
$title="My Projects";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
$p_id=$pid;
//echo $p_id."######<br>";
session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];
//echo $user_id."######<br>";

$sql1 = "SELECT order_id FROM project_orders WHERE status!='A' AND user_id='$user_id'";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($order_id);
$statement1->fetch();

if(isset($proceed) || isset($submit))
{

	$modalValidTxt=implode(',', $modalValid1_);
	if (strpos($modalValidTxt, 'N') != false || $grand_total=='NaN') {
		//echo $grand_total."#".$modalValidTxt."#1";
	}
	else { //echo $grand_total."#".$modalValidTxt."#2"; exit;

		$sql1c = "SELECT SUM(trans_amt) FROM too_transactions WHERE status='A' AND user_id='$user_id'";
		$statement1c=$mysqli->prepare($sql1c);
		$statement1c->execute();
		$statement1c->store_result();
		$statement1c->bind_result($trans_amt1c);
		$statement1c->fetch();

		$sql1d = "SELECT SUM(grand_total) FROM project_orders WHERE user_id=$user_id AND status='A'";
		$statement1d=$mysqli->prepare($sql1d);
		$statement1d->execute();
		$statement1d->store_result();
		$statement1d->bind_result($grand_total1d);
		$statement1d->fetch();

		$balance_amt=$trans_amt1c-$grand_total1d;

		//echo $trans_amt1c."##".$grand_total1d."##".$balance_amt."##".$grand_total; exit;
		if(isset($proceed)) {
			if($balance_amt >= $grand_total) {

				$cnt=count($proid)."##########";
				for($j=0;$j<$cnt;$j++)
				{
					$sql_ups = "UPDATE project_cart SET quantity='$qty[$j]',no_of_students='$n_students[$j]',mentor_price='500' WHERE  cart_id='$proid[$j]'";
					$statement_ups=$mysqli->prepare($sql_ups);
					//echo $sql_ups."<br>";
					$statement_ups->execute();
					//header("location:tooprojects.php");
				}


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
						//header("location:tooprojects.php");	
				}
				}
				//echo $tax_amount."############<br>";
				//echo $total_amount."#################<br>";
				//echo $grand_total."############<br>";

				$active="UPDATE project_orders SET status='A',tax='$tax_amount',total_amount='$total_amount',grand_total='$grand_total' WHERE order_id='$order_id'";
					$sactive=$mysqli->prepare($active);
					//echo $active;
	
				$sactive->execute();
				//header("location:tooprojects.php");	
				header("location:institutionProject.php");
			}
		}if(isset($submit)) {
				$cnt=count($proid)."##########";
				for($j=0;$j<$cnt;$j++)
				{
					$sql_ups1 = "UPDATE project_cart SET quantity='$qty[$j]',no_of_students='$n_students[$j]',mentor_price='500' WHERE  cart_id='$proid[$j]'";
					$statement_ups1=$mysqli->prepare($sql_ups1);
					$statement_ups1->execute();
					echo $sql_ups."<br>";
					//header("location:tooprojects.php");
					//exit;
				}

				//echo $tax_amount."############<br>";
				//echo $total_amount."#################<br>";
				//echo $grand_total."############<br>";

				$active1="UPDATE project_orders SET status='P',tax='$tax_amount',total_amount='$total_amount',grand_total='$grand_total' WHERE order_id='$order_id'";
				$sactive1=$mysqli->prepare($active1);
				$sactive1->execute();
				echo $active;
				//
				header("location:myorder_summary.php");
				exit;
		}

	}
}

if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['checkbox1']); $i++)
{
	$ID=$_REQUEST['checkbox1'][$i];
	//echo $ID."############";
	//exit;
	if($button_action=="Delete") {
		$query="Delete from project_cart where cart_id=?";
		//$action="GA";
	}
	$statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('i',$ID);
        $statement->execute();
}
         header("Location:institutionSelectedProject.php");
        exit;
}



if($p_id!=''){

if($statement1->num_rows<1)
{
$sql2= "INSERT INTO project_orders (user_id,status,created_on) VALUES('$user_id','$status',now())";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$id=$statement2->insert_id;
}
else
{
$id=$order_id;
}
//echo $id."######";
$sql3 = "SELECT quantity,project_id FROM project_cart WHERE user_id='$user_id' AND order_id='$id' AND project_id='$p_id'";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($quantity,$proj_id);
$statement3->fetch();
$qty='';
if($statement3->num_rows>0)
{
	$qty=$quantity+1;
	$sql4 = "UPDATE project_cart SET quantity='$qty' WHERE user_id='$user_id' AND order_id='$id'AND project_id='$p_id'";
	//echo $sql4;
}
else
{

	if($user_id!='' && $type=='CIN') {
		$sql2a = "SELECT co_country FROM  customer_organisation  WHERE user_id=$user_id";
	} elseif($user_id!='' && $type=='SP') {
		$sql2a = "SELECT s_country FROM  student_info  WHERE user_id=$user_id";
	}

	$statement2a=$mysqli->prepare($sql2a);
	$statement2a->execute();
	$statement2a->store_result();
	$statement2a->bind_result($country_id);
	$statement2a->fetch();
	//echo $country_id."#"	;

	$sql3a = "SELECT cost FROM  too_project_cost  WHERE country='$country_id' AND proj_id=$p_id";
	//echo $sql3a;
	$statement3a=$mysqli->prepare($sql3a);
	$statement3a->execute();
	$statement3a->store_result();
	$statement3a->bind_result($cost3);
	$statement3a->fetch();

	$price=$cost3;
	$sql4 = "INSERT INTO project_cart(user_id,order_id,project_id,quantity,no_of_students,unit_price,created_on) VALUES ('$user_id','$id','$p_id',1,1,'$price',now())";
}
$statement4=$mysqli->prepare($sql4);
$statement4->execute();

	if($btp=='') {
		header("location:tooprojects.php?id3=$id");
	}

}


$tax1 = "select tax from master_tax where tax_id=1";
$statement5tax=$mysqli->prepare($tax1);
$statement5tax->execute();
$statement5tax->store_result();
$statement5tax->bind_result($tax);
$statement5tax->fetch();

include("header.php"); 

$sqlO = "SELECT order_id FROM project_orders WHERE status!='A' AND user_id='$user_id'";
//echo $sqlO;
$statementO=$mysqli->prepare($sqlO);
$statementO->execute();
$statementO->store_result();
$statementO->bind_result($order_id);
$statementO->fetch();

$sql5 = "SELECT a.proj_id, a.project_id AS p_id, a.name AS p_name, b.cart_id AS cart_id, b.quantity AS qty, b.no_of_students AS no_students, b.unit_price AS unit_price FROM too_projects a, project_cart b where b.project_id= a.proj_id AND b.user_id='$user_id' AND b.order_id='$order_id'";
//echo $sql5;
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($proj_id,$p_id,$p_name, $cart_id, $qty,$n_students,$unit_price);
//echo $sql5;
$rows=$statement5->num_rows();
//echo $rows;
?>


<h3 class="">Selected Project</h3>
<div class="gap30"></div>

<form name="frm" method="post">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		
		<tr class="tr1">
			<td width="50">S.No.</td>
			<td align="center"></td>
			<td>Project Code</td>
			<td>Project Name</td>
			<td width="100">Quantity</td>
			<td width="">No. of Students<br><span class="font12">( Per Quantity )</span></td>
			<td>Unit Price</td>
			<td>Net Price</td>
			<td>Mentor Details</td>
			<td>Total Price</td>
		</tr>
<?php  $i=0;  while($statement5->fetch()) {   $i++;
?>
		<tr>
			<td><?php echo $i;?></td>
			<td align="center">
				<input type="checkbox"   name="checkbox1[]" value="<?php echo $cart_id;?>">
				<input type="hidden" id="proid_<?php echo $i;?>" name="proid[]" value='<?php echo $cart_id;?>'>
				<input type="hidden" id="temp_proj_<?php echo $i;?>" name="temp_proj_[]" value='<?php echo $proj_id;?>'>
				<input type="hidden" id="modalValid1_<?php echo $i;?>" name="modalValid1_[<?php echo $i;?>]" value='<?php echo $i;?>'>
			</td>
			<td><?php echo $p_id;?></td>
			<td><?php echo $p_name;?></td>
			<td><input type="text" class="form-control" id="qty_<?php echo $i;?>" name="qty[]" value="<?php echo $qty;?>" onkeyup="total12()"></td>
			<td><input type="text" class="form-control" id="n_students_<?php echo $i;?>" name="n_students[]" value="<?php echo $n_students;?>" onkeyup="total12()" <?php if($type=='SP'){ ?> readonly <?php } ?>></td>
			<td><?php echo $unit_price;?><input type="hidden" name="unit_price" id="unit_price_<?php echo $i;?>" value="<?php echo $unit_price;?>"></td>
			<td id="total_<?php echo $i;?>"><?php echo $total;?></td>
			<td>
				<button type="button" class="btn" onclick="modal_trig(<?php echo $i;?>)"><i class="fa fa-search"></i></button>
				<input type="hidden" name="mentor_price" id="mentor_price_<?php echo $i;?>" value="">

			</td>
			<td id="total_price_<?php echo $i;?>"><input type="hidden" value="" name="totalP_<?php echo $i;?>" id="totalP_<?php echo $i;?>"></td>
		</tr>
<?php 
 }  
 ?>	
<?php if($rows>0) { ?>		
		<tr>
			
			<td colspan="9" align="right">Total<input type="hidden" name="total_amount" id="total_amount" value=""></td>
			<td id="f_total"><strong></strong></td>
		</tr>
		<tr>
			<td colspan="9" align="right">Tax</td>
			<td><strong><?php echo $tax;?>%</strong><input type="hidden" name="tax" id="tax" value="<?php echo $tax;?>"><input type="hidden" id="tax_amount" name="tax_amount" ></td>
		</tr>
		<tr>
			<td colspan="9" align="right">Grand Total <input type="hidden" name="grand_total" id="grand_total" value="0"></td>
			<td id="grandtotal"><strong></strong></td>
		</tr>	
<?php } else { ?>
<tr class="text-center"><td colspan="10" >No Records Found</td></tr>
<?php } ?>
	</table>
</div>

<div class="gap10"></div>
<?php if($rows>0) { ?>
<div class="pull-left">
	<button id="button_action" name="button_action" onclick="return confirmDelete()" type="submit" value="Delete" class="btn btn-primary">Delete</button>
</div>
<div class="pull-right">
	<button name="submit" class="btn btn-primary">Payment Through PAYPAL</button>&nbsp;
	<?php if($type=='CIN'){ ?><button name="proceed" class="btn btn-primary">Payment Through TOOOPLE</button><?php } ?>
</div>
<?php } ?>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
function confirmDelete(){
var msg='';
var i=0;
for(i=0;i<=document.frm.length-1;i++)
	{ 
		if(document.frm.elements[i].type=="checkbox") 
		{
		 if(document.frm.elements[i].checked==true)
	        {
	         var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
	 		}
        }
	}
	
	var msg="Select any record";
	alert(msg);
		return false;

	
}
</script>
<script>
function total12()
{
	var rtr='<?php echo $i?>';
	//alert(rtr);
	var ftotal=0;
	for(var i=1;i<=rtr;i++) 
	{
		var qty=$('#qty_'+i).val();
		var n_stud=$('#n_students_'+i).val();
		var unit_price=$('#unit_price_'+i).val();
		var total=qty*n_stud*unit_price;
		$('#total_'+i).html(total);
		var mentor_price=parseInt($('#mentor_price_'+i).val());
		var totalprice=total+mentor_price;
		$('#total_price_'+i).html(totalprice);
		//$('#totalP_'+i).val(totalprice);
		ftotal+=totalprice;	
	}
	$('#f_total').html(ftotal);
	var tax=$('#tax').val();
	var taxtotal=ftotal*(tax/100);
	var grandtotal=ftotal+taxtotal;
	//alert(parseInt(grandtotal));
	$('#total_amount').val(ftotal);
	$('#total_amount').val(ftotal);
	$('#tax_amount').val(taxtotal);
	$('#grandtotal').html(eval(grandtotal));
	$('#grand_total').val(eval(grandtotal));

}

function modal_trig(val1) {
	var val2=$('#proid_'+val1).val();
	var val3=$('#temp_proj_'+val1).val();
	var val4=$('#qty_'+val1).val();
	$('#sesshr_id').val(val2);
	$('#hid_proj').val(val3);
	$('#hid_proj_count').val(val4);
	$('#i_id').val(val1);
	$('#modal_mentor').modal('show');
	load_mentor_hours();
}

function cal_mentor(){
	total12();
}
</script>

<script>
$(window).load(total12());
</script>
