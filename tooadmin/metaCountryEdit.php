<?php  
$page="metaCountryEdit";
include_once("../class/config.php");
include_once("include/functions.php");
extract($_REQUEST);

if(isset($submit_count))
{
$query1s="UPDATE master_country SET country_name=?,currency=?,isd_code=? where country_id=?";
$statement1s=$mysqli->prepare($query1s);
$statement1s->bind_param('sssi',$country_name,$currency,$isd_code,$id);
$statement1s->execute();
header("location:metaCountry.php");
}
include("header.php"); 
extract($_REQUEST);
$query="select country_name,currency,isd_code from master_country where country_id='".$id."'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($country_name,$currency,$isd_code);
$statement->fetch();
?>

<h1> Settings  &raquo;  Meta  &raquo;    Country  &raquo;  Edit 
<span class="back">
<a href="metaCountry.php">View</a>
</span>
</h1>
</h1>

<form method="post" id="country_valid" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Country:<span class="red">*</span></td>
      <td><input type="text" name="country_name" id="country_name" value="<?php echo $country_name;  ?>" placeholder="Country" maxlength="100" class="boxM"></td>
    </tr>

   <tr>
      <td align="right"> currency :<span class="red">*</span></td>
      <td><input type="text" name="currency" id="currency" value="<?php echo $currency;  ?>" placeholder="currency" maxlength="100" class="boxM"></td>
   </tr>
   <tr>
      <td align="right"> ISD Code :</td>
      <td><input type="text" name="isd_code" id="isd_code" value="<?php echo $isd_code;  ?>" placeholder="ISD Code" maxlength="100" class="boxM"></td>
    </tr>

   	    
    <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" type="submit" value="Submit" class="submit" />
        <input name="sub" type="reset" value="Cancel" class="submit" /></td>
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
            $("#country_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					country_name: {
                                        required:true,
                                        },
					currency: {
					required:true,
                                        },
                                        isd_code: {
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



