<?php
$page="reg-institution3";
$title="Registration &raquo; Institution";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if($user_type=='CIS'){
$name12='Internship';
}
elseif($user_type=='CIN'){
$name12='Institution';
}
elseif($user_type=='CRC'){
$name12='Recuriting';
}

if(isset($ca_note))
	$note=$ca_note;
else
	$note="";

if(isset($delete_id))
{	
	$sql_delete = "DELETE FROM co_agreement WHERE user_id='$user_id' AND co_agreement_id='$delete_id'";
	$statement_delete=$mysqli->prepare($sql_delete);
	$statement_delete->execute();
}
if(isset($submit_details)){

	if($update_id=='') {
	$start_date=sysConvert2($ca_start_date);
	$end_date=sysConvert2($ca_end_date);
	$pay_date=sysConvert2($ca_pay_date);
	$querys = "INSERT INTO co_agreement
(user_id,ca_agree_no,ca_start_date,ca_end_date,ca_pay_date,ca_pay_amt,ca_note,created_on) VALUES (?,?,?,?,?,?,?,now())";
	$statements= $mysqli->prepare($querys);  
	$statements->bind_param('issssis',$user_id,$ca_agree_no,$start_date,$end_date,$pay_date,$ca_pay_amt,$note);
	$statements->execute();
	}
	else {
	$start_date=sysConvert2($ca_start_date);
	$end_date=sysConvert2($ca_end_date);
	$pay_date=sysConvert2($ca_pay_date);
	$query_up1 = "UPDATE co_agreement SET ca_agree_no=?,ca_start_date=?,ca_end_date=?,ca_pay_date=?,ca_pay_amt=?,ca_note=? where co_agreement_id='$update_id'";
	$statement_up1= $mysqli->prepare($query_up1); 
	$statement_up1->bind_param('ssssis',$ca_agree_no,$start_date,$end_date,$pay_date,$ca_pay_amt,$note);
	$statement_up1->execute(); 
	//echo "UPDATE co_agreement SET ca_agree_no=$ca_agree_no,ca_start_date=$ca_start_date,ca_end_date=$ca_end_date,ca_pay_date=$ca_pay_date,$ca_pay_amt=$ca_pay_amt where co_agreement_id='$update_id'";;
	}
	header("location:reg-institution3edit.php?user_id=$user_id&user_type=$user_type");

	
}

if(isset($edit_id))
{
	$sql_edit = "SELECT ca_agree_no,ca_start_date,ca_end_date,ca_pay_date,ca_pay_amt,ca_note FROM co_agreement where user_id='$user_id' AND co_agreement_id='$edit_id'";
	$statement_edit=$mysqli->prepare($sql_edit);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($ca_agree_no,$ca_start_date,$ca_end_date,$ca_pay_date,$ca_pay_amt,$note);
	$statement_edit->fetch();
	$start=sysDBDateConvert($ca_start_date);
	$end=sysDBDateConvert($ca_end_date);
	$pay=sysDBDateConvert($ca_pay_date);
}


if(isset($save_submit)){
	$query = "UPDATE draw_down_payment_details SET type_of_procurement=?,price=?,unit_of_measure=?,quality=?,draw_down_amount=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sissi',$type_of_procurement,$price,$unit_of_measure,$quality,$draw_down_amount);
	$statement->execute();
		header("location:user3View.php?type=$user_type");
}
$sql = "SELECT type_of_procurement,price,unit_of_measure,quality,draw_down_amount FROM draw_down_payment_details where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($type_of_procurement,$price,$unit_of_measure,$quality,$draw_down_amount);
$statement1->fetch();


include("header.php"); ?>

<h2>Registration &raquo;<?php echo $name12;?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-institution1edit.php?user_id=<?php echo $user_id;?>&user_type=<?php echo$user_type;?>"></a>
			<div class="gap10"></div><?php echo $name12;?> Organization Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="reg-institution2edit.php?user_id=<?php echo $user_id;?>&user_type=<?php echo$user_type;?>"></a>
			<div class="gap10"></div><?php echo $name12;?> Representative Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div><?php echo $name12;?> Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3><?php echo $name12;?> Agreement</h3>
			<div class="gap10"></div>
			<div class="item1">
				<div class="gap20"></div>
			<form id="form_reg-institution3" method="post" enctype="multipart/form-data">

				<div class="form-group">
					<label class="col-sm-3 text-right">Agreement No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
						<input type="text" name="ca_agree_no" id="ca_agree_no" value="<?php echo $ca_agree_no;?>" class="form-control" placeholder="Agreement Number" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="ca_agree_no" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Start Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" name="ca_start_date" id="ca_start_date" value="<?php echo $start;?>" class="form-control" placeholder="Start Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="ca_start_date" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">End Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
						<input type="text" name="ca_end_date" id="ca_end_date" value="<?php echo $end;?>" class="form-control" placeholder="End Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="ca_end_date" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Payment Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
						<input type="text" name="ca_pay_date" id="ca_pay_date" value="<?php echo $pay;?>" class="form-control" placeholder="Payment Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="ca_pay_date" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Payment Amount <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="ca_pay_amt" id="ca_pay_amt" value="<?php echo $ca_pay_amt;?>" class="form-control" placeholder="Payment Amount">
						</div>
						<div class="gap1"></div>
						<span for="ca_pay_amt" class="errors"></span>
						</div>
						<div>
						<span class="form-group">
						<input type="hidden" name="update_id" id="update_id" class="form-control" value="<?php echo $edit_id;?>" maxlength="50"/>
						</span>
						</div>
					<div class="gap1"></div>
				</div>
				<div class="gap5"></div>

<?php
if($user_type=='CIS' || $user_type=='CRC'){
?>
				<div class="form-group">
					<label class="col-sm-3 text-right">Note</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"></span>
						<textarea name="ca_note" id="ca_note" class="form-control tal100" placeholder="Note"><?php echo $note;?></textarea>
						</div>
						<div class="gap1"></div>
						<span for="ca_note" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap5"></div>
<?php }?>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="submit_details" name="submit_details" value="Add" class="btn submitM">
					<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"> &nbsp;
				</div>
		</form>
				<div class="gap30"></div>

	<?php
$sql = "SELECT co_agreement_id,ca_pay_date,ca_pay_amt FROM  co_agreement  where user_id='$user_id' ORDER BY created_on DESC";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($co_agreement_id,$ca_pay_date,$ca_pay_amt);
$num1=$statement1->num_rows();			
if($num1>0){ 
?>
<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr class="tr1">
							<td>Payment Date</td>
							<td>Payment amount</td>
							<td>Action</td>
						</tr>
<?php }
while($statement1->fetch()) {
				$ca_paydate=sysDBDateConvert($ca_pay_date);		
							
?>
						<tr>
					               
							<td><?php echo $ca_paydate;?></td>
							<td><?php echo $ca_pay_amt;?></td>

							<td align="right"><a href="reg-institution3edit.php?user_id=<?php echo $user_id;?> & user_type=<?php echo$user_type;?> & edit_id=<?php echo $co_agreement_id;?>"><i class="fa fa-pencil edit"></i></a><a id="delete" href="reg-institution3edit.php?user_id=<?php echo $user_id;?> & user_type=<?php echo$user_type;?> & delete_id=<?php echo $co_agreement_id;?>"><i class="fa fa-trash trash"></i></a></td>
						</tr>
<?php } ?>
					</table>
				</div>
				<div class="gap15"></div>

		<form id="draw_down" method="post" enctype="multipart/form-data">
				<div class="well">
					<h3>Draw Down Details for Each Payment</h3>
				<div class="gap15"></div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr class="tr1">
							<td>Type of Procurement</td>
							<td>Price</td>
							<td>Unit of Measure</td>
							<td>Quality</td>
							<td>Drawdown Amount</td>
						</tr>
						<tr>
							<td>
								<select name="type_of_procurement" id="type_of_procurement" value="<?php echo $type_of_procurement;?>" class="form-control">
									<option>Select</option>
									<option value='1' <?php if($type_of_procurement==1) { echo "selected"; } ?>>Buy Project</option>
									<option value='2' <?php if($type_of_procurement==2) { echo "selected"; } ?>>Mentor Service Type</option>
								</select>
							</td>
							<td><input type="text" name="price" id="price" value="<?php echo $price;?>" class="form-control"></td>
							<td><input type="text" name="unit_of_measure" id="unit_of_measure" value="<?php echo $unit_of_measure;?>" class="form-control"></td>
							<td><input type="text" name="quality" id="quality" value="<?php echo $quality;?>" class="form-control"></td>
							<td><input type="text" name="draw_down_amount" id="draw_down_amount" value="<?php echo $draw_down_amount;?>" class="form-control"></td>
						</tr>
					</table>
				</div>
				</div>
				<div class="gap15"></div>


			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Submit"> &nbsp;

<a class="btn submitM" id="" href="user3View.php?type=<?php echo $user_type;?>">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
		</div>
	</div>

</div>

	
<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_reg-institution3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            ca_agree_no: {
                                            required: true,
                                            numbersrest: true,
                                            },
                                            ca_start_date: {
                                            required: true,
                                            },
					    ca_end_date: {
					    required: true,
					    },
					    ca_pay_date: {
					    required: true,
					    },
					    ca_pay_amt: {
					    required: true,
					    numbersrest: true,
					    },
					    ca_note: {
					    required: true,
					    },
					    
					    
					    
						
                  
               },


				//The error message Str here

           messages: {

		
		ca_agree_no: {
		numbersrest: "Kindly enter only numbers",
		},

		ca_pay_amt: {
		numbersrest: "Kindly enter only numbers",
		},
		
		

		

	},
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#draw_down").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

					    type_of_procurement: {
					    required: true,
					    },
					    price: {
					    required: true,
					    numbersrest: true,
					    },
					    unit_of_measure: {
					    required: true,
					    lettersonly: true,
					    },
					    quality: {
					    required: true,
					    },
					    draw_down_amount: {
					    required: true,
					    numbersrest: true,
					    },
					    
					    
						
                  
               },


				//The error message Str here

           messages: {

		
		
		price: {
		numbersrest: "Kindly enter only numbers",
		},
		unit_of_measure: {
		lettersonly: "Kindly enter only characters",
		},
		draw_down_amount: {
		numbersrest: "Kindly enter only numbers",
		},
		

		

	},
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>

<script>
$(function() {
$("#ca_start_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#ca_end_date").datepicker("option","minDate",selectedDate);
}	
});
$("#ca_end_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#ca_start_date").datepicker("option","maxDate",selectedDate);
}	
});
});
</script>
<script>
$(function() {
$("#ca_pay_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#ca_end_date").datepicker("option","minDate",selectedDate);
}	
});
});

</script>
<script>
$(document).ready(function()
{
$('#delete').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});
});

function empty_form(val1){
        $("#"+val1).closest('#form_reg-institution3').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}
</script>
