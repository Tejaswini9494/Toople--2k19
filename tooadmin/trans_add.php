<?php
$page="trans_add";
$title="Transaction Add";
include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);

$userid=$_SESSION['userid'];

if(isset($trans_submit)) {
	//echo $name."#".$category."#".$objectives."#".$complexity."#".$busi_scenerio."#".$pblm_stmt."#".$exp_outcome."#".$tools."#".$ref_url."#";

	$status='A';
	$query1 = "INSERT INTO  too_transactions (user_id, trans_currency, trans_amt, added_date, status) VALUES(?,?,?, now(), ?)";
	$statement1= $mysqli->prepare($query1);
	$statement1->bind_param('ssss', $user_id, $trans_currency, $trans_amt, $status);
	$statement1->execute();

	//getMessageNotification('regS');
	header("location:trans_mgnt.php");
}

$query2 = "SELECT user_id, co_name, co_email FROM  customer_organisation  WHERE user_id!=''";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($user_id2, $co_name2, $co_email2);

include("header.php"); ?>

<h3 class="">
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>
<div class="x_panel">
<div class="x_content">
<div class="tab-content">
<div id="algoId" >
<form id="form_trans" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label class="col-sm-3 text-right">User Name <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<select id="user_id" name="user_id" class="form-control" onchange="load_user_currency(this.value)">
				<option value="">Select</option>
			<?php while($statement2->fetch()) { ?>
				<option value="<?php echo $user_id2; ?>" <?php if($user_id==$user_id2) { echo "selected"; } ?>><?php echo $user_id2."-".$co_name2."-".$co_email2; ?></option>
			<?php } ?>
			</select>
			</div>
			<div class="gap1"></div>
			<span for="user_id" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div id="load_user_currency">
	<div class="form-group">
		<label class="col-sm-3 text-right">Currency <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cube"></i></span>
			<input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $algorithm_id1; ?>" readonly>
			<input type="hidden" name="trans_currency" id="trans_currency" class="form-control" placeholder="Currency" value="<?php echo $trans_currency; ?>">
			</div>
			<div class="gap1"></div>
			<span for="trans_currency" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>
	</div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Amount <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
			<input type="text" name="trans_amt" id="trans_amt" class="form-control" placeholder="Amount" value="<?php echo $trans_amt; ?>">
			</div>
			<div class="gap1"></div>
			<span for="trans_currency" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">

		<input id="trans_submit" name="trans_submit" class="btn submitM" type="submit" value="Submit"> &nbsp;
	<!--	<input id="" class="btn submitM" type="submit" value="Submit" data-toggle="modal" data-target="#modal_contentsuccess"> &nbsp;	-->
		<a href="trans_mgnt.php" class="btn submitM cancelBtn">Cancel</a>
	<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
	</div>
	<div class="gap1"></div>

</form>
</div>
</div>
</div>
</div>
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
            $("#form_trans").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            user_id: {
                                            required: true,
                                            },
	
                                            trans_currency: {
                                            required: true,
					   					
                                            },
                                            trans_amt: {
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
function load_user_currency(val1)
{
	$.ajax({
		url:'ajax_load_user_currency.php', 
		type:'POST',
		data:{user_id:val1},
		success:function(result){
			//alert(result);
			$("#load_user_currency").html(result);
		}
	});
}
</script>
