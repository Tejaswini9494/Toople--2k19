<?php  
$page="metaCityEdit";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_city))
{
$query1s="UPDATE master_city SET country_id=?,state_id=? ,city_name=? where city_id=?";
$statement1s=$mysqli->prepare($query1s);
$statement1s->bind_param('iisi',$country_id,$state_id,$city_name,$id);
$statement1s->execute();
header("location:metaCity.php");
}

$query="select country_id,state_id,city_name from master_city where city_id=$id";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($country_id,$state_id,$city_name);
$statement->fetch();

include("header.php"); ?>

<h1>
<span class="back">
<a href="metaCity.php">View</a>
</span>
 Settings  &raquo;  Meta  &raquo;    City  &raquo;  Edit </h1>

<form id="city_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
    <tr>
      <td> Country : <span class="red">*</span></td>
      <td valign="top">

        <select name="country_id" id="country_id" class="boxM">
        <option value=""> Select </option>
        <?php countryId($country_id);?>
	
        </select>
        </td>
    </tr>
   
<tr>
      <td align="right"> State :<span class="red">*</span></td>
   <td valign="top">
     <select name="state_id" id="state_id" class="boxM">
        <option value=""> Select </option>
        <?php stateId($state_id);?>
        </select>
     </td>
    </tr>	
	
      <tr>
      <td align="right"> City :<span class="red">*</span></td>
      <td valign="top"><input name="city_name" id="city_name" value="<?php echo $city_name;  ?>" type="text" class="boxM" placeholder="State" maxlength="100"/></td>
    </tr>
   
   
    <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"><input type="submit" name="submit_city" value=" SAVE " class="submitM" /> &nbsp;
    <input type="reset" name="button2" id="button2" value=" CANCEL " class="submitM" /></td>
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
            $("#city_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {    
                                        country_id: {
                                        required:true,    
                                        },
					state_id: {
                                        required:true,    
                                        },		 
					city_name: {
                                        required:true,
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


