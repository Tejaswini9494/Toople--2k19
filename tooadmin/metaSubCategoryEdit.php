<?php  
$page="metaSubCategoryEdit";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
if(isset($submit_state))
{
$query1s="UPDATE master_subcategory SET category_id=?,subcategory_name=? where subcategory_id=?";
$statement1s=$mysqli->prepare($query1s);
$statement1s->bind_param('isi',$category_id,$subcategory_name,$id);
$statement1s->execute();
header("location:metaSubCategory.php");
}

include("header.php"); 
extract($_REQUEST);
$query="select category_id,subcategory_name from master_subcategory where subcategory_id='".$id."'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($category_id,$subcategory_name);
$statement->fetch();

 $nab="select category_name from master_category where category_id='$category_id'";
	$statementt=$mysqli->prepare($nab);
$statementt->execute();
$statementt->store_result();
$statementt->bind_result($category_name);
$statementt->fetch();
?>

<h1> Settings  &raquo;  Meta  &raquo; Sub-Category &raquo; Edit
<span class="back">
<a href="metaSubCategory.php">View</a>
</span></h1>


<form id="subCategory_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
    <tr>
      <td align="right"> Category:<span class="red">*</span> </td>
      <td valign="top">
        <select name="category_id" id="category_id" class="boxM">
        <option value=""> Select </option>
	<?php categoryname($category_id);?>
		</select>
		  </td>
    </tr>
    <tr>
      <td align="right"> Sub-Category :<span class="red">*</span></td>
      <td valign="top"><input name="subcategory_name" id="subcategory_name" value="<?php echo $subcategory_name;  ?>" type="text" class="boxM" placeholder="Sub-Category" maxlength="100"/></td>
    </tr>	
	
   
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
      <a href="metaSubCategory.php" class="submitM">CANCEL</a></td>

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
            $("#subCategory_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					category: {
                                        required:true,
                                        },
                                        subCategory: {
                                        required:true,
                                        minlength:2,
                                        },
                                        subCategory_comments: {
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
