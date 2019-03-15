<?php  
$page="metaStateEdit";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
if(isset($submit_state))
{
$query1s="UPDATE master_state SET country_id=?,state_name=? where state_id=?";
$statement1s=$mysqli->prepare($query1s);
$statement1s->bind_param('isi',$country_id,$state_name,$id);
$statement1s->execute();
header("location:metaState.php");
}

include("header.php"); 
extract($_REQUEST);
$query="select country_id,state_name from master_state where state_id='".$id."'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($country_id,$state_name);
$statement->fetch();
?>
<h1>
<span class="back">
<a href="metaState.php">View</a>
</span>
 Settings  &raquo;  Meta  &raquo;    State  &raquo;  Edit </h1>


<form id="state_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
    <tr>
        <td align="right"> Country:<span class="red">*</span> </td>
      <td valign="top">
        <select name="country_id" id="country_id" class="boxM">
        <option value=""> SELECT </option>
	<?php countryId($country_id);?>
        </select>
		  </td>
    </tr>
    <tr>
      <td align="right"> State :<span class="red">*</span></td>
      <td valign="top"><input name="state_name" id="state_name" value="<?php echo $state_name;?>" type="text" class="boxM" placeholder="State" maxlength="100"/></td>
    </tr>	
	
   
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
      <input type="reset" name="sub" value=" CANCEL " class="submitM" /></td>

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
							 
					country_id: {
                                        required:true,
                                        },
                                        state_name: {
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


