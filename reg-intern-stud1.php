<?php
$page="reg-intern-stud1";
$title="Registration &raquo; Intern Student";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-intern-stud1.php");
}

if(isset($proceed_submit)){
	header("location:reg-intern-stud2.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Personal Info
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-intern-stud2.php"></a>
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
			<h3>Personal Info</h3>
			<div class="gap10"></div>
			<form method="post" id="form_intern_personalinfo_reg" enctype="multipart/form-data">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Institution Name</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<select name="reg_intstudent_insti" id="reg_intstudent_insti" class="form-control">
							<option value="">Institution Name</option>
							<option>Loaded from Master</option>
						</select>
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_insti" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">First name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_intstudent_fname" id="reg_intstudent_fname" class="form-control" onkeypress="return alpha(event);" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" placeholder="First name" maxlength="50">
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_fname" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Last name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_intstudent_lname" id="reg_intstudent_lname" class="form-control" placeholder="Last name" maxlength="50">
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_lname" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Date of Birth <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" class="form-control date1" name="reg_intstudent_dob" id="reg_intstudent_dob" placeholder="Date Of Birth">
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_dob" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
					<div class="gap15"></div>
	

				<div class="form-group">
					<label class="col-sm-3 text-right">Gender <span class="red">*</span></label>
					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-female"></i></span>
						<span class="form-control">Female</span>
						<span class="input-group-addon"><input type="radio" id="" name="reg_intstudent_gender"></span>
						</div>
					</div>
					 
					<div class="col-sm-3">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-male"></i></span>
						<span class="form-control">Male</span>
						<span class="input-group-addon"><input type="radio" id="" name="reg_intstudent_gender"></span>
						</div>
					</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_gender" class="errors col-sm-8 col-sm-push-3" ></span>
				</div>

				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Identity Number </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_intstudent_idno" id="reg_intstudent_idno" class="form-control" placeholder="Identity Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_idno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="reg_intstudent_photo" id="reg_intstudent_photo" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="reg_intstudent_photo" class="errors"></span>
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
            $("#form_intern_personalinfo_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            reg_intstudent_insti: {
                                            required: true,
                                            },
                                            reg_intstudent_fname: {
                                            required: true,
					    firstChar: true,
					    lettersonly4N:true,
					    minlength:3,
					    maxlength:50,						
                                            },
                                            reg_intstudent_lname: {
                                            required: true,
					    firstChar: true,
					    lettersonly4N: true,
					    minlength:1,
					    maxlength:50,	
					    },
                                            reg_intstudent_dob: {
                                            required: true,
                                            },
					    reg_intstudent_gender: {
                                            required: true,
					    },
					    reg_intstudent_idno:  {
                                            numbersonly:true,
					    },
                                            reg_intstudent_photo: {
                                            required: true,
					    accept: "jpg|jpeg|gif|png",
                                            },
                                            
               },


				//The error message Str here

           messages: {
		
					 reg_intstudent_insti: {
                                            required: "Please Select the Institution Name",
                                            },
                                            reg_intstudent_fname: {
                                            required: "This Field is Required",
					    minlength:"Please enter atleast 3 characters",
					    maxlength:"Please enter no more than 50 characters",				
                                            },
                                            reg_intstudent_lname: {
                                            required: "This Field is Required",
					    },
                                            reg_intstudent_dob: {
                                            required: "Please select your DOB",
                                            },
					    reg_intstudent_gender: {
                                            required: "Please Select Gender",
					    },
					    reg_intstudent_idno:  {
                                            numbersonly: "Kindly enter Numbers only",
					    },
                                            reg_intstudent_photo: {
                                            required: "This Field is Required",
					    accept: "Please enter ' jpg | jpeg |gif | png ' image formats only",
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
