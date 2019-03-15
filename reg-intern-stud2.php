<?php
$page="reg-intern-stud2";
$title="Registration &raquo; Intern Student";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-intern-stud2.php");
}

if(isset($proceed_submit)){
	header("location:reg-intern-stud3.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud1.php"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Contact Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud3.php"></a>
			<div class="gap10"></div>Educational Qualification
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud4.php"></a>
			<div class="gap10"></div>Technical Skills
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud5.php"></a>
			<div class="gap10"></div>Certification Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud6.php"></a>
			<div class="gap10"></div>Work Experience
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Contact Info</h3>
			<div class="gap10"></div>
			<form method="post" id="form_intern_contactinfo_reg">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line1 <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" name="reg_intstudent_address1" id="reg_intstudent_address1"/>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_address1" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Address Line2</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<input type="text" class="form-control" name="reg_intstudent_address2
" id="reg_intstudent_address2" />
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_address2" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="reg_intstudent_con" id="reg_intstudent_con" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_con" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">State <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-flag"></i></span>
						<select name="reg_intstudent_state" id="reg_intstudent_state" class="form-control">
							<option value="">- Select - </option>
							<option value="1">Load From Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_state" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>


				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<select name="reg_intstudent_city" id="reg_intstudent_city" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Primary Contact <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
						<select class="form-control" style="width: 35%;">
							<option>India (+91)</option>
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="reg_intstudent_contact" id="reg_intstudent_contact" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number"maxlength="10" />
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_contact" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" class="form-control" name="reg_intstudent_email" id="reg_intstudent_email" maxlength="50"/>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Alternate Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" class="form-control" name="reg_intstudent_altemail" id="reg_intstudent_altemail"maxlength="50"/>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_altemail" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Secondary Contact </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-mobile font20"></i></span>
						<select class="form-control" style="width: 35%;">
							<option>India (+91)</option>
						</select><i style="left: 34.6%;"></i>
						<input type="text" name="reg_intstudent_seccontact" id="reg_intstudent_seccontact" class="form-control" placeholder="10 Digit Number" style="width: 65%;" title="Enter Your Mobile Number"maxlength="10" />
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_seccontact" class="errors"></span>
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
            $("#form_intern_contactinfo_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            reg_intstudent_address1: {
                                            required: true,
                                            },
                                            reg_intstudent_address2: {                                   						
                                            },
                                            reg_intstudent_con: {
                                            required: true,	
					    },
                                            reg_intstudent_state: {
                                            required: true,
                                            },
					    reg_intstudent_city: {
                                            required: true,
					    },
					    reg_intstudent_contact:  {
					    required: true,
                                            digits: true,
					    minlength:10,
					    maxlength:10,
					    },
                                            reg_intstudent_email: {
                                            required: true,
					    email: true,
                                            },
 					    reg_intstudent_altemail:  {
                                            email: true,
					    },
                                            reg_intstudent_seccontact: {                                         
					    digits:true,
					    minlength:10,
					    maxlength:10,
                                            },
                                            
               },


				//The error message Str here

           messages: {
		
                                            reg_intstudent_address1: {
                                            required: "This field is required",
                                            },
                                            reg_intstudent_address2: {                                           						
                                            },
                                            reg_intstudent_con: {
                                            required: "Please Select Country",					    	
					    },
                                            reg_intstudent_state: {
                                            required: "Please Select State",
                                            },
					    reg_intstudent_city: {
                                            required: "Please Select City",
					    },
					    reg_intstudent_contact:  {
					    required: "kindly enter Phone Number",
                                            digits: "Please enter valid Phone Number",
					    minlength:"kindly enter 10 digits",
					    },
                                            reg_intstudent_email: {
                                            required: "This field is required",
					    email: "Kindly enter Valid Email Id",
                                            },
 					    reg_intstudent_altemail:  {
					    email: "Kindly enter Valid Email Id",                                          
					    },
                                            reg_intstudent_seccontact: {                                           
                                            digits: "Please enter valid Phone Number",
					    minlength:"kindly enter 10 digits",
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
