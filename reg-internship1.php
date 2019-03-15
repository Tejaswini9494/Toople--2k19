<?php
$page="reg-internship1";
$title="Registration &raquo; Internship";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-internship1.php");
}

if(isset($proceed_submit)){
	header("location:reg-internship2.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Internship Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-internship2.php"></a>
			<div class="gap10"></div>Internship Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-internship3.php"></a>
			<div class="gap10"></div>Internship Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Internship Organization Details</h3>
			<div class="gap10"></div>
			<form id="form_reg-internship1">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_internorg_name" id="reg_internorg_name" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_internorg_email" id="reg_internorg_email" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="reg_internorg_web" id="reg_internorg_web" class="form-control" placeholder="Website URL">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_web" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="reg_internorg_lang" id="reg_internorg_lang" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_lang" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_internorg_phone" id="reg_internorg_phone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<input type="text" name="reg_internorg_city" id="reg_internorg_city" class="form-control" placeholder="Suburb/Town/City">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="reg_internorg_pin" id="reg_internorg_pin" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_pin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="reg_internorg_country" id="reg_internorg_country" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="reg_internorg_pan" id="reg_internorg_pan" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_pan" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="reg_internorg_tin" id="reg_internorg_tin" class="form-control" placeholder="TIN Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_tin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="reg_internorg_taxno" id="reg_internorg_taxno" class="form-control" placeholder="Service Tax Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_taxno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="reg_internorg_bank" id="reg_internorg_bank" class="form-control" placeholder="Bank Details">
						</div>
						<div class="gap1"></div>
						<span for="reg_internorg_bank" class="errors"></span>
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
            $("#form_reg-internship1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            reg_internorg_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            reg_internorg_email: {
                                            required: true,
                                            email: true,
                                            },
					    reg_internorg_web: {
					    required: true,
					    firstChar: true,
					    },
					    reg_internorg_lang: {
					    required: true,
					    lettersonly: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    reg_internorg_phone: {
					    required: true,
					    phoneNL: true,
					    minlength: 8,
					    maxlength: 15,
					    },
					    reg_internorg_city: {
                                            required: true,
					    lettersonly: true,
                                            },
					    reg_internorg_pin: {
					    required: true,
					    lettersnumbers: true,
					    },
                                            reg_internorg_country: {
                                            required: true,
                                            },
                                            reg_internorg_pan: {
					    required: true,
					    minlength: 10,
					    maxlength: 16,
					    },
					    reg_internorg_tin: {
					    required: true,
					    minlength: 8,
					    maxlength: 15,
					    },
                                            reg_internorg_taxno: {
					    required: true,
					    minlength: 15,
					    maxlength: 15,
					    },
					    reg_internorg_bank: {
					    required: true,
					    minlength: 15,
					    maxlength: 150,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		reg_internorg_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		reg_internorg_email: {
		email: "Kindly enter a valid email address",
		},

		reg_internorg_lang: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		lettersonly: "Kindly enter only characters",
		},

		reg_internorg_phone: {
		phoneNL: "Kindly enter only numbers using + or -",
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		},

		reg_internorg_city: {
		lettersonly: "Kindly enter only characters",
		},

		reg_internorg_pin: {
		lettersnumbers: "Kindly enter the Valid Postal Code",
		},

		reg_internorg_pan: {
		minlength: "Kindly enter 10 to 16 values only ",
		maxlength: "Kindly enter 10 to 16 values only ",
		},

		reg_internorg_tin: {
		minlength: "Please enter 8 to 15 values only",
		maxlength: "Please enter 8 to 15 values only",
		},

		reg_internorg_taxno: {
		minlength: "Kindly enter 15 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		},
		reg_internorg_bank: {
		minlength: "Kindly enter only 15 to 150 values",
		maxlength: "Kindly enter only 15 to 150 values",
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


