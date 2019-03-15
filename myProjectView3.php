<?php
$page="myProjectView3";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");
include("duration.php");
extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];
$user_type=$_SESSION["type"];


$duration_weeks11==0;
if(isset($deliver_submit)) {

	$deadline=sysConvert($deadline);
	if($deliver_submit=='') {
		$query6 = "INSERT INTO  too_project_delivers (institution_project_assign_id, weekno, project_delivers, deadline, duration_weeks, percent_complete, created_by, added_date, status) VALUES(?,?,?,?,?,?,?, now(), ?)";
		$statement6= $mysqli->prepare($query6);
		$statement6->bind_param('ssssssss', $ipaid, $weekno, $project_delivers, $deadline, $duration_weeks, $percent_complete, $userid, $deliver_status);
		$statement6->execute();
	} else {
		$query5 = "UPDATE too_project_delivers SET weekno=?, project_delivers=?, deadline=?, duration_weeks=?, percent_complete=?, status=? WHERE project_delivers_id=?";
		//echo $query5;
		//exit;
		$statement5= $mysqli->prepare($query5);
		$statement5->bind_param('ssssssi', $weekno, $project_delivers, $deadline, $duration_weeks, $percent_complete, $deliver_status, $deliver_submit);
		$statement5->execute();
	}
header("location:myProjectView3.php?ipaid=$ipaid");
}

if(isset($edit_submit)) {

	//echo $edit_submit;
	//exit;
	$query4 = "SELECT project_delivers_id, weekno, project_delivers, deadline, duration_weeks, percent_complete, status FROM  too_project_delivers  WHERE project_delivers_id=$edit_submit";
	//echo $query3;
	$statement4=$mysqli->prepare($query4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($project_delivers_id1, $weekno1, $project_delivers1, $deadline, $duration_weeks11, $percent_complete1, $deliver_status1);
	$statement4->fetch();

	$deadline1=sysDBDateConvert($deadline);

}

if(isset($delete_submit)) {

	//echo $delete_submit;
	//exit;
	$mysqli->query("DELETE FROM too_project_delivers WHERE project_delivers_id='$delete_submit' ");
}

$query3 = "SELECT project_delivers_id, weekno, project_delivers, deadline, duration_weeks, percent_complete, added_date, status FROM  too_project_delivers  WHERE project_delivers_id!='' AND institution_project_assign_id=$ipaid ORDER BY project_delivers_id DESC";
//echo $query3;
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($project_delivers_id, $weekno, $project_delivers, $deadline, $duration_weeks1, $percent_complete, $added_date, $status);

include("header.php"); ?>

<h3 class="">My Project View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<?php include("in_projView_menu.php"); ?>
<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4>Product Deliverables</h4>
		<div class="gap20"></div>
	<form id="form_deliver" method="POST" enctype="multipart/form-data" <?php if($user_type!='MEN') { ?>style="display:none;"<?php } ?>>
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
				<textarea class="form-control tal100" id="project_delivers" name="project_delivers"><?php echo $project_delivers1; ?></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="project_delivers"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Deadline <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" placeholder="" class="form-control dateDefault" id="deadline" name="deadline" value="<?php echo $deadline1; ?>">
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
				<!--<input type="text" placeholder="" class="form-control" id="duration_weeks" name="duration_weeks" value="<?php echo $duration_weeks1; ?>">-->
<select id="duration_weeks" name="duration_weeks" class="form-control">
	<option value="">select weeks</option>
	<?php echo duration($ipaid,$duration_weeks11); ?>
	</select>
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
			<button type="submit" class="btn submitM" id="deliver_submit" name="deliver_submit" value="<?php echo $project_delivers_id1; ?>">Submit</button>
		</div>
	</form>
		<div class="gap30"></div>
	<!-------------- -------------->
	<form id="form_deliver1" method="POST" enctype="multipart/form-data">
		<div class="table-responsive">
		<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
		  <thead>
		    <tr class="tr1">
		      <td align="center" width="20">#</td>
		      <td align="left">Date</td>
		      <td align="left">Week Number</td>
		      <td align="left" width="400">Deliverable</td>
		      <td align="left">Status</td>
		      <td align="left">Deadline</td>
		      <td align="left">Duration - Number Of Weeks</td>
		      <td align="left">% of Completion</td>
		      <?php if($user_type=='MEN') { ?><td align="left" width="100">Action</td><?php } ?>
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
		      <td class="td_txt"><?php echo $project_delivers; ?></td>
		      <td class="td_txt"><?php echo $statusText; ?></td>
		      <td class="td_txt"><?php echo $deadline; ?></td>
		      <td class="td_txt"><?php echo $duration_weeks1; ?></td>
		      <td class="td_txt"><?php echo $percent_complete; ?> %</td>
		<?php if($user_type=='MEN') { ?>
		      <td align="center">
			<a href="myProjectView3.php?edit_submit=<?php echo $project_delivers_id;?>&ipaid=<?php echo $ipaid;?>"><i class="fa fa-pencil edit"></i></a><a class="delete" href="myProjectView3.php?delete_submit=<?php echo $project_delivers_id;?>&ipaid=<?php echo $ipaid;?>"><i class="fa fa-trash trash"></i></a>
			
		      </td>
		<?php } ?>
		    </tr>
		<?php $i++; } ?>
		</table>
		</div>
	</form>


		<div class="gap20"></div>
	</div>
</div>
<div class="gap30"></div>
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
            $("#form_deliver").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            weekno: {
                                            required: true,
						digits:true,
                                            },
                                           project_delivers : {
                                            required: true,
					    						
                                            },
                                            deadline: {
                                            required: true,
					    },
                                            duration_weeks: {
                                            required: true,
						digits:true,
                                            },
					    percent_complete: {
                                            required: true,
						digits: true,
					    },
					   deliver_status:  {
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



