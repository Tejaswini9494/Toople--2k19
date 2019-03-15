<?php
$page="reg-internship2";
$title="Registration &raquo; Internship";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-internship2.php");
}

if(isset($proceed_submit)){
	header("location:reg-internship3.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss1">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-internship1.php"></a>
			<div class="gap10"></div>Internship Organization Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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
			<h3>Internship Representative Details</h3>
			<div class="gap10"></div>
			<form id="form_reg-internship2">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_internrep_name" id="reg_internrep_name" class="form-control" placeholder="Name" autofocus>
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Employee ID No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<input type="text" name="reg_internrep_idno" id="reg_internrep_idno" class="form-control" placeholder="ID Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_idno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Designation/Role <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<input type="text" name="reg_internrep_desig" id="reg_internrep_desig" class="form-control" placeholder="Designation/Role">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_desig" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_internrep_email" id="reg_internrep_email" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_internrep_altemail" id="reg_internrep_altemail" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_altemail" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_internrep_phone" id="reg_internrep_phone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Phone Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_internrep_altphone" id="reg_internrep_altphone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_altphone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="reg_internrep_photo" id="reg_internrep_photo" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="reg_internrep_photo" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="" name="" value="Add Representative" class="btn submitM">
				</div>
				<div class="gap30"></div>

				<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Name</td>
						  <td>ID No.</td>
						  <td>Designation/Role</td>
						  <td>Language</td>
						  <td>Email</td>
						  <td>Phone</td>
						  <td>Suburb/Town/City</td>
						  <td>Postal Code</td>
						  <td>Country</td>
						  <td align="right">Action</td>
						</tr>
						<tr>
						  <td>Jack</td>
						  <td>ID101</td>
						  <td>Tutor</td>
						  <td>English</td>
						  <td>jack@email.com</td>
						  <td>98xxxxxxxxx</td>
						  <td>Chennai</td>
						  <td>60xxxxxx</td>
						  <td>India</td>
						  <td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
						</tr>
					</table>
				</div>
				</div> 

				<div class="gap20"></div>

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
            $("#form_reg-internship2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            reg_internrep_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
                                            },
                                            reg_internrep_idno: {
                                            required: true,
                                            numbersrest: true,
					    minlength: 8,
					    maxlength: 15,
                                            },
					    reg_internrep_desig: {
					    required: true,
					    firstChar: true,
					    minlength: 3,
					    maxlength: 50,
					    },
					    reg_internrep_email: {
					    required: true,
                                            email: true,
                                            },
					    reg_internrep_altemail: {
					    required: true,
                                            email: true,
					    },
					    reg_internrep_phone: {
					    required: true,
					    phoneNL: true,
					    minlength: 8,
					    maxlength: 15,
					    },  
					    reg_internrep_altphone: {
					    required: true,
					    phoneNL: true,
					    minlength: 8,
					    maxlength: 15,
					    },
					    reg_internrep_photo: {
					    required: true,
					    imgextension: true,
					    },

					                                             
               },


				//The error message Str here

           messages: {

		reg_internrep_name: {
		firstChar: "Kindly start with Character",
		lettersonly4N: "Kindly enter only characters, Space & dot",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},
		
		reg_internrep_idno: {
		numbersrest: "Kindly enter only numbers",
		minlength: "Kindly enter 8 to 15 digits only",
		maxlength: "Kindly enter 8 to 15 digits only",
		},

		reg_internrep_desig: {
		firstChar: "Kindly start with Character",
		minlength: "Kindly enter only 3 to 50 characters",
		maxlength: "Kindly enter only 3 to 50 characters",
		},		

		reg_internrep_email: {
		email: "Kindly enter a valid email address",
		},

		reg_internrep_altemail: {
		email: "Kindly enter a valid email address",
		},

		reg_instrep_phone: {
		phoneNL: "Kindly enter only numbers using + or -",
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		},
		
		reg_internrep_altphone: {
		phoneNL: "Kindly enter only numbers using + or -",
		minlength: "Kindly enter only 8 to 15 values",
		maxlength: "Kindly enter only 8 to 15 values",
		},

		reg_instrep_photo: {
		imgextension: "Kindly upload only JPGE,PNG,GIF Formats ",
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



