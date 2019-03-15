<?php
$page="myInternsView";
$title="My Interns View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];


if(isset($approve_submit)) {


	$query6 = "UPDATE too_intern_applied SET comments=?, status=? WHERE intern_applied_id='$approve_submit'";
	//echo $query6;
	//exit;
	$statement6= $mysqli->prepare($query6);
	$statement6->bind_param('ss', $comments, $intern_status);
	$statement6->execute();
}

if(isset($deliver_submit)) {

	$deadline=sysConvert($deadline);
	if($deliver_submit=='') {
		$query2 = "INSERT INTO  too_intern_delivers (intern_applied_id, weekno, intern_delivers, deadline, duration_weeks, percent_complete, created_by, added_date, status) VALUES(?,?,?,?,?,?,?, now(), ?)";
		$statement2= $mysqli->prepare($query2);
		$statement2->bind_param('ssssssss', $insaid, $weekno, $intern_delivers, $deadline, $duration_weeks, $percent_complete, $userid, $deliver_status);
		$statement2->execute();
	} else {
		$query5 = "UPDATE too_intern_delivers SET weekno=?, intern_delivers=?, deadline=?, duration_weeks=?, percent_complete=?, status=? WHERE intern_delivers_id=?";
		//echo $query5;
		//exit;
		$statement5= $mysqli->prepare($query5);
		$statement5->bind_param('ssssssi', $weekno, $intern_delivers, $deadline, $duration_weeks, $percent_complete, $deliver_status, $deliver_submit);
		$statement5->execute();
	}

	$deliver_active="Y";
	//header("location:myInternsView.php");
	//exit;
}

if(isset($edit_submit)) {

	//echo $edit_submit;
	//exit;
	$query4 = "SELECT intern_delivers_id, weekno, intern_delivers, deadline, duration_weeks, percent_complete, status FROM  too_intern_delivers  WHERE intern_delivers_id='$edit_submit'";
	//echo $query3;
	$statement4=$mysqli->prepare($query4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($intern_delivers_id1, $weekno1, $intern_delivers1, $deadline, $duration_weeks1, $percent_complete1, $deliver_status1);
	$statement4->fetch();

	$deadline1=sysDBDateConvert1($deadline);

	$deliver_active="Y";
	//header("location:myInternsView.php");
	//exit;
if($percent_complete!='')
{
$percent_complete1=numbToDesi($percent_complete);
} 

}

if(isset($delete_submit)) {

	//echo $delete_submit;
	//exit;
	$mysqli->query("DELETE FROM too_intern_delivers WHERE intern_delivers_id='$delete_submit' ");
	$deliver_active="Y";
	//header("location:myInternsView.php");
	//exit;
}

$query1 = "SELECT user_id, review, comments, status FROM  too_intern_applied  WHERE intern_applied_id=$insaid";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id, $review, $comments, $intern_status);
$statement1->fetch();


$query3 = "SELECT intern_delivers_id, intern_applied_id, weekno, intern_delivers, deadline, duration_weeks, percent_complete, added_date, status FROM  too_intern_delivers  WHERE intern_delivers_id!='' AND intern_applied_id=$insaid ORDER BY intern_delivers_id DESC";
//echo $query3;
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($intern_delivers_id, $intern_applied_id, $weekno, $intern_delivers, $deadline, $duration_weeks, $percent_complete, $added_date, $status);


include("header.php"); ?>

<h3 class="">My Interns View</h3>
<div class="gap30"></div>

<ul class="nav nav-tabs">
	<li  id="sdr1" class="<?php if($deliver_active!='Y') { echo "active"; } ?>"><a data-toggle="tab" href="#ipro1">Student Info</a></li>
	<li id="sdr2" class="<?php if($deliver_active=='Y') { echo "active"; } ?>"><a data-toggle="tab" href="#ipro2">Deliverables</a></li>
	<li id="sdr3"><a data-toggle="tab" href="#ipro3">Review</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="ipro1" class="tab-pane fade <?php if($deliver_active!='Y') { echo "in active"; } ?>">

		<?php include("in_personal_info.php"); ?>
		<div class="gap20"></div>

	<form id="form_approve" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 text-right">Status <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<select class="form-control" id="intern_status" name="intern_status">
					<option value="">Select</option>
					<option value="A" <?php if($intern_status=='A') { echo "selected"; } ?>>Approve</option>
					<option value="D" <?php if($intern_status=='D') { echo "selected"; } ?>>Reject</option>
				</select>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="intern_status"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Comments <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<textarea class="form-control tal100" id="comments" name="comments"><?php echo $comments; ?></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="comments"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="col-sm-9 col-sm-push-3">
			<button type="submit" class="btn submitM" id="approve_submit" name="approve_submit" value="<?php echo $insaid; ?>">Save</button>
			<a class="btn submitM" href="#ipro2" data-toggle="tab" aria-expanded="true" onclick="proceed_func(2)">Proceed</a>
		</div>
		<div class="gap10"></div>
	</form>
	</div>

	<!---------- 2 --------->
	<div id="ipro2" class="tab-pane fade <?php if($deliver_active=='Y') { echo "in active"; } ?>">
		<div class="gap20"></div>
		<h4>Deliverables</h4>
		<div class="gap20"></div>
	<form id="form_deliver" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 text-right">Week Number <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" placeholder="" class="form-control" id="weekno" name="weekno" value="<?php echo $weekno1; ?>">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="weekno"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Deliverable <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
				<textarea class="form-control tal100" id="intern_delivers" name="intern_delivers"><?php echo $intern_delivers1; ?></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="intern_delivers"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Deadline <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" placeholder="" class="form-control" id="deadline" name="deadline" value="<?php echo $deadline1; ?>">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="deadline"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Duration - Number Of Weeks <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" placeholder="" class="form-control" id="duration_weeks" name="duration_weeks" value="<?php echo $duration_weeks1; ?>">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="duration_weeks"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">% of Completion <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" placeholder="" class="form-control" id="percent_complete" name="percent_complete" value="<?php echo $percent_complete1; ?>">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="percent_complete"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Status <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-tag"></i></span>
				<select class="form-control" id="deliver_status" name="deliver_status">
					<option value="">Select</option>
					<option value="P" <?php if($deliver_status1=='' || $deliver_status1=='P') { echo "selected"; } ?>>Pending</option>
					<option value="D" <?php if($deliver_status1=='D') { echo "selected"; } ?>>Delivered</option>
				</select>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="deliver_status"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="col-sm-9 col-sm-push-3">
			<button type="submit" class="btn submitM" id="deliver_submit" name="deliver_submit" value="<?php echo $intern_delivers_id1; ?>">Save</button>
			<a class="btn submitM" href="#ipro3" data-toggle="tab" aria-expanded="true" onclick="proceed_func(3)">Proceed</a>
		</div>
	</form>
		<div class="gap30"></div>
	<!-------------- -------------->
	<form id="form_deliver1" method="POST" enctype="multipart/form-data">
		<div class="table-responsive">
		<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
		  <thead>
		    <tr class="tr1">
		      <td width="20" align="center">#</td>
		      <td align="left">Date</td>
		      <td align="left">Week Number</td>
		      <td align="left" width="400">Deliverable</td>
		      <td align="left">Status</td>
		      <td align="left">Deadline</td>
		      <td align="left">Duration - Number Of Weeks</td>
		      <td align="left">% of Completion</td>
		      <td align="left">Action</td>
		      </tr>
		  </thead>
		<?php $i=1; while($statement3->fetch()) {
			$added_date=sysDBDateConvert($added_date);
			$deadline=sysDBDateConvert($deadline);
			if($status=="P") {
				$statusText="Pending";
			} elseif($status=="D") {
				$statusText="Delivered";
			}
		?>
		    <tr class="tr">
		      <td align="center"><?php echo $i; ?></td>
		      <td class="td_txt"><?php echo $added_date; ?></td>
		      <td class="td_txt"><?php echo $weekno; ?></td>
		      <td class="td_txt"><?php echo $intern_delivers; ?></td>
		      <td class="td_txt"><?php echo $statusText; ?></td>
		      <td class="td_txt"><?php echo $deadline; ?></td>
		      <td class="td_txt"><?php echo $duration_weeks; ?></td>
		      <td class="td_txt"><?php echo numbToDesi($percent_complete); ?> %</td>
		      <td align="center">
			<button type="submit" id="edit_submit" name="edit_submit" class="btn edit" value="<?php echo $intern_delivers_id; ?>"><i class="fa fa-pencil"></i></button> &nbsp;
			<button type="submit" id="delete_submit" class="delete_submit" name="delete_submit" value="<?php echo $intern_delivers_id; ?>"><i class="fa fa-trash"></i></button>
		      </td>
		    </tr>
		<?php $i++; } ?>
		</table>
		</div>
	</form>

		<div class="gap20"></div>
	</div>

	<!---------- 3 --------->
	<div id="ipro3" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Review</h4>
		<div class="gap20"></div>

		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Review</label>
			<div class="col-md-5 col-sm-6 text-bold"><?php echo $review; ?></div>
			<div class="gap1"></div>
		</div>
		</div>
		<div class="gap20"></div>
	</div>
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
            $("#form_approve").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            intern_status: {
                                            required: true,
                                            }, 
					    comments:  {
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

<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_deliver").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

                                            weekno: {
                                            required: true,
					    numbersrest: true,
                                            }, 
					    intern_delivers:  {
                                            required: true,
					    },
					    deadline:  {
                                            required: true,
					    },
					    duration_weeks: {
					    required: true,
					    numbersrest: true,
					    },
					    percent_complete: {
					    required: true,
					    decimalnum: true,
					    max: 100,
					    },
					    deliver_status: {
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
<script>

$(document).ready(function()
{
$('.delete_submit').click(function() {
 var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
});

});
</script>
<script>
$(document).ready(function()
{
$("#deadline").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat: 'mm/dd/yy',
	minDate: "+0 day"	
	
});
});
</script>
<script>
function proceed_func(val1) {
        $('#sdr1').removeClass('active');
        $('#sdr2').removeClass('active');
        $('#sdr3').removeClass('active');
        $('#sdr'+val1).addClass('active');
}
</script>
