<?php
$page="forgot_password";
$title="Forgot Password";
$ses="no";
include("class/config.php");
require_once 'includes/encrypt.php';
require_once 'email_sms.php';
extract($_REQUEST);

include("header.php"); ?>

<h3>Forgot Password</h3>
<div class="gap30"></div>

<div class="row">
<div class="col-sm-4">

	<h5>Enter your registered email address</h5>
	<div class="gap10"></div>

	<form id="forgot_pass" action="forgotPassword_action.php" method="post">
		<div class="form-group">
			<input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email Address">
		</div>
		<?php if($fgt==1){?>
			<div class="errors">Enter the valid email id that has been registered with Tooople</div>
		<?php }?>

		<div class="gap10"></div>
		<button type="submit" class="btn submitM">Submit</button> &nbsp;
		<a href="login.php" type="submit" class="btn submitM cancelBtn">Cancel</a>
		<div class="gap20"></div>
	</form>
</div>
</div>

<?php include("footer.php"); ?>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation ruless field is req
            $("#forgot_pass").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            user_email: {
                                            required: true,
                                            email: true,
                                            },
					   
               },


				//The error message Str here

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
