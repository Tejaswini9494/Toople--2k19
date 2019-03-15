<?php
$page="calenderInfo";
$title="My Calender Info";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];

if(isset($calen_submit)) {

	$calender_date=sysConvert($calender_date);
	//echo $project_id."#".$name."#".$category."#".$proj_created_by."#".$proj_status."#".$creation_date."#".$termination_date."#".$status;
	//exit;

	$d1=  explode(' ',str_replace(":",".",$from_time));
	$d2=  explode(' ',str_replace(":",".",$to_time));

	if($d1[1]=='PM') {
		$fTime=$d1[0]+12;
	} else {
		$fTime=$d1[0];
	}

	if($d2[1]=='PM') {
		$tTime=$d2[0]+12;
	} else {
		$tTime=$d2[0];
	}

	if($tTime > $fTime) {
		$diff=$tTime-$fTime;
		$total_hrs=$diff;
		//echo $diff."<br>";

		$query4 = "UPDATE too_calender SET calender_date='$calender_date', from_time='$from_time', to_time='$to_time', total_hrs='$total_hrs' WHERE calender_id='$cID'";
		$statement4= $mysqli->prepare($query4);
		//echo "UPDATE too_calender SET calender_date='$calender_date', from_time='$from_time', to_time='$to_time', total_hrs='$total_hrs' WHERE calender_id='$cID')";exit;
		$statement4->execute();

		header("location:calenderInfoView.php");
		exit;
	}
}

	$query2 = "SELECT calender_id, user_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date, from_time, to_time, DATE_FORMAT(created_on, '%m/%d/%Y') as created_on, status FROM too_calender WHERE calender_id='$cID'";
	//echo $query2;
	$statement2=$mysqli->prepare($query2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($cId,$user_id, $calender_date, $from_time, $to_time, $created_on, $status);
	$statement2->num_rows();
	$statement2->fetch();

include("header.php"); 
?>

<h3 class="">My Calender Info Edit
	<a class="btn submitBk pull-right" href="calenderInfoView.php">&raquo; Back</a></h3>
<div class="gap30"></div>

<form name="calenderInfo" id="calenderInfo" method="post">

	<div class="form-group">
		<label class="col-sm-3 text-right">Date <input type="hidden" readonly id="cId" name="cId" value="<?php echo $cID; ?>"><span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			<input type="text" name="calender_date" id="calender_date" class="form-control dateDefault" value="<?php echo $calender_date; ?>" placeholder="Date">
			</div>
			<div class="gap1"></div>
			<span for="calender_date" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">From Time <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group bootstrap-timepicker timepicker">
			<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
			<input type="text" name="from_time" id="from_time" class="form-control timepicker1" value="<?php echo $from_time; ?>" placeholder="">
			</div>
			<div class="gap1"></div>
			<span for="from_time" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">To Time <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group bootstrap-timepicker timepicker">
			<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
			<input type="text" name="to_time" id="to_time" class="form-control timepicker1" value="<?php echo $to_time; ?>" placeholder="" onkeyUP="time_diff();">
			</div>
			<div class="gap1"></div>
			<span for="to_time" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap5"></div>

	<div class="col-sm-9 col-sm-push-3">
		<input type="submit" name="calen_submit" class="btn submitM" value="Update"> &nbsp;
	<!--	<button type="reset" class="btn submitM">Clear</button>	-->
	</div>
	<div class="gap20"></div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
time_diff();
function time_diff(){

	var from_time = $('#from_time').val();
	var to_time = $('#to_time').val();

	var fromt = from_time.split(' ');
	var tot = to_time.split(' ');

	var difftime = tot[0].replace(':','.') - fromt[0].replace(':','.'); //diff in milliseconds
	difftime = Math.abs(difftime);
	//alert(difftime);
	if(difftime<1 && (tot[1]==fromt[1]) ){
		alert('Calender schedule must be minimum 1 hour of time');
		$('#to_time').focus();
		return false;
	}
}

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#calenderInfo").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
						calender_date: {
							required: true,
						},

						to_time: {
							required: true,				
						},

						from_time: {
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
