<?php  
$page="metaCategoryAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_count))
{
$status='A';
$query="insert into master_category(category_for, category_name, status, added_date ) values(?,?,?,now())";
$statement=$mysqli->prepare($query);
$statement->bind_param('sss', $category_for, $category_name, $status);
$statement->execute();
header("location:metaCategoryAdd.php");
}
include("header.php"); ?>

<h1> Settings  &raquo;  Meta  &raquo;    Category  &raquo;  Add 
<span class="back">
<a href="metaCategory.php">View</a>
</span>
</h1>

<form method="post" id="category_valid" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
<tr>
 <td align="right"> Category for :<span class="red">*</span></td>
<td><select name="category_for" id="category_for" placeholder="Category_for" maxlength="100" class="boxM">
<option value=""> Select category for </option>
	<?php categoryFor();?>
</select></td>
     
</tr>
    <tr>
      <td align="right"> Category :<span class="red">*</span></td>
      <td><input type="text" name="category_name" id="category_name" placeholder="Category" maxlength="100" class="boxM"></td>
    </tr>

   	
    
<tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" type="submit" value="Submit" class="submit" />
      <a href="metaCategory.php" class="submitM">CANCEL</a></td>
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
            $("#category_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					category_for: {
                                        required:true,
                                       
                                        },
                                        category_name: {
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


