<?php  
$page="metaStateAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_state))
{
$status='A';
$query="Update master_tax SET tax=? where tax_id=1";
$statement=$mysqli->prepare($query);
$statement->bind_param('s',$tax);
$statement->execute();
header("location:metatax.php");
}

$sql="select tax from master_tax where tax_id=1";
$statement1=$mysqli->prepare($sql);
$statement1->bind_result($tax);
$statement1->execute();
$statement1->fetch();
include("header.php"); ?>

<h1> Settings  &raquo; Tax
<span class="back">
<a href="masters.php">Back</a>
</span></h1>


<form id="state_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">	
    <tr>
      <td align="right"> Tax in % :<span class="red">*</span></td>
      <td valign="top"><input name="tax" id="tax" type="text" class="boxM" placeholder="Tax" value="<?php echo numbToDesi($tax);?>" maxlength="100"/></td>
    </tr>	
	
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
      </td>

    </tr>
  </table>
</form>
<?php include("footer.php");  ?>
<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#state_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					tax: {
                                        decimalnum:true,
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


