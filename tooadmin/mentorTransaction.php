<?php
$page="mentorTransaction";
//$tit="Add Cost";
include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);

$userid=$_SESSION['userid'];
$men_id=$_GET['uid'];
$pro_id=$_GET['pid'];


$sql = "SELECT m_status,s_first_name,s_last_name,s_country FROM student_info WHERE user_id='$men_id' ORDER BY created_on DESC";
$statement=$mysqli->prepare($sql);
$statement->execute();
$statement->store_result();
$statement->bind_result($m_status,$s_first_name,$s_last_name,$s_country);
$statement->fetch();

$sqlP = "SELECT name FROM too_projects WHERE proj_id='$pid'";
$statementP=$mysqli->prepare($sqlP);
$statementP->execute();
$statementP->store_result();
$statementP->bind_result($proj_name);
$statementP->fetch();

$sqlH = "SELECT mentor_hrs FROM institution_project WHERE institution_project_id='$instpid'";
$statementH=$mysqli->prepare($sqlH);
$statementH->execute();
$statementH->store_result();
$statementH->bind_result($mentor_hrs);
$statementH->fetch();

$query1="SELECT country_id,country_name,currency FROM master_country WHERE country_id!=''";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($country_id,$country_name,$currency);



	$num3=0;
	$query3="SELECT mentor_transaction_id,paid_amt,pending_amt,total_amt FROM mentor_transaction WHERE mentor_id='$men_id' AND program_id='$pro_id'";
	//echo $query3;
	$statement3=$mysqli->prepare($query3);
	$statement3->execute();
	$statement3->store_result();
	$statement3->bind_result($mentor_transaction_id,$paid_amt1,$pending_amt,$total_amt1);
	$statement3->fetch();
	$num3=$statement3->num_rows();


if(isset($submitCost)) {

	if($num3>0) {
		$paid_amt2=numbtoDesi($paid_amt1+$paid_amt);
		$pending_amt2=$total_amt1-$paid_amt2;

		$query_up = "UPDATE mentor_transaction SET paid_amt=?,pending_amt=? WHERE mentor_transaction_id='$mentor_transaction_id'";
		//echo "UPDATE mentor_transaction SET paid_amt='$paid_amt2',pending_amt='$pending_amt2' WHERE mentor_transaction_id='$mentor_transaction_id'";
		$statement_up= $mysqli->prepare($query_up); 
		$statement_up->bind_param('ss',$paid_amt2,$pending_amt2);
		$statement_up->execute();
	} else {
		$pending_amt=$total_amt-$paid_amt;
		$status='A';
		$query2 = "INSERT INTO mentor_transaction(mentor_type,mentor_id,program_id,currency,paid_amt,pending_amt,total_amt, created_on,status) VALUES(?,?,?,?,?,?,?,now(),?)";
		//echo "INSERT INTO mentor_transaction(mentor_type,mentor_id,program_id,currency,paid_amt,pending_amt,total_amt, created_on,status) VALUES('$mentor_type','$men_id','$pro_id','$mentor_currency','$paid_amt','$pending_amt','$total_amt',now(),'$status')";
		$statement2= $mysqli->prepare($query2);
		$statement2->bind_param('siiissss',$mentor_type,$men_id,$pro_id,$mentor_currency,$paid_amt,$pending_amt,$total_amt,$status);
		$statement2->execute();
	
	}
	header("location:program_mgnt.php");
	exit();
}

include("header.php"); 
?>

<h3 class="">
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>


<div id="proId12" style="display:block;">
	<div class="tab-content">
		<!---------- 5 --------->
		<div id="spro5" class="tab-pane fade in active">
		<form id="form_project3" method="POST" enctype="multipart/form-data">
			<h4>Total Cost</h4>
			<div class="gap20"></div>
			<div class="form-group">
				<label class="col-sm-3 text-right">Mentor Type <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input type="text" name="mentor_type" id="mentor_type" class="form-control" value="<?php echo $m_status;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="mentor_type" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Mentor Name <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input type="text" name="mentor_name" id="mentor_name" class="form-control" value="<?php echo $s_first_name." ".$s_last_name;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="mentor_name" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Project Name <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input type="text" name="proj_name" id="proj_name" class="form-control" value="<?php echo $proj_name;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="proj_name" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Hours <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<input type="text" name="mentor_hours" id="mentor_hours" class="form-control" value="<?php echo $mentor_hrs;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="hours" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Currency <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<select name="mentor_currency" id="mentor_currency" class="form-control" onchange="load_currency()" <?php if($num3>0){ ?>disabled<?php } ?>>
					<?php while($statement1->fetch()) { ?>
						<option value="<?php echo $country_id; ?>"<?php if($country_id==$s_country) { echo "selected"; } ?>><?php echo $currency."-".$country_name; ?></option>
					<?php } ?>
					</select>
					</div>
					<div class="gap1"></div>
					<span for="mentor_currency" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Amount to be Paid <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<input type="text" name="paid_amt" id="paid_amt" class="form-control" placeholder="" value="<?php echo numbtoDesi($pending_amt);?>">
					<input type="hidden" name="total_amt" id="total_amt" class="form-control" placeholder="" value="<?php numbtoDesi($pending_amt);?>">

					</div>
					<div class="gap1"></div>
					<span for="paid_amt" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="col-sm-9 col-sm-push-3">	
				<input id="submitCost" name="submitCost" class="btn submitM" type="submit" value="<?php if($num3>0){ echo 'Update'; }else { echo 'Add';}?>">&nbsp;
				<a href="program_mgnt.php" class="btn submitM cancelBtn">Cancel</a>
			<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
			</div>
			<div class="gap1"></div>
		</form>
		</div>

	</div>

</form>

<!--------------end--------------->
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
            $("#form_project3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            paid_amt: {
                                            required: true,			
                                            },                                         

               },


				//The error message Str here

           messages: {
		
					
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
$(document).ready(function(){
	var val4='<?php echo $num3; ?>'; 
	if(val4=='0') {
		load_currency();
	}
});

function load_currency()
{
	var val1=$('#mentor_currency option:selected').val();
	var val2=$('#mentor_type').val();
	var val3=$('#mentor_hours').val();

	$.ajax({
		url:'ajax_mentor_transaction.php', 
		type:'POST',
		data: {mentor_currency:val1,mentor_type:val2,mentor_hours:val3},
		//data:$('#form_coursereg').serialize(),
		success:function(result){ //alert(result);
			$("#paid_amt").val(result);
			$("#total_amt").val(result);
		}
	});
}
</script>
