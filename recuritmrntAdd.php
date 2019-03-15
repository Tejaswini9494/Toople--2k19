<?php
$page="recuritmentAdd.php";
$title="Recuritment Add";
$ses="no";
 
include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);
session_start();
$user_id=$_SESSION["userid"];


if(isset($recruitment_submit)) {
	$eligibilityprogram=implode(",",$eligibility_program);
	$eligibilityyearofcompletion=implode(",",$eligibility_year_of_completion);
	$recruitmentprogram=implode(",",$recruitment_program);
	$recruitmentyearofcompletion=implode(",",$eligibility_year_of_completion);
	$status='SFA';
	$sql_recadd = "INSERT INTO recruitment_details(user_id,company,position,eligibility_program,eligibility_year_of_completion,eligibility_percentage_achieved
,eligibility_gender,recruitment_program,certificate,job_location,hiring_process,created_on,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,now(),?)";
	$sql_rec_add= $mysqli->prepare($sql_recadd);  
	$sql_rec_add->bind_param('isssssssssss',$user_id,$company,$position,$eligibilityprogram,$eligibilityyearofcompletion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitmentprogram,$certificate,$job_location,$hiring_process,$status);
	$sql_rec_add->execute();

header("location:recuritmentPost.php");

}

include("header.php");

?>
<h3><a href="Javascript:history.back()" class="btn btn-primary pull-right">&raquo; Back</a>Recuritment Add</h3>
<div class="gap30"></div>
<form id="recruitment" method="post">

	<div class="form-group">
		<label class="col-sm-3 text-right">Company <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-building"></i></span>
			<input type="text" name="company" id="company" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" class="form-control" maxlength="50">
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
			<input type="text" name="position" id="position" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" class="form-control" maxlength="50">
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
					
					<?php echo categoryForProgram(2); ?>
				</select>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-md-3 col-sm-6">
				<label>Year of Completion</label>
				<div class="gap5"></div>
				<select id="eligibility_year_of_completion" name="eligibility_year_of_completion[]" class="form-control" multiple>
				<?php years($ecyoc); ?>
				</select>
			</div>
			<div class="gap15 yes800"></div>

			<div class="col-md-3 col-sm-6">
				<label> Minimum Required % </label>
				<div class="gap5"></div>
				<input type="text" name="eligibility_percentage_achieved" id="eligibility_percentage_achieved" class="form-control" maxlength="10">
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-md-3 col-sm-6">
				<label>Gender</label>
				<div class="gap5"></div>
				
				<label class="col-md-3"><input type="radio" value="m" name="eligibility_gender" id="eligibility_gender"> Male</label>
				<label class="col-md-3"><input type="radio" value="f" name="eligibility_gender" id="eligibility_gender">  Female</label>
				<label class="col-md-3"><input type="radio" value="both" name="eligibility_gender" id="eligibility_gender">    Both</label>
			
				
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

					<?php echo categoryForProgram(9); ?>
				</select>
			</div>
			<div class="gap15 yes600"></div>

			<div class="col-sm-6">
				<label>Certification</label>
				<div class="gap5"></div>
				<input type="text" name="certificate" id="certificate" class="form-control" value="">
			</div>
			<div class="gap15"></div>
		</div>
		<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Job Location <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
			<input type="text" name="job_location" id="job_location" class="form-control" maxlength="100">
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
			<textarea name="hiring_process" id="hiring_process" class="form-control tal100"></textarea>
			</div>
			<div class="gap1"></div>
			<span for="hiring_process" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">
	<input type="submit" class="btn submitM" name="recruitment_submit" value="Submit"> &nbsp;
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
            $("#recruitment").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            company: {
                                            required: true,
					    //lettersonly4N:true,
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
					    certification: {
                                            required: true,
					    
                                            },
                                            job_location: {
                                            required: true,
					    //lettersonly4N:true,
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
        $("#"+val1).closest('#recruitment').find("input[type=text], select,input[type=radio], textarea").val("");
	
}
</script>
