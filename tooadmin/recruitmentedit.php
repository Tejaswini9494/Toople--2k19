<?php
$page="recuritmentAdd.php";
$title="Recuritment Add";
$ses="no";
 
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);



if(isset($recruitment_submit)) {
	$eligibilityprogram=implode(",",$eligibility_program);
	$recruitmentprogram=implode(",",$recruitment_program);
	$eligibilityyearofcompletion=implode(",",$eligibility_year_of_completion);
	$status='A';
	$sql_recadd = "UPDATE recruitment_details SET company=?,position=?,eligibility_program=?,eligibility_year_of_completion=?,eligibility_percentage_achieved=?
,eligibility_gender=?,recruitment_program=?,certificate=?,job_location=?,hiring_process=? where recruitment_id=$pid";
	$sql_rec_add= $mysqli->prepare($sql_recadd);  
	$sql_rec_add->bind_param('ssssssssss',$company,$position,$eligibilityprogram,$eligibilityyearofcompletion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitmentprogram,$certificate,$job_location,$hiring_process);
	$sql_rec_add->execute();
	header("location:recruitment.php");

}

	$sql="SELECT company,position,eligibility_program,eligibility_year_of_completion,eligibility_percentage_achieved
,eligibility_gender,recruitment_program,certificate,job_location,hiring_process FROM recruitment_details WHERE recruitment_id='$pid'";
	//echo $sql;
	$statement_edit=$mysqli->prepare($sql);
	$statement_edit->execute();
	$statement_edit->store_result();
	$statement_edit->bind_result($company,$position,$eligibilityprogram,$eligibility_year_of_completion,$eligibility_percentage_achieved
,$eligibility_gender,$recruitmentprogram,$certificate,$job_location,$hiring_process);
	$statement_edit->fetch();


	$eligible_pgm=explode(",",$eligibilityprogram);
	//print_r($eligible_pgm);echo "<br>";
	$eligible_yoc=explode(",",$eligibility_year_of_completion);
	//print_r($eligible_yoc);echo "<br>";
	$rec_pgm=explode(",",$recruitmentprogram);
	//print_r($rec_pgm);echo "<br>";
	//$rec_yoc=explode(",",$recruitment_year_of_completion);
	//print_r($rec_yoc);echo "<br>";

include("header.php");

?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Recuritment Add</h3>
<div class="gap30"></div>
<form id="recruitment" method="post">

	<div class="form-group">
		<label class="col-sm-3 text-right">Company <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-building"></i></span>
			<input type="text" name="company" id="company" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);"  value="<?php echo $company;?>"class="form-control" maxlength="50">
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
			<input type="text" name="position" id="position" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" value="<?php echo $position;?>" class="form-control" maxlength="50">
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
			<div class="col-md-3">
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
			<div class="col-md-3">
			<label>Year of Completion</label>
			<div class="gap5"></div>
				<select id="eligibility_year_of_completion" name="eligibility_year_of_completion[]" class="form-control" multiple>
					<?php years($eligibility_year_of_completion); ?>
				</select>
			</div>
			<div class="col-md-3">
			<label>% Achieved</label>
			<div class="gap5"></div>
			<input type="text" name="eligibility_percentage_achieved" id="eligibility_percentage_achieved" value="<?php echo $eligibility_percentage_achieved;?>" class="form-control" maxlength="10">
			</div>
			<div class="col-md-3">
			<label>Gender</label>
			<div class="gap5"></div>
			<label class="col-md-4"><input type="radio" value="m" name="eligibility_gender" <?php if($eligibility_gender=='m') echo "checked"?> id="eligibility_gender"> Male</label>
			<label class="col-md-4"><input type="radio" value="f" name="eligibility_gender" <?php if($eligibility_gender=='f') echo "checked"?> id="eligibility_gender"> Female</label>
			
			</div>
			<span class="errors" for="eligibility_gender"></span>
		<div class="gap15"></div>

		</div>
		<div class="gap15"></div>
		<h4>Requirements</h4>
		<div class="gap15"></div>
		<div class="well">
			<div class="col-md-6">
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
			<div class="col-md-6">
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
			<input type="text" name="job_location" id="job_location" value="<?php echo $job_location;?>" class="form-control" maxlength="100">
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
			<textarea name="hiring_process" id="hiring_process" value="<?php echo $hiring_process;?>"  class="form-control tal100"><?php echo $hiring_process;?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="hiring_process" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">
	<input type="submit" class="btn btn-primary" name="recruitment_submit" value="Submit"> &nbsp;

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
					    recruitment_year_of_completion: {
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
</script>
