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


	//echo $d1[0]."##".$d2[0];

	if (strpos($d1[0], '12.') !== false) {
		$d1[0]=str_replace('12.', '0.', $d1[0]);
	}
	if (strpos($d2[0], '12.') !== false) {
		$d2[0]=str_replace('12.', '0.', $d2[0]);
	}


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
		//echo $fTime."-".$tTime."=".$diff."<br>"; exit;

		$nrows2a=0;
		$query2a = "SELECT calender_id FROM too_calender WHERE calender_date='$calender_date' AND from_time='$from_time' AND to_time='$to_time'";
		//echo $query2a;  exit;
		$statement2a=$mysqli->prepare($query2a);
		$statement2a->execute();
		$statement2a->store_result();
		$statement2a->bind_result($cd);
		$nrows2a=$statement2a->num_rows();

		if($nrows2a==0) {
			$query4 = "INSERT INTO too_calender (user_id, calender_date, from_time, to_time, total_hrs, created_on, status) VALUES(?,?,?,?,?,now(),'A')";
			$statement4= $mysqli->prepare($query4);
			//echo "INSERT INTO too_calender (user_id, calender_date, from_time, to_time, total_hrs, created_on, status) VALUES( '$user_id', '$calender_date', '$from_time', '$to_time', '$total_hrs', now(),'A')";exit;
			$statement4->bind_param('isssi', $user_id, $calender_date, $from_time, $to_time, $total_hrs);
			$statement4->execute();
			$cID=$statement4->insert_id;
			header("location:calenderInfo.php?cal=eve");
			exit;
		} else {
			$cal_err="Y";
		}
	}
}

include("header.php"); 
?>

<h3 class="">
	My Calender Add
	<a class="btn submitBk pull-right" href="calenderInfoView.php">&raquo; Back</a>
</h3>
<div class="gap30"></div>

<form name="calenderInfo" id="calenderInfo" method="post">

	<?php if($cal_err=="Y") { ?>
	<div class="col-sm-9 col-sm-offset-3">
		<span class="errors">Date & Time Already Scheduled</span>
	</div>
	<div class="gap10"></div>
	<?php } ?>


	<div class="form-group">
		<label class="col-sm-3 text-right">Date <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			<input type="text" name="calender_date" id="calender_date" class="form-control dateDefault1" placeholder="Date">
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
			<input type="text" name="from_time" id="from_time" class="form-control timepicker1" placeholder="">
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
			<input type="text" name="to_time" id="to_time" class="form-control timepicker1" placeholder="" onkeyUP="time_diff();">
			</div>
			<div class="gap1"></div>
			<span for="to_time" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap5"></div>

	<div class="col-sm-9 col-sm-push-3">
		<input type="submit" name="calen_submit" class="btn submitM" value="Add"> &nbsp;
	<!--	<button type="reset" class="btn submitM">Clear</button>	-->
	</div>
	<div class="gap20"></div>

	<div class="table-responsive col-md-12">
		<table class="table table-bordered table-striped">
			<tbody><tr class="tr1">
				<td>S.No</td>
				<td>Date</td>
				<td>From Time</td>
				<td>To Time</td>
				<td>Hours</td>
				<td>Action</td>
			</tr>
			<?php
				$query2 = "SELECT calender_id, institution_project_id, user_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date, from_time, to_time, total_hrs, DATE_FORMAT(created_on, '%d/%m/%Y') as created_on, status FROM too_calender WHERE calender_id!='' AND user_id='$user_id'";
				//echo $query2;
				$statement2=$mysqli->prepare($query2);
				$statement2->execute();
				$statement2->store_result();
				$statement2->bind_result($cId, $institution_project_id, $user_id, $calender_date, $from_time, $to_time, $total_hrs, $created_on, $status);
				
				if($statement2->num_rows() > 0)
				{ $i=0;
				while($statement2->fetch()) {$i++;

				$query3 = "SELECT project_id FROM institution_project WHERE institution_project_id='$institution_project_id'";
				//echo $query3;
				$statement3=$mysqli->prepare($query3);
				$statement3->execute();
				$statement3->store_result();
				$statement3->bind_result($project_id);
				$statement3->fetch();

				$query4 = "SELECT name FROM too_projects WHERE proj_id='$project_id'";
				//echo $query4;
				$statement4=$mysqli->prepare($query4);
				$statement4->execute();
				$statement4->store_result();
				$statement4->bind_result($project_name);
				$statement4->fetch();

			?>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $calender_date; ?></td>
				<td><?php echo $from_time; ?></td>
				<td><?php echo $to_time; ?></td>
				<td align="center"><?php echo $total_hrs; ?></td>
				<td align="center">
					<?php if($status=='A'){ ?>
						<a href="edit_calender.php?cID=<?php echo $cId; ?>"><i class="fa fa-pencil edit"></i></a> &nbsp;
						<!-- <a href="" class="delete"><i class="fa fa-trash trash" onclick="confirmDelete();"></i></a> -->
						<span style="cursor: pointer;"><i class="fa fa-trash trash" onclick="confirmDelete(<?php echo $cId; ?>);"></i></span>
					<?php }else{ echo "<a href='javascript:void(0);' data-toggle='tooltip' data-placement='left' title='".$project_name."-".$institution_project_id."'>Blocked</a>"; } ?>
				</td>
			</tr>
			<?php } }else{ ?>
				<tr>
					<td colspan="5" style="text-align:center;">There no records found</td>	
				</tr>
			<?php } ?>
			
		</tbody></table>
		<div class="gap30"></div>
		<?php 
			$queryH = "SELECT sum(total_hrs) as aaa FROM too_calender WHERE status='A' AND calender_id!='' AND user_id='$user_id'";
			//echo $queryH;
			$statementH=$mysqli->prepare($queryH);
			$statementH->execute();
			$statementH->store_result();
			$statementH->bind_result($aaa);
			$statementH->fetch();
		?>
		<h4 class="">Available Scheduled Hours: <?php echo $aaa." Hrs"; ?></h4>
		
	</div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>

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

function confirmDelete(valId){

	var cId = valId;

	var msg='';
	 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	 if (agree) {
		 $.ajax({
			type: "POST",
			url: "del_calender.php",
			data: {cId:cId},
			success: function (result) { //alert(result);
					//form.submit();
					window.location.href = "calenderInfo.php";
					//$('#invalid_cred').html("Invalid OTP");
			}
		});
	  return true;
	 } else {
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
