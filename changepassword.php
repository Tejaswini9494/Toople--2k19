<?php
session_start();
$page="changePassword";
$title="Change Password";
$ses="yes";
include("class/config.php");
require_once 'includes/encrypt.php';
require_once 'email_sms.php';
extract($_REQUEST);
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];
$username1=$_SESSION["username"];
$nrows3=0;
$erMsg="N";

if(isset($new_password))
{
	$query3 = "SELECT user_pwd FROM too_users where user_id=$user_id";
	$statement3=$mysqli->prepare($query3);
	$statement3->execute();
	$statement3->store_result();
	$statement3->bind_result($user_pwd3);
	$statement3->fetch();
	$nrows3=$statement3->num_rows();

	if($nrows3>0) {

		$user_pwd31=decrypt($user_pwd3,'tooople');

		if($user_pwd31===$old_password) {
			$con_password1=encrypt($con_password,'tooople');
			//echo $con_password1.'<br>'.$con_password; exit;
			$stmt = $mysqli->prepare("UPDATE too_users SET user_pwd = ? WHERE user_id='$user_id'");
			//echo "UPDATE too_users SET user_pwd = '$con_password1' WHERE user_id='$user_id'";
			$stmt->bind_param('s', $con_password1);
			$stmt->execute();
			header("location:index.php");
			exit;
		} else{
			$erMsg="Y";
		}
	}
}
include("header.php"); 
?>


<div class="gap20"></div>

<div class="row">
<div class="col-md-9">

	<h2>Change Password</h2>
	<div class="gap20"></div>

<?php if($erMsg=="Y") { ?>
	<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alert!</strong> Old Password doesn't match with existing password.
	</div>
<?php } ?>

	<form method="post" id="change_pass_valid" name="passwor_chan" class="styleThese">

	<div class="form-group">
		<label class="col-sm-4 text-right">Enter Old Password <span class="red">*</span></label>
		<div class="col-sm-6">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
			<input type="password" name="old_password" id="old_password" maxlength="18" class="form-control" placeholder="Enter Old Password" autofocus >
                        
			</div>
			<div class="gap1"></div>
			<span for="old_password" class="errors"></span>
		</div>
	</div>
	<div class="gap15"></div>
	<div class="form-group">
		<label class="col-sm-4 text-right">Enter New Password <span class="red">*</span></label>
		<div class="col-sm-6">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
			<input type="password" name="new_password" id="new_password" class="form-control" placeholder=""  maxlength="18">
                        <span id="new_password1_error" style="width:100%;" class="errors"><span>
			</div>
			<div class="gap1"></div>
			<span for="new_password" class="errors"></span>
		</div>
	</div>
	<div class="gap15"></div>
	<div class="form-group">
		<label class="col-sm-4 text-right">Enter Confirm Password <span class="red">*</span></label>
		<div class="col-sm-6">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-keyboard-o"></i></span>
			<input type="password" name="con_password" id="con_password" class="form-control" placeholder=""  maxlength="18">
						<span id="con_password1_error" style="width:100%;" class="errors"><span>
			</div>
			<div class="gap1"></div>
			<span for="con_password" class="errors"></span>
		</div>
	</div>
	<div class="gap15"></div>
	<div class="col-sm-6 col-sm-push-4">	<input type="submit" id="new_password" name="new_password" value="Change" class="submitM" > </div>

	</form>

</div>

<div class="col-md-3">
	
</div>
</div>
<div class="gap50"></div>
<?php include("footer.php"); ?>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#change_pass_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					old_password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                        lettersnumberswithalpha:true,
                                        },
                                        new_password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                        lettersnumberswithalpha:true,
                                        },
                                        con_password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                        lettersnumberswithalpha:true,
                                        equalTo:"#new_password",
                                        },
                                        
                                        
                                        
                    },


				//The error message Str here

           messages: {
                 
      },
       
               submitHandler: function (form) { 
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

