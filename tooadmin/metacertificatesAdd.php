<?php  
$page="metacertificatesAdd";
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
header("location:metacertificatesAdd.php");
}
include("header.php"); ?>

<h1> Settings  &raquo;  Meta  &raquo; Certificates &raquo; Create
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
				<input type="text" id="certificate_name" name="certificate_name" class="form-control" placeholder="" >
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
