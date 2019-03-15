<?php
$page="recuritmentEdit.php";
$title="Recuritment Edit";
$ses="no";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
//$user_id="2";

if(isset($recruitment_edit_submit)) {
	
	$eligibilityprogram=implode(",",$eligibility_program);
	$eligibilityyearofcompletion=implode(",",$eligibility_year_of_completion);
	$recruitmentprogram=implode(",",$recruitment_program);
	//$recruitmentyearofcompletion=implode(",",$recruitment_year_of_completion);

	$sql_up="UPDATE recruitment_details SET company=?,position=?,eligibility_program=?,eligibility_year_of_completion=?,eligibility_percentage_achieved=?
,eligibility_gender=?,recruitment_program=?,certificate=?,job_location=?,hiring_process=? WHERE recruitment_id='$id'";
	$sql_update=$mysqli->prepare($sql_up);
	$sql_update->bind_param("ssssssssss",$company,$position,$eligibilityprogram,$eligibilityyearofcompletion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitmentprogram,$certificate,$job_location,$hiring_process);
	$sql_update->execute();
	//exit();
	header("location:recuritmentPost.php");

}
include("header.php");

	$sql_recedit = "SELECT company,position,eligibility_program,eligibility_year_of_completion,eligibility_percentage_achieved
,eligibility_gender,recruitment_program,certificate,job_location,hiring_process FROM recruitment_details WHERE recruitment_id='$id'";
	//echo $sql_recedit;
	$sql_rec_edit= $mysqli->prepare($sql_recedit);  
	$sql_rec_edit->execute();
	$sql_rec_edit->store_result();
	$sql_rec_edit->bind_result($company,$position,$eligibility_program,$eligibility_year_of_completion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitment_program,$certificate,$job_location,$hiring_process);
	$sql_rec_edit->fetch();


	$eligible_pgm=explode(",",$eligibility_program);
	//print_r($eligible_pgm);echo "<br>";
	$eligible_yoc=explode(",",$eligibility_year_of_completion);
	//print_r($eligible_yoc);echo "<br>";
	$rec_pgm=explode(",",$recruitment_program);
	//print_r($rec_pgm);echo "<br>";
	$rec_yoc=explode(",",$recruitment_year_of_completion);
	//print_r($rec_yoc);echo "<br>";	


?>
<h3><a href="Javascript:history.back()" class="btn btn-primary pull-right">&raquo; Back</a>Recuritment Edit</h3>
<div class="gap30"></div>
<form id="recruitmentedit" method="post">

	<div class="form-group">
		<label class="col-sm-3 text-right">Company <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-building"></i></span>
			<input type="text" name="company" id="company" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" class="form-control" maxlength="50" value="<?php echo $company;?>">
			</div>
			<div class="gap1"></div>
			<span for="company" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Position <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
			<input type="text" name="position" id="position" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" class="form-control" maxlength="50" value="<?php echo $position;?>">
			</div>
			<div class="gap1"></div>
			<span for="position" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

		<h4>Eligibility Criteria</h4>
		<div class="gap15"></div>
		<div class="well">
			<div class="col-md-3 col-sm-6">
				<label class="">Degree</label>
				<div class="gap5"></div>
				<select id="eligibility_program" name="eligibility_program[]" class="form-control" multiple>
					<option value="">Select</option>
					<?php 
					$sql1 = "SELECT category_id,category_for,category_name FROM master_category where category_for=2";
					$statement1=$mysqli->prepare($sql1);	
					$statement1->execute();
					$statement1->store_result();
					$statement1->bind_result($category_id,$category_for, $category_name);
					while($statement1->fetch())
					{ ?>
						<option value="<?php echo $category_id;?>" <?php foreach($eligible_pgm as $val) if($category_id==$val) echo "selected";?>><?php echo $category_name;?></option>
					<?php } ?>
				</select>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-md-3 col-sm-6">
				<label>Year of Completion</label>
				<div class="gap5"></div>
				<select id="eligibility_year_of_completion" name="eligibility_year_of_completion[]" class="form-control" multiple>
				<?php years($eligibility_year_of_completion); ?>
				</select>
			</div>
			<div class="gap15 yes800"></div>

			<div class="col-md-3 col-sm-6">
				<label>Minimum Required %</label>
				<div class="gap5"></div>
				<input type="text" name="eligibility_percentage_achieved" id="eligibility_percentage_achieved" class="form-control" value="<?php echo $eligibility_percentage_achieved;?>" maxlength="10">
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-md-3 col-sm-6">
				<label>Gender</label>
				<div class="gap5"></div>
				<div class="form-control">
					<label class="col-xs-6"><input type="radio" value="m" name="eligibility_gender" id="eligibility_gender" <?php if($eligibility_gender=='m') echo "checked";?>> Male</label>
					<label class="col-xs-6 nopadL"><input type="radio" value="f" name="eligibility_gender" id="eligibility_gender" <?php if($eligibility_gender=='f') echo "checked";?>> Female</label>
				</div>
				<span class="errors" for="eligibility_gender"></span>
			</div>
		<div class="gap15"></div>

		</div>
		<div class="gap15"></div>
		<h4>Requirements</h4>
		<div class="gap15"></div>
		<div class="well">
			<div class="col-sm-6">
				<label class="">Technical Area</label>
				<div class="gap5"></div>
				<select id="recruitment_program" name="recruitment_program[]" class="form-control" multiple>
					<option value="">Select</option>
					<?php 
					$sql3 = "SELECT category_id,category_for,category_name FROM master_category where category_for=9";
					$statement3=$mysqli->prepare($sql3);	
					$statement3->execute();
					$statement3->store_result();
					$statement3->bind_result($category_id2,$category_for2, $category_name2);
					while($statement3->fetch())
					{ ?>
						<option value="<?php echo $category_id2;?>" <?php foreach($rec_pgm as $val2) if($category_id2==$val2) echo "selected";?>><?php echo $category_name2;?></option>
					<?php } ?>
				</select>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-sm-6">
				<label>Certification</label>
				<div class="gap5"></div>
				<input type="text" name="certificate" id="certificate" class="form-control" value="<?php echo $certificate;?>">
			</div>
			<div class="gap15"></div>

		</div>
		<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Job Location <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
			<input type="text" name="job_location" id="job_location" class="form-control" maxlength="100" value="<?php echo $job_location;?>">
			</div>
			<div class="gap1"></div>
			<span for="job_location" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Hiring Process <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-hourglass-1"></i></span>
			<input type="text" name="hiring_process" id="hiring_process" class="form-control" maxlength="100" value="<?php echo $hiring_process;?>">
			</div>
			<div class="gap1"></div>
			<span for="hiring_process" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">
	<input type="submit" class="btn submitM" name="recruitment_edit_submit" value="Submit"> &nbsp;
<input type="button" class="btn submitM" name="reset" id="reset" value="Clear" onclick="empty_form('reset')"
> &nbsp;
	</div>
</form>

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
            $("#recruitmentedit").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            company: {
                                            required: true,
					    //lettersonly:true,
					    minlength:3,
					    maxlength:50,
                                            },
                                            position: {
                                            required: true,
					    //firstChar: true,
					    //lettersonly:true,
					    minlength:3,
					    maxlength:50,						
                                            },
                                            eligibility_program: {
                                            required: true,	
					    },
                                            eligibility_year_of_completion: {
                                            required: true,
                                            },
					    eligibility_percentage_achieved: {
					    required:true,
                                            numbersrest: true,
					    },
					    eligibility_gender:  {
                                            required:true,
					    },
                                            recruitment_program: {
                                            required: true,
					    
                                            },
					    recruitment_year_of_completion: {
                                            required: true,
                                            },
                                            job_location: {
                                            required: true,
					   // lettersonly:true,
					    minlength:3,
					    maxlength:100,				
                                            },
					    hiring_process: {
                                            required: true,
					    minlength:3,
					    maxlength:100,
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
function empty_form(val1){
        $("#"+val1).closest('#recruitmentedit').find("input[type=text], select,input[type=radio], textarea").val("");
	
}
</script>
