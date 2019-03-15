<?php  
$page="metaCityAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_city))
{
$status='A';
$query="insert into master_city( country_id ,state_id, city_name , status , added_date ) values(?,?,?,?,now())";
$statement=$mysqli->prepare($query);
$statement->bind_param('iiss',$country_id,$state_id,$city_name,$status);
$statement->execute();
header("location:metaCityAdd.php");
}
include("header.php"); ?>

<h1>
<span class="back">
<a href="metaCity.php">View</a>
</span>
 Settings  &raquo;  Meta  &raquo;    City  &raquo;  Create </h1>

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
      <td> State : <span class="red">*</span></td>

      <td valign="top">
        <select name="state_id" id="state_id" class="boxM">
	<option value=""> Select </option>
	
        </select>
      </td>
    </tr>
	<tr>
      <td> City : <span class="red">*</span></td>
      <td valign="top"><input name="city_name" type="text" class="boxM" id="city_name" placeholder="City"/></td>
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



<script>
$(document).ready(function()
{
$('#country_id').change(function()
{
var con=$('#country_id').val();
if(con=='')
{
$('#state_id').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#state_id').html(response);
        }
    });
}
});
});
</script>


