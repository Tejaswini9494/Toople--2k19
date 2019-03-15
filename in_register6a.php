<?php
$page="reg-rsp-mentor1";
$title="Registration &raquo; Representative for Service Provider-mentor";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];
$emailId=$_SESSION["username"];
if(isset($save_submit) || isset($proceed_submit)){
$query = "UPDATE representative_service_provider SET rsp_org_name=?,rsp_email=?,rsp_web=?,rsp_lang=?,rsp_phone=?,rsp_country=?,rsp_state=?,rsp_city=?,rsp_postal=?,rsp_pan=?,rsp_tin=?,rsp_tax=?,rsp_bank_details=? where user_id='$user_id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sssssssssssss',$rsp_org_name,$rsp_email,$rsp_web,$rsp_lang,$rsp_phone,$rsp_country,$rsp_state,$rsp_city,$rsp_postal,$rsp_pan,$rsp_tin,$rsp_tax,$rsp_bank_details);
	$statement->execute();
	

	if(isset($proceed_submit)){
		header("location:reg-rsp-mentor2.php");
	}else{
		header("location:reg-rsp-mentor1.php");
	}
}



$sql = "SELECT rsp_org_name,rsp_email,rsp_web,rsp_lang,rsp_phone,rsp_country,rsp_state,rsp_city,rsp_postal,rsp_pan,rsp_tin,rsp_tax,rsp_bank_details FROM representative_service_provider where user_id='$user_id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($rsp_org_name,$rsp_email,$rsp_web,$rsp_lang,$rsp_phone,$rsp_country,$rsp_state,$rsp_city,$rsp_postal,$rsp_pan,$rsp_tin,$rsp_tax,$rsp_bank_details);
$statement1->fetch();

if($statement1->num_rows() < 1) {
	$status='A';
	$query2 = "INSERT INTO representative_service_provider (user_id) VALUES($user_id)";
	$statement2= $mysqli->prepare($query2);  
	$statement2->execute();
}
  

 ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>		








		<h3>Mentor Service Provider Organization Details</h3>
			<div class="gap10"></div>
			<form id="form_rsp_mentor">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_org_name" id="rsp_org_name" value="<?php echo $rsp_org_name;?>" class="form-control" placeholder="Name">
						</div>
						<div class="gap1"></div>
						<span for="rsp_org_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="rsp_email" id="rsp_email" value="<?php echo $emailId;?>" class="form-control" placeholder="Email" readonly>
						</div>
						<div class="gap1"></div>
						<span for="rsp_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="rsp_web" id="rsp_web" value="<?php echo $rsp_web;?>" class="form-control" placeholder="Website URL">
						</div>
						<div class="gap1"></div>
						<span for="rsp_website" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="rsp_lang" id="rsp_lang"  value="<?php echo $rsp_lang;?>" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="rsp_language" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="rsp_phone" id="rsp_phone" value="<?php echo $rsp_phone;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_country" id="rsp_country" class="form-control">
							<option value="">Select</option>
							 <?php countryId($rsp_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="rsp_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_state" id="rsp_state"  class="form-control">
							<option value="">Select</option>
							<?php categoryForState($rsp_country,$rsp_state);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="rsp_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_city" id="rsp_city"  class="form-control">
							<option value="">Select</option>
							<?php categoryForCity($rsp_state,$rsp_city);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="rsp_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="rsp_pan" id="rsp_pan"  value="<?php echo $rsp_pan;?>" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_pan" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="rsp_tin" id="rsp_tin"  value="<?php echo $rsp_tin;?>" class="form-control" placeholder="TIN Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="rsp_tax" id="rsp_tax" value="<?php echo $rsp_tax;?>" class="form-control" placeholder="Service Tax Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tax" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="rsp_bank_details" id="rsp_bank_details" value="<?php echo $rsp_bank_details;?>" class="form-control" placeholder="Bank Details">
						</div>
						<div class="gap1"></div>
						<span for="rsp_bank_details" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
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
            $("#form_rsp_mentor").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_org_name : {
				required: true,
				firstChar: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},
				
				rsp_email: {
				required: true,
				email: true,
				},		
		
				rsp_website:{
				required: true,
				},

				rsp_lang:{
				required: true,
				lettersonly: true,
				minlength: 3,
				maxlength: 50,
				firstChar: true,
				},

				rsp_phone:{
				required: true,
				phoneAll: true,
				minlength: 8,
				maxlength: 15,
				},

	   			rsp_country:{
				required: true,
				},

				rsp_state:{
				required: true,
				},

				rsp_city:{
				required: true,
				},

				rsp_postal:{
				required: true,
				minlength: 6,
				maxlength: 18,
				lettersnums: true,
				},

				rsp_pan:{
				required: true,
				alphanumeric: true,
				minlength: 10,
				maxlength: 16,
				},

				rsp_tin:{
				required: true,
				minlength: 8,
				maxlength: 15,
				},

				rsp_tax:{
				required: true,
				numbersrest: true,
				minlength: 2,
				maxlength: 15,
				},

				rsp_bank_details:{
				required: true,
				minlength: 15,
				maxlength: 150,
				firstChar: true,
                                },
                                            
               },

				//The error message Str here
  messages: {

		rsp_org_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		rsp_email: {
		email: "Kindly enter a valid email address",
		},

		rsp_lang: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		lettersonly: "Kindly enter only characters",
		firstChar: "Kindly start with Character",
		},

		rsp_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",
		},

		rsp_postal: {
		lettersnums: "Kindly enter the Valid Postal Code",
		},

		rsp_pan: {
		minlength: "Kindly enter 10 to 16 values only ",
		maxlength: "Kindly enter 10 to 16 values only ",
		},

		rsp_tin: {
		minlength: "Please enter 8 to 15 values only",
		maxlength: "Please enter 8 to 15 values only",
		},

		rsp_tax: {
		minlength: "Kindly enter 2 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		},

		rsp_bank_details: {
		minlength: "Kindly enter only 15 to 150 characters",
		maxlength: "Kindly enter only 15 to 150 characters",
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
$(document).ready(function()
{
$('#rsp_country').change(function()
{
var con=$('#rsp_country').val();
if(con=='')
{
$('#rsp_state').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#rsp_state').html(response);
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#rsp_state').change(function()
{
var com=$('#rsp_state').val();
if(com=='')
{
$('#rsp_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#rsp_city').html(response);
        }
    });
}
});
});
</script>


