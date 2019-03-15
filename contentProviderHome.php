<?php
$page="mentorProfile";
$title="Content Provider Additional Information";
$type=$_GET['t'];
include("header.php"); ?>

<h3>Content Provider Additional Information</h3>
<div class="gap30"></div>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#register1a1">Cost Info</a></li>
	<li><a data-toggle="tab" href="#register1b1"> Create And Maintain Calender Info</a></li>
	<li><a data-toggle="tab" href="#register1d1">Maintain History</a></li>
</ul>

<div class="tab-content">
<!-------------------------- cost info starts ---------------------->
	<div id="register1a1" class="tab-pane fade in active">
		<div class="gap20"></div>
			<div class="item1">
				<div class="gap20"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Content provider Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Loaded From DB">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Project Title <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-th-list"></i></span>
					<select class="form-control" id="" name="">
						<option value="">Select</option>		
						<option value="1">Loaded From Masters</option>
					</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Category <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<select class="form-control" id="" name="">
						<option value="">Select</option>		
						<option value="1">Loaded From Masters</option>
					</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Development Platform <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
					<select class="form-control" id="" name="">
						<option value="">Select</option>		
						<option value="1">Loaded From Masters</option>
					</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Duration <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
					<select class="form-control" id="" name="">
						<option value="">Select</option>		
						<option value="1">Loaded From Masters</option>
					</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


		      </div>  

		<div class="gap20"></div>
	</div>
<!-------------------------- /cost info starts ---------------------->
<!-------------------------- Create And Maintain Calander Info ---------------------->
	<div id="register1b1" class="tab-pane fade">
		<div class="gap20"></div>
			<div class="item1">
				<div class="gap20"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Content providor ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user-plus"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Loaded From DB">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Content providor Name<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Loaded From DB">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Date<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Date">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">From Time<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">To Time<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


		      </div>  
		<div class="gap20"></div>
	</div>
<!-------------------------- /Create And Maintain Calander Info ---------------------->
<!-------------------------- Maintain History ---------------------->
	<div id="register1d1" class="tab-pane fade">
		<div class="gap20"></div>
			<div class="item1">
				<div class="form-group">
					<label class="col-sm-3 text-right">Projects Created <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-cube"></i></span>
							<select class="form-control" id="" name="">
								<option value="">Select</option>		
								<option value="1">Loaded From Masters</option>
							</select>
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">No. of Hours Spent <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


				<div class="form-group">
					<label class="col-sm-3 text-right">Ranking and Rewards <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="user_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>


			</div>
		<div class="gap20"></div>
	</div>
<!--------------------------/ Maintain History ---------------------->
</div>
	<div class="gap10"></div>
	<div class="col-sm-9 col-sm-push-3">
		<input type="submit" class="btn submitM" id="" value="Save"> &nbsp;
		<a class="btn submitM" id="" href="#register6d" data-toggle="tab">Save & Proceed</a> &nbsp;
		<input type="reset" class="btn submitM cancelBtn" id="" value="Clear"> &nbsp;
		<a class="btn submitM" id="" href="index.php">Cancel</a>
	</div>
	<div class="gap10"></div>

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
            $("#form_reg").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            user_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 3,
                                            },
                                            last_name: {
                                            required: true,
                                            firstChar: true,
					    lettersonly4N: true,
					    minlength: 2,
                                            },
                                            user_email: {
                                            required: true,
                                            email: true,
                                            },
					    regCom: {
                                            required: true,
                                            },
					    user_comp: {
                                            required: true,
					    lettersonly4N: true,
                                            },
					    user_compReg: {
                                            required: true,
                                            },
					    user_JobDesig: {
                                            required: true,
					    lettersonly4N: true,
                                            },
					    user_compAdd: {
                                            required: true,
                                            },
					    user_compCountry: {
                                            required: true,
					    lettersonly4N: true,
                                            },
					    user_compPost: {
                                            required: true,
					    digits: true,
					    minlength: 6,
                                            maxlength: 6,
                                            },
					    user_address: {
                                            required: true,
                                            },
					    user_country: {
                                            required: true,
					    lettersonly4N: true,
                                            },
					    user_post: {
                                            required: true,
					    digits: true,
					    minlength: 6,
                                            maxlength: 6,
                                            },
					    pwdYesNo:  {
                                            required: true,
                                            },

					    gender:  {
                                            required: true,
                                            },

					    nationality:  {
                                            required: true,
					    lettersonly4N: true,
                                            },

					    nric:  {
					    lettersonly4N: true,
                                            required: true,
                                            },

					    hel:  {
                                            required: true,
					    lettersonly4N: true,
                                            },

                                            user_phone: {
                                            required: true,
					    digits: true,
					    minlength: 7,
                                            maxlength: 14,
                                            },
					    user_compPhone: {
                                            required: true,
					    digits: true,
					    minlength: 7,
                                            maxlength: 14,
                                            },
					    user_compFax: {
                                            required: true,
					    digits: true,
					    minlength: 7,
                                            maxlength: 14,
                                            },

                                            password: {
                                            required: true,
                                            minlength: 6,
                                            maxlength: 18,
                                            Uppercase: true,
                                            lowercase: true,
                                            alphacharc: true,
                                            numpas: true,
                                            },
                                            con_password: {
                                            required: true,
                                            equalTo:"#password",
                                            },

					    STI_imgString:{
                                               required:true,
                                                "remote":
                                                  {
                                                    url: 'includes/capchaValidation.php',
                                                    type: "post",
                                                    data:
                                                    {
                                                            depends: function()
                                                            {
                                                                    return $('input[name="STI_imgString"]').val();//For captcha validation
                                                            }
                                                    }
                                                  }
                                          },
                                            
               },


				//The error message Str here

           messages: {
                                            user_name: {
                                            required: "Please Enter User Name",
                                            firstChar: "Please Enter Characters Only",
					    lettersonly4N: "Please Enter Characters Only",
					    minlength: "Please Enter Minimum of Three Characters",
                                            },
                                            user_email: {
                                            required: "Please Enter a Email",
                                            email: "Please Enter Valid Email",
                                            },
					    user_comp: {
                                            required: "Please Enter Company",
                                            },
					    user_compReg: {
                                            required: "Please Enter Company Reg.no",
                                            },
					    user_JobDesig: {
                                            required: "Please Enter Designation",
                                            },
					    user_compAdd: {
                                            required: "Please Enter Company Address",
                                            },
					    user_address: {
                                            required: "Please Enter Address",
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



