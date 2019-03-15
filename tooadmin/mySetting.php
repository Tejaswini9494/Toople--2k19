<?php  
$page="mySetting";
include("header.php"); 
?>

<h1><?php echo Setting ?> &raquo; <?php echo Companyinfo ?></h1>

<form method="POST" id="settings_valid">
<table align="center">
  <tr>
    <td align="right">Company Name <span class="red">*</span></td>
    <td><input type="text" name="company_name" id="company_name" placeholder="Company Name" maxlength="150" class="boxL" /></td>
  </tr>
  <tr>
    <td align="right">Logo<span class="red">*</span></td>
    <td><input type="file" name="logo" id="logo" />
      <br />
      <span class="red">/*size should be 90px X 40px;*/</span></td>
  </tr>
  <tr>
    <td align="right">Default</td>
    <td><img src="images/na.jpg" width="90" height="40" /></td>
  </tr>
  <tr>
    <td align="right">Phone No.<span class="red">*</span></td>
    <td><input type="text" name="phone_no" id="phone_no" placeholder="Phone No" maxlength="10" class="boxL" /></td>
  </tr>
  <tr>
    <td align="right">VAT No.<span class="red">*</span></td>
    <td><input type="text" name="vat_no" id="vat_no" placeholder="VAT No" class="boxL" /></td>
  </tr>
  <tr>
    <td align="right">Address<span class="red">*</span></td>
    <td><textarea name="address" id="address" placeholder="Address"  cols="45" rows="5" class="taL"></textarea></td>
  </tr>
  <tr>
      <td align="right">&nbsp;</td>
      <td><input name="submit_set" type="submit" value="Submit" class="submit" />
        <input name="sub" type="reset" value="Cancel" class="submit" /></td>
    </tr>
</table>
</form>


 
<?php //include("saveBox.php");  ?>
 <?php //include("setBot.php");  ?>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#settings_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					company_name: {
                                        required:true,
                                        minlength:2,
                                        },
                                        logo: {
                                        required:true,
                                        extension: "jpg|png|jpeg|gif",
                                        },
                                        phone_no: {
                                        required:true,
                                        digits:true,
                                        minlength:10,
                                        },
                                        vat_no: {
                                        required:true,
                                        digits:true,
                                        },
                                        address: {
                                        required:true,
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

 
<?php include("footer.php"); ?>
