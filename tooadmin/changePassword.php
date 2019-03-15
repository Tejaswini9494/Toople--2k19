<?php  
$page="changePassword";
$xpan="no";
include("header.php");
include_once("../class/config.php");
extract($_REQUEST);

$sql="UPDATE admin_login SET password=? where password='$user_password'";
$statement=$mysqli->prepare($sql);
$statement->bind_param('s',$new_password);
$statement->execute();
 ?>

<h1>Change Password</h1>
<br>
<form id="form_changePassword" method="post"> 
 
<table width="100%" cellspacing="0" cellpadding="0">

  <tr>
    <td width="30%" align="right">Old Password  : <span class="red">*</span></td>
    <td><input name="user_password" type="password" class="boxL" /></td>
  </tr>
  <tr>
    <td width="30%" align="right">New Password  : <span class="red">*</span></td>
    <td><input name="new_password" id="new_password" type="password" class="boxL" /></td>
  </tr>
  <tr>
    <td width="30%" align="right">Confirm New Password  : <span class="red">*</span></td>
    <td><input name="confirm_new_password" type="password" class="boxL" /></td>
  </tr>
  <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="input5" type="submit" value="Submit" class="submit" />
      <input name="input5" type="reset" value="Cancel" class="submit cancelBtn" /></td>
  </tr>
</table>
 
</form>
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
            $("#form_changePassword").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
                                        user_password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                        
                                        },
					new_password: {
                                        required:true,
                                        minlength:6,
                                        maxlength:18,
                                       
                                        },
					confirm_new_password: {
                                        required:true,
					equalTo:"#new_password",
                                        },
                    },


				//The error message Str here

           messages: {
                 
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


