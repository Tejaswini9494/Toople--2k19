<?php
$page="reg-rsp-mentor2";
$title="Registration &raquo; Representative for Service Provider-mentor";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);


if(isset($save_submit) || isset($proceed_submit)){
$query = "UPDATE representative_service_provider SET rsp_bank_name=?,rsp_branch_name=?,rsp_branch_code=?,rsp_country1=?,rsp_type_account=?,rsp_benefi_name=?,rsp_account_no=?,rsp_bank_details1=? where user_id='$id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ssssssss',$rsp_bank_name,$rsp_branch_name,$rsp_branch_code,$rsp_country1,$rsp_type_account,$rsp_benefi_name,$rsp_account_no,$rsp_bank_details1);
	$statement->execute();
	
}

$sql = "SELECT rsp_bank_name,rsp_branch_name,rsp_branch_code,rsp_country1,rsp_type_account,rsp_benefi_name,rsp_account_no,rsp_bank_details1 FROM representative_service_provider where user_id='$id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($rsp_bank_name,$rsp_branch_name,$rsp_branch_code,$rsp_country1,$rsp_type_account,$rsp_benefi_name,$rsp_account_no,$rsp_bank_details1);
$statement1->fetch();


 ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>



<div class="gap10"></div>
			<form id="form_rsp_m2">
			<div class="item1">
				<div class="gap20"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<input type="text" name="rsp_bank_name" id="rsp_bank_name" value="<?php echo $rsp_bank_name;?>" class="form-control" placeholder="Bank Name">
						</div>
						<div class="gap1"></div>
						<span for="rsp_bank_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Branch Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building"></i></span>
						<input type="text" name="rsp_branch_name" id="rsp_branch_name" value="<?php echo $rsp_branch_name;?>" class="form-control" placeholder="Branch Name">
						</div>
						<div class="gap1"></div>
						<span for="rsp_branch_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Branch Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
						<input type="text" name="rsp_branch_code" id="rsp_branch_code" value="<?php echo $rsp_branch_code;?>" class="form-control" placeholder="Branch Code">
						</div>
						<div class="gap1"></div>
						<span for="rsp_branch_code" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_country1" id="rsp_country1"  class="form-control">
							<option value="">Select</option>
							<?php countryId($rsp_country1) ?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="rsp_country1" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Type of Account <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_type_account" id="rsp_type_account"  class="form-control">
							<option value="">Select</option>
							<option>Current</option>
							<option>Savings</option>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="rsp_type_account" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Beneficiary Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_benefi_name" id="rsp_benefi_name" value="<?php echo $rsp_benefi_name;?>" class="form-control" placeholder="Beneficiary Name">
						</div>
						<div class="gap1"></div>
						<span for="rsp_benefi_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Account Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
						<input type="text" name="rsp_account_no" id="rsp_account_no" value="<?php echo $rsp_account_no;?>" class="form-control" placeholder="Account Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_account_no" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<textarea name="rsp_bank_details1" id="rsp_bank_details1"  class="form-control" placeholder="Complete Bnak Address"><?php echo $rsp_bank_details1;?></textarea>
						</div>
						<div class="gap1"></div>
						<span for="rsp_bank_details1" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<input type="reset" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>



<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_rsp_m2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_bank_name: {
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				rsp_branch_name:{
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				rsp_branch_code:{
				required: true,
				},
				rsp_country1:{
				required: true,
				},

				rsp_type_account:{
				required: true,
				},

				rsp_benefi_name:{
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				rsp_account_no:{
				required: true,
				},
				rsp_bank_details1:{
				required: true,
				},      
               },

 messages: {

		rsp_bank_name: {
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		rsp_branch_name:{
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		lettersonly: "Kindly enter only characters",
		},

		
		rsp_benefi_name: {
		lettersonly4N: "Kindly enter only characters",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
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

