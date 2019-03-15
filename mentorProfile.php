<?php
$page="mentorProfile";
$title="Mentor Profile";
$type=$_GET['t'];
include("header.php"); ?>

<h3>Mentor Profile</h3>
<div class="gap30"></div>

<div class="item1">
	<div class="gap20"></div>
	<div class="form-group">
		<label class="col-sm-3 text-right">Are You? <span class="red">*</span></label>
		<div class="col-sm-9">
			<select required="required" class="form-control" id="usertype" name="usertype" disabled>
				<option value="">Select</option>		
				<option value="1">Project Student</option>
				<option value="2">Intern Student</option>
				<option value="3" selected>Mentor</option>
				<option value="4">Content Provider</option>
				<option value="5">Representative of Customer Organization</option>
				<option value="6">Representative of Service Provider Organization</option>
				<option value="7">Representative of Recruiting Organization</option>
				<option value="8">Representative of Internship Organization</option>
			</select>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap10"></div>
</div>
<div class="gap30"></div>


<!----------- Type 1, 2, 3 ------------>
<div class="formss" id="ut123">
	<?php include("in_ut123.php"); ?>
</div>
<!-----------/ Type 1, 2, 3 ------------>

<!----------- Type 5 ------------>
<div id="ut5" style="display:none;">
	<?php include("in_ut5.php"); ?>
</div>
<!-----------/ Type 5 ------------>

<!----------- Type 6 ------------>
<div id="ut6" style="display:none;">
	<?php include("in_ut6.php"); ?>
</div>
<!-----------/ Type 6 ------------>


	<form id="form_reg1" action="">
	</form>

<?php include("footer.php"); ?>

<!------ User Type ----->
<script>
$(document).ready(function(){
	$("#usertype").on('change', function(){
		$vl=$(this).val();
		if($vl<=3) {
			document.getElementById("ut123").style.display="block";
			document.getElementById("ut5").style.display="none";
			document.getElementById("ut6").style.display="none";
		}
		if($vl==5) {
			document.getElementById("ut123").style.display="none";
			document.getElementById("ut5").style.display="block";
			document.getElementById("ut6").style.display="none";
		}
		if($vl==6) {
			document.getElementById("ut123").style.display="none";
			document.getElementById("ut5").style.display="none";
			document.getElementById("ut6").style.display="block";
		}
	});
});
</script>

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


