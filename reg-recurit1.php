<?php
$page="reg-recurit1";
$title="Registration &raquo; Recuriting";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-recurit1.php");
}

if(isset($proceed_submit)){
	header("location:reg-recurit2.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Recuriting Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-recurit2.php"></a>
			<div class="gap10"></div>Recuriting Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-recurit3.php"></a>
			<div class="gap10"></div>Recuriting Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Recuriting Organization Details</h3>
			<div class="gap10"></div>
			<form id="form_reg-recurit1">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_recorg_name" id="reg_recorg_name" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_recorg_email" id="reg_recorg_email" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="reg_recorg_web" id="reg_recorg_web" class="form-control" placeholder="Website URL">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_web" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="reg_recorg_lang" id="reg_recorg_lang" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_lang" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_recorg_phone" id="reg_recorg_phone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<input type="text" name="reg_recorg_city" id="reg_recorg_city" class="form-control" placeholder="Suburb/Town/City">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="reg_recorg_pin" id="reg_recorg_pin" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_pin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="reg_recorg_country" id="reg_recorg_country" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="reg_recorg_pan" id="reg_recorg_pan" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_pan" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="reg_recorg_tin" id="reg_recorg_tin" class="form-control" placeholder="TIN Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_tin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="reg_recorg_taxno" id="reg_recorg_taxno" class="form-control" placeholder="Service Tax Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_taxno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="reg_recorg_bank" id="reg_recorg_bank" class="form-control" placeholder="Bank Details">
						</div>
						<div class="gap1"></div>
						<span for="reg_recorg_bank" class="errors"></span>
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
            $("#form_reg-recurit1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            reg_recorg_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            reg_recorg_email: {
                                            required: true,
                                            email: true,
                                            },
					    reg_recorg_web: {
					    required: true,
					    firstChar: true,
					    },
					    reg_recorg_lang: {
					    required: true,
					    lettersonly: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    reg_recorg_phone: {
					    required: true,
					    phoneNL: true,
					    minlength: 8,
					    maxlength: 15,
					    },
					    reg_recorg_city: {
                                            required: true,
					    lettersonly: true,
                                            },
					    reg_recorg_pin: {
					    required: true,
					    lettersnumbers: true,
					    },
                                            reg_recorg_country: {
                                            required: true,
                                            },
                                            reg_recorg_pan: {
					    required: true,
					    minlength: 10,
					    maxlength: 16,
					    },
					    reg_recorg_tin: {
					    required: true,
					    minlength: 8,
					    maxlength: 15,
					    },
                                            reg_recorg_taxno: {
					    required: true,
					    minlength: 15,
					    maxlength: 15,
					    },
					    reg_recorg_bank: {
					    required: true,
					    minlength: 15,
					    maxlength: 150,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		reg_recorg_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},

		reg_recorg_email: {
		email: "Kindly enter a valid email address",
		},

		reg_recorg_lang: {
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		lettersonly: "Kindly enter only characters",
		},

		reg_recorg_phone: {
		phoneNL: "Kindly enter only numbers using + or -",
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		},

		reg_recorg_city: {
		lettersonly: "Kindly enter only characters",
		},

		reg_recorg_pin: {
		lettersnumbers: "Kindly enter the Valid Postal Code",
		},

		reg_recorg_pan: {
		minlength: "Kindly enter 10 to 16 values only ",
		maxlength: "Kindly enter 10 to 16 values only ",
		},

		reg_recorg_tin: {
		minlength: "Please enter 8 to 15 values only",
		maxlength: "Please enter 8 to 15 values only",
		},

		reg_recorg_taxno: {
		minlength: "Kindly enter 15 digits of Service Tax number",
		maxlength: "Kindly enter 15 digits of Service Tax number",
		},
		reg_recorg_bank: {
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



