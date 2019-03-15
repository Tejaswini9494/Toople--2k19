<?php
$page="contentTransaction";
//$tit="Add Cost";
include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);

if(isset($submitCost)) {

		$query_up = "UPDATE too_projects SET paid_amt=? WHERE proj_id='$proid'";
		echo "UPDATE too_projects SET paid_amt='$paid_amt' WHERE proj_id='$proid'";
		$statement_up= $mysqli->prepare($query_up); 
		$statement_up->bind_param('s',$paid_amt);
		$statement_up->execute();

		header("location:products.php");
		exit();
}

include("header.php"); 
$sqlP = "SELECT name,proj_created_by,paid_amt FROM too_projects WHERE proj_id='$proid'";
$statementP=$mysqli->prepare($sqlP);
$statementP->execute();
$statementP->store_result();
$statementP->bind_result($proj_name,$proj_created_by,$paid_amt1);
$statementP->fetch();

?>

<h3 class="">
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>


<div id="proId12" style="display:block;">
	<div class="tab-content">
		<!---------- 5 --------->
		<div id="spro5" class="tab-pane fade in active">
		<form id="form_project3" method="POST" enctype="multipart/form-data">
			<h4>Total Cost</h4>
			<div class="gap20"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Content Provider Name <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input type="text" name="content_name" id="content_name" class="form-control" value="<?php echo $proj_created_by;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="content_name" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Project Name <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input type="text" name="proj_name" id="proj_name" class="form-control" value="<?php echo $proj_name;?>" readonly>
					</div>
					<div class="gap1"></div>
					<span for="proj_name" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Amount to be Paid <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<input type="text" name="paid_amt" id="paid_amt" class="form-control" placeholder="" value="<?php echo numbtoDesi($paid_amt1);?>">
					</div>
					<div class="gap1"></div>
					<span for="paid_amt" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="col-sm-9 col-sm-push-3">	
				<input id="submitCost" name="submitCost" class="btn submitM" type="submit" value="Update">&nbsp;
				<a href="products.php" class="btn submitM cancelBtn">Cancel</a>
			<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
			</div>
			<div class="gap1"></div>
		</form>
		</div>

	</div>

</form>

<!--------------end--------------->
</div>


<div class="gap20"></div>
<?php include("footer.php"); ?>

<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_project3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            paid_amt: {
                                            required: true,			
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
