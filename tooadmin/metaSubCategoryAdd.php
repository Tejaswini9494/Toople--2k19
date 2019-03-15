<?php  
$page="metaSubCategoryAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_state))
{
$status='A';
$query="insert into master_subcategory( category_id , subcategory_name , status , added_date ) values(?,?,?,now())";
$statement=$mysqli->prepare($query);
$statement->bind_param('sss',$category_id,$subcategory_name,$status);
$statement->execute();
header("location:metaSubCategoryAdd.php");
}
include("header.php"); ?>

<h1> Settings  &raquo;  Meta  &raquo; Sub-Category &raquo; Create
<span class="back">
<a href="metaSubCategory.php">View</a>
</span></h1>


<form id="subCategory_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
 <tr>
      <td align="right"> Category for:<span class="red">*</span> </td>
      <td valign="top">
        <select name="category_for" id="category_for" class="boxM">
        <option value=""> Select </option>
	<?php categoryFor();?>
		</select>
		  </td>
    </tr>
    <tr>
      <td align="right"> Category:<span class="red">*</span> </td>
      <td valign="top">
        <select name="category_id" id="category_id" class="boxM">
        <option value=""> Select category </option>
 
		</select>
		  </td>
    </tr>
    <tr>
      <td align="right"> Sub-Category :<span class="red">*</span></td>
      <td valign="top"><input name="subcategory_name" id="subcategory_name" type="text" class="boxM" placeholder="Sub-Category" maxlength="100"/></td>
    </tr>	
	
   
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
      <a href="metaSubCategory.php" class="submitM">CANCEL</a></td>


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
            $("#subCategory_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					category_for: {
                                        required:true,
                                        },
                                        category_id: {
                                        required:true,

                                        },
                                        subcategory_name: {
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
$('#category_for').change(function()
{
var con=$('#category_for').val();
if(con=='')
{
$('#category_id').html('<option>Select Country First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "categoryajax.php",             
        data: {con},                 
        success: function(response){
        $('#category_id').html(response);
        }
    });
}
});
});
</script>
