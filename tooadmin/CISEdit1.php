<?php
$page="reg-institution1";
$title="Registration &raquo; Institution";
$ses="no";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);


if(isset($co_bank_details))
	$bank=$co_bank_details;
else
	$bank="";


if(isset($save_submit)||isset($proceed_submit)){
	$query = "UPDATE customer_organisation SET co_name=?,co_email=?,co_website=?,co_language=?,co_phone=?,co_fax=?,co_address=?,co_country=?,co_state=?,co_city=?,co_pincode=?,co_pan_number=?,
co_tin_number=?,co_taxno=?,co_bank_details=? where user_id='$id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sssssssiiisssss',$co_name,$co_email,$co_website,$co_language,$co_phone,$co_fax,$co_address,$co_country,$co_state,$co_city,$co_pincode,$co_pan_number,$co_tin_number,$co_taxno,$bank);
	$statement->execute();

	if(isset($proceed_submit)){
		header("location:CISEdit2.php?id=$id");
	}else{
		header("location:CISEdit1.php?id=$id");
	}
}

$sql = "SELECT co_name,co_email,co_website,co_language,co_phone,co_fax,co_address,co_country,co_state,co_city,co_pincode,co_pan_number,co_tin_number,co_taxno,co_bank_details FROM customer_organisation where user_id='$id'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($co_name,$co_email,$co_website,$co_language,$co_phone,$co_fax,$co_address,$co_country,$co_state,$co_city,$co_pincode,$co_pan_number,$co_tin_number,$co_taxno,$bank);
$statement1->fetch();




include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Institution Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-institution2.php"></a>
			<div class="gap10"></div>Institution Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-institution3.php"></a>
			<div class="gap10"></div>Institution Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Institution Organization Details</h3>
			<div class="gap10"></div>
			<form id="form_reg-institution1" method="post"> 
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="co_name" id="co_name" value="<?php echo $co_name;?>" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="co_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="co_email" id="co_email" value="<?php echo $co_email;?>" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="co_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="co_website" id="co_website" value="<?php echo $co_website;?>" class="form-control" placeholder="Website">
						</div>
						<div class="gap1"></div>
						<span for="co_website" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="co_language" id="co_language" value="<?php echo $co_language;?>" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="co_language" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="co_phone" id="co_phone" value="<?php echo $co_phone;?>" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="co_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Fax Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-fax"></i></span>
						<input type="tel" name="co_fax" id="co_fax" value="<?php echo $co_fax;?>" class="form-control" placeholder="Fax Number">
						</div>
						<div class="gap1"></div>
						<span for="co_fax" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag"></i></span>
						<textarea name="co_address" id="co_address" class="form-control tal100" placeholder="Address"><?php echo $co_address;?></textarea>
						</div>
						<div class="gap1"></div>
						<span for="co_address" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_country" id="co_country" class="form-control">
							<option value="">Select</option>
							 <?php countryId($co_country);?>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="co_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_state" id="co_state"  class="form-control">
							<option value="">Select</option>
							<?php categoryForState($co_country,$co_state);?>
							
						</select>
						</div>
						<div class="gap1"></div>
						<span for="co_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
					</div>
					<div class="gap15"></div>

					<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="co_city" id="co_city"  class="form-control">
							<option value="">Select</option>	
							<?php categoryForCity($co_state,$co_city);?>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="co_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="co_pincode" id="co_pincode" value="<?php echo $co_pincode;?>" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="co_pincode" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				
				<div class="gap15"></div>

				</div>

				

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="co_pan_number" id="co_pan_number" value="<?php echo $co_pan_number;?>" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="co_pan_number" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="co_tin_number" id="co_tin_number" value="<?php echo $co_tin_number;?>" class="form-control" placeholder="TIN Number">
						</div>
						<div class="gap1"></div>
						<span for="co_tin_number" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="co_taxno" id="co_taxno" value="<?php echo $co_taxno;?>" class="form-control" placeholder="Service Tax Number">
						</div>
						<div class="gap1"></div>
						<span for="co_taxno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
<?php
if($user_type=='CIS' || $user_type=='CRC'){
?>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="co_bank_details" id="co_bank_details" value="<?php echo $bank;?>" class="form-control" placeholder="Bank Details">
						</div>
						<div class="gap1"></div>
						<span for="co_bank_details" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
<?php }?>
		      
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Proceed"> &nbsp;
				<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"
> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
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
            $("#form_reg-institution1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            co_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            co_email: {
                                            required: true,
                                            email: true,
                                            },
					    co_website: {
					    required: true,
					    firstChar: true,
					    },
					    co_language: {
					    required: true,
					    lettersonly: true,
					    firstChar: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    co_phone: {
					    required: true,
					    phoneAll: true,
 					    minlength: 8,
					    maxlength: 15,
					    },
					    co_fax: {
					    required: true,
					    numbersrest: true,
					    minlength: 10,
					    maxlength: 10,
					    },
					    co_address: {
					    required: true,
					    },
					    co_country: {
                                            required: true,
                                            },
					    co_state: {
                                            required: true,
                                            },
					    co_city: {
                                            required: true,
                                            },
					    co_pincode: {
					    required: true,
					    numbersrest: true,
					    },
                                            co_pan_number: {
					    required: true,
					    minlength: 10,
					    maxlength: 16,
					    lettersnums: true,
					    },
					    co_tin_number: {
					    minlength: 8,
					    maxlength: 15,
					    lettersnums: true,
					    },
                                            co_taxno: {
					    required: true,
					    minlength: 15,
					    maxlength: 15,
					    numbersrest: true,
					    },
					    co_bank_details: {
					    minlength: 15,
					    maxlength: 150,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		co_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		co_email: {
		email: "Kindly enter a valid email address",
		},

		co_language: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		lettersonly: "Kindly enter only characters",
		firstChar: "Kindly start with Character",
		},

		co_phone: {
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		phoneAll: "Kindly enter only numbers using + or -",
		},

		co_fax: {
		numbersrest: "Kindly enter only numbers",
		minlength: "Kindly enter 10 digit fax number",
		maxlength: "Kindly enter 10 digit fax number",
		},

		co_pincode: {
		numbersrest: "Kindly enter the Valid Postal Code",
		},

		co_pan_number: {
		minlength: "Kindly enter 10 to 16 values only ",
		maxlength: "Kindly enter 10 to 16 values only ",
		lettersnums: "Kindly enter only characters & numbers",
		},

		co_tin_number: {
		minlength: "Please enter 8 to 15 values only",
		maxlength: "Please enter 8 to 15 values only",
		},

		co_taxno: {
		minlength: "Kindly enter 15 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		numbersrest: "Kindly enter only numbers",
		},

		co_bank_details: {
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
$('#co_country').change(function()
{
var con=$('#co_country').val();
if(con=='')
{
$('#co_state').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#co_state').html(response);
        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#co_state').change(function()
{
var com=$('#co_state').val();
if(com=='')
{
$('#co_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#co_city').html(response);
        }
    });
}
});
});

function empty_form(val1){
        $("#"+val1).closest('#form_reg-institution1').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}
</script>
