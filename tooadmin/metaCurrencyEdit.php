<?php  
$page="metaCurrencyEdit";
include_once ("include/functions.php");
include("header.php"); ?>

<h1> Settings  &raquo;  Meta  &raquo;    Currency  &raquo;  Edit </h1>

<form method="post" id="country_valid" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">

    <tr>
      <td align="right"> Country <span class="red">*</span></td>
      <td><select name="select" id="select" class="boxM">
		<option> Select Country </option>
		<?php echo getCountry(); ?>
        </select></td>
    </tr>

    <tr>
      <td align="right"> Currency <span class="red">*</span></td>
      <td valign="top"><input type="text" name="country_currency" id="country_currency" class="boxM"></td>
    </tr>
    
    <tr>
	<td align="right" valign="top">&nbsp;</td>
	<td><input name="submit_count" type="submit" value="Submit" class="submit" />
	<input name="sub" type="reset" value="Cancel" class="submit" /></td>
    </tr>
  </table>
</form>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#country_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					country: {
                                        required:true,
                                        minlength:2,
                                        },
                                        country_comments: {
                                        minlength:2,
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

<?php include("footer.php");  ?>
