<?php  
$page="metacertificatesEdit";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
if(isset($submit_state))
{
$query1s="UPDATE master_subcategory SET category_id=?,subcategory_name=? where subcategory_id=?";
$statement1s=$mysqli->prepare($query1s);
$statement1s->bind_param('isi',$category_id,$subcategory_name,$id);
$statement1s->execute();
header("location:metacertificates.php");
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

<h1> Settings  &raquo;  Meta  &raquo; Certificates &raquo; Edit
<span class="back">
<a href="metacertificates.php">View</a>
</span></h1>

<div class="gap20"></div>
<form id="subCategory_valid" method="post" enctype="multipart/form-data">
  <div class="row">
	<div class="col-md-10">
		<div class="form-group">
			<label class="col-sm-5 text-right">Cerificate Name<span class="red">*</span></label>
			<div class="col-sm-7">
				<input type="text" id="certificate_name" name="certificate_name" class="form-control" placeholder="" value="<?php echo $certificate_name; ?>">
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-sm-5 text-right">Content<span class="red">*</span></label>
			<div class="col-sm-7">
				<textarea  id="content" name="content" class="form-control"></textarea>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="col-sm-7 pull-right">
			<input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
    			  <a href="metacertificates.php" class="submitM">CANCEL</a> &nbsp;
					
		</div>
	</div>
</div>
	<div class="gap15"></div>

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
