<?php
$page="reg-rsp-mentor4";
$title="Registration &raquo; Representative for Service Provider-mentor";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);


if($userType=='SPM'){
$name1='Mentor Service Provider';
}
elseif($userType=='SPC'){
$name1='Content Provider';
}

if(isset($save_submit)){
$start_date=sysConvert($rsp_start_date);
$end_date=sysConvert($rsp_end_date);
$query = "UPDATE representative_service_provider SET rsp_agreement=?,rsp_start_date=?,rsp_end_date=?,rsp_note=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ssss',$rsp_agreement,$start_date,$end_date,$rsp_note);
	$statement->execute();
		header("location:user2View.php");
}

$sql = "SELECT rsp_agreement,rsp_start_date,rsp_end_date,rsp_note FROM representative_service_provider where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($rsp_agreement,$rsp_start_date,$rsp_end_date,$rsp_note);
$statement1->fetch();

$start=sysDBDateConvert($rsp_start_date);
$end=sysDBDateConvert($rsp_end_date);
if($start=='00/00/0000' || $start=='//')
{
$start="";
} 
 if($end=='00/00/0000' || $end=='//')
{
$end="";
} 

 	
include("header.php"); ?>

<h2>Registration &raquo; Representative for <?php echo $name1; ?></h2>
<div class="gap30"></div>

<div class="formss formss3">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="repmentor1.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div><?php echo $name1; ?> Organization Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="repmentor2.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div><?php echo $name1; ?> Bank Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="repmentor3.php?user_id=<?php echo $user_id;?>&userType=<?php echo $userType;?>"></a>
			<div class="gap10"></div><?php echo $name1; ?> Representative Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div><?php echo $name1; ?> Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3><?php echo $name1; ?> Representative Details</h3>
			<div class="gap10"></div>
			<form id="form_rsp_m4" method="post">
			<div class="item1">
				<div class="gap20"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Agreement No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
						<input type="text" name="rsp_agreement" id="rsp_agreement" value="<?php echo $rsp_agreement;?>" class="form-control" placeholder="Agreement Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_agreement" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Start Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" name="rsp_start_date" id="rsp_start_date" value="<?php echo $start;?>" class="form-control date" placeholder="Start Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="rsp_start_date" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">End Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
						<input type="text" name="rsp_end_date" id="rsp_end_date" value="<?php echo $end;?>" class="form-control date" placeholder="End Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="rsp_end_date" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Note <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
						<textarea name="rsp_note" id="rsp_note" <?php echo $rsp_note;?> class="form-control" placeholder="Note"><?php echo $rsp_note;?></textarea>
						</div>
						<div class="gap1"></div>
						<span for="rsp_note" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>

			</div>
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Submit"> &nbsp;
<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"
> &nbsp;
				<a class="btn submitM" id="" href="user2View.php">Cancel</a>
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
            $("#form_rsp_m4").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
			rsp_agreement:{
			required: true,
			numbersrest: true,
			
			},

			rsp_start_date:{
			required: true,
			},

			rsp_end_date: {
			required: true,
			},

			rsp_note:{
			required: true,
			firstChar: true,
			},

				
               },

 messages: {

		
		rsp_agreement: {
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

function empty_form(val1){
        $("#"+val1).closest('#form_rsp_m4').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}
</script>
