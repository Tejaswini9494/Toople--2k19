<?php
$page="internshipAdd";
$title="Internship Add";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];

if(isset($ins_submit)) {

	if($insid!='') {
		$tsdate=sysConvert2($tsdate);
		$tedate=sysConvert2($tedate);
		$doi=sysConvert2($doi);
		$query3 = "UPDATE too_internship SET category=?, ins_title=?, company=?, job=?, ecprogram=?, ecyoc=?, ecpercent=?, ecgender=?, compensation=?, techarea=?, certificate=?, tsdate=?, tedate=?, joblocation=?, worktype=?, hireprocess=?, doi=?, created_by=? WHERE internship_id=?";
		$statement3= $mysqli->prepare($query3);
		$statement3->bind_param('sssssssssssssssssii', $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $userid, $insid);
		$statement3->execute();

	} else {
		$status="SFA";
		$tsdate=sysConvert2($tsdate);
		$tedate=sysConvert2($tedate);
		$doi=sysConvert2($doi);
		$query2 = "INSERT INTO  too_internship (category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, created_by, added_date, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, now(), ?)";
		$statement2= $mysqli->prepare($query2);
		$statement2->bind_param('sssssssssssssssssis', $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $userid, $status);
		$statement2->execute();
	}

	header("location:internshipPost.php");
	exit;

}

if($insid!='') { 
	$sql1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id=$insid";
	$statement1=$mysqli->prepare($sql1);
	$statement1->execute();
	$statement1->store_result();
	$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);
	$statement1->fetch();

	$ts_date=sysDBDateConvert($tsdate);
	$te_date=sysDBDateConvert($tedate);
	$doi=sysDBDateConvert($doi);

if($ecpercent!='')
{
$ecpercent1=numbToDesi($ecpercent);
} 

}

$sql4 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE category_id=26";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id, $category_id, $subcategory_name);

$sql5 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE category_id=27";
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($subcategory_id1, $category_id1, $subcategory_name1);

/*
$sql6 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE category_id=28";
$statement6=$mysqli->prepare($sql6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($subcategory_id2, $category_id2, $subcategory_name2);

$sql7 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE category_id=28";
$statement7=$mysqli->prepare($sql7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($subcategory_id3, $category_id3, $subcategory_name3);
*/

include("header.php"); ?>
<h3 class="">Internship <?php if($insid!='') { echo "Edit"; } else { echo "Add"; } ?>
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>

<div class="gap30"></div>
<form id="form_ins" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label class="col-sm-3 text-right">Internship Category <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cube"></i></span>
			<select id="category" name="category" class="form-control">
				<option value="" >Select</option>
			<?php while($statement4->fetch()) { ?>
				<option value="<?php echo $subcategory_id; ?>" <?php if($subcategory_id==$category) { echo "selected"; } ?>><?php echo $subcategory_name; ?></option>
			<?php } ?>
			</select>
			</div>
			<div class="gap1"></div>
			<span for="category" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Internship Title <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-terminal"></i></span>
			<input type="text" name="ins_title" id="ins_title" class="form-control" value="<?php echo $ins_title; ?>">
			</div>
			<div class="gap1"></div>
			<span for="ins_title" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Company <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-building"></i></span>
			<input type="text" name="company" id="company" class="form-control" value="<?php echo $company; ?>">
			</div>
			<div class="gap1"></div>
			<span for="company" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Job Role <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
			<select id="job" name="job" class="form-control">
				<option value="" >Select</option>
				<?php echo categoryForProgram(20,$job); ?>
			</select>
			</div>
			<div class="gap1"></div>
			<span for="job" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap20"></div>


		<h4>Eligibility Criteria</h4>
		<div class="gap15"></div>
		<div class="well">
			<div class="col-md-3">
			<label class="">Program</label>
			<div class="gap5"></div>
			<select id="ecprogram" name="ecprogram" class="form-control">
				<option value="" >Select</option>
				<?php echo categoryForProgram(2,$ecprogram); ?>
			</select>
			</div>
			<div class="col-md-3">
			<label>Year of Completion</label>
			<div class="gap5"></div>
			<select id="ecyoc" name="ecyoc" class="form-control">
				<option value="" >Select</option>
				<?php years($ecyoc); ?>
			</select>
			</div>
			<div class="col-md-3">
			<label>Minimum % Required</label>
			<div class="gap5"></div>
			<input type="text" name="ecpercent" id="ecpercent" class="form-control" value="<?php echo $ecpercent1; ?>">
			</div>
			<div class="col-md-3">
			<label>Gender</label>
			<div class="gap5"></div>
			<div class="form-control nopadL">
				<label class="col-md-6"><input type="radio" name="ecgender" id="ecgender" value="Male" <?php if($ecgender=="Male") { echo "checked"; } ?>> Male</label>
				<label class="col-md-6"><input type="radio" name="ecgender" id="ecgender" value="Female" <?php if($ecgender=="Female") { echo "checked"; } ?>> Female</label>
			</div>
			</div>
			<span for="ecgender" class="errors"></span>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Compensation <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-random"></i></span>
			<input type="text" name="compensation" id="compensation" class="form-control" value="<?php echo $compensation; ?>">
			</div>
			<div class="gap1"></div>
			<span for="compensation" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap30"></div>


		<div class="well">
			<div class="col-md-6">
			<label class="">Technical Area</label>
			<div class="gap5"></div>
			<select id="techarea" name="techarea" class="form-control">
				<option value="" >Select</option>
				<?php echo categoryForProgram(9,$techarea); ?>
			</select>
			</div>
			<div class="col-md-6">
			<label>Certification</label>
			<div class="gap5"></div>
			<input type="text" name="certificate" id="certificate" class="form-control" value="<?php echo $certificate; ?>">
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap15"></div>


	<div class="form-group">
		<label class="col-sm-3 text-right">Tentative Start Date <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
			<input type="text" name="tsdate" id="tsdate" class="dateIcon form-control" value="<?php echo $ts_date; ?>"readonly>
			</div>
			<div class="gap1"></div>
			<span for="tsdate" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Tentative End Date <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
			<input type="text" name="tedate" id="tedate" class="dateIcon form-control" value="<?php echo $te_date; ?>"readonly>
			</div>
			<div class="gap1"></div>
			<span for="tedate" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Job Location <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
			<input type="text" name="joblocation" id="joblocation" class="form-control" value="<?php echo $joblocation; ?>">
			</div>
			<div class="gap1"></div>
			<span for="joblocation" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Work type <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
			<input type="text" name="worktype" id="worktype" class="form-control" value="<?php echo $worktype; ?>">
			</div>
			<div class="gap1"></div>
			<span for="worktype" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Hiring Process <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-hourglass-1"></i></span>
			<input type="text" name="hireprocess" id="hireprocess" class="form-control" value="<?php echo $hireprocess; ?>">
			</div>
			<div class="gap1"></div>
			<span for="hireprocess" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Date of Interview <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			<input type="text" name="doi" id="doi" class="form-control dateIcon dateDefault" value="<?php echo $doi; ?>">
			</div>
			<div class="gap1"></div>
			<span for="doi" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>


	<div class="col-sm-9 col-sm-push-3">
		<input id="ins_submit" name="ins_submit" class="btn submitM" type="submit" value="Submit"> &nbsp;
		<a href="internshipPost.php" class="btn submitM cancelBtn">Cancel</a>
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
            $("#form_ins").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            category: {
                                            required: true,
                                            },
                                            ins_title: {
                                            required: true,
                                            },
					    company: {
					    required: true,
					    },
					    job: {
					    required: true,
					    },
					    ecprogram: {
					    required: true,
					    },
					    ecyoc: {
					    required: true,
					    },
					    ecpercent: {
					    required: true,
					    decimalnum: true,
					    max: 100,
					    },
					    ecgender: {
					    required: true,
					    },
					    compensation: {
					    required: true,
					    },
					    tsdate: {
					    required: true,
					    },
					    tedate: {
					    required: true,
					    },
					    joblocation: {
                                            required: true,
                                            },
					    worktype: {
                                            required: true,
                                            },
					    hireprocess: {
                                            required: true,
                                            },
					    doi: {
					    required: true,
					    },
                                            

					                                             
               },


				//The error message Str here

           messages: {


					    ecpercent: {
                                            required: "Please enter % Obtained",
					    decimalnum: "Kindly Enter the Numbers and dot",
					    },

		
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
$(function() {
$("#tsdate").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#tedate").datepicker("option","minDate",selectedDate);
}	
});
$("#tedate").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#tsdate").datepicker("option","maxDate",selectedDate);
}	
});

});
</script>
