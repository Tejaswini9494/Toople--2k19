<?php
$page="myProjectView7";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];

if(isset($solution_submit)) {

$rep_date=strToTime($rep_date);
$rep_date1=date('Y-m-d', $rep_date);
//echo $rep_date1; exit;

if($updateid==''){

	$status="SFA";
	$path = "uploads/reports/";
	
	$name2="files";
	
		
		/*------ File --------*/
		$img_name2= $_FILES[$name2]['name']; 
		$val2=explode(".",$img_name2);
		$tmp_file2 = $_FILES[$name2]['tmp_name'];
		$imgtype2=substr(strrchr(basename($_FILES[$name2]["name"]),"."),1); 
		$imgtype2=strtolower($imgtype2);	
		if($imgtype2=='pdf' || $imgtype2=='doc' || $imgtype2=='docx'|| $imgtype2=='xls'){
		$name2_file = $val2[0].time().".".$imgtype2;
		move_uploaded_file($tmp_file2,$path.$name2_file);
		}

		//echo $ipaid, $user_id,$comments,$time,$name2_file,$coo_comments,$status;exit;

		$query2 = "INSERT INTO too_project_mentor_report (institution_project_assign_id, institution_project_id, project_id, user_id, coordi_id, rep_date, comments, time, files, coo_comments, added_date, status) VALUES('$ipaid', '$institution_project_id', '$project_id', '$user_id', '$coordi_id', '$rep_date1', '$comments', '$time', '$name2_file', '$coo_comments', now(), '$status')";
		$statement2= $mysqli->prepare($query2);
	        $statement2->execute();
		}
else {
      $status="SFA";

	$path = "uploads/reports/";
	
	$name2="files";
	
		
		/*------ File --------*/
		$img_name2= $_FILES[$name2]['name']; 
		$val2=explode(".",$img_name2);
		$tmp_file2 = $_FILES[$name2]['tmp_name'];
		$imgtype2=substr(strrchr(basename($_FILES[$name2]["name"]),"."),1); 
		$imgtype2=strtolower($imgtype2);	
		if($imgtype2=='pdf' || $imgtype2=='doc' || $imgtype2=='docx'|| $imgtype2=='xls'){
		$name2_file = $val2[0].time().".".$imgtype2;
		move_uploaded_file($tmp_file2,$path.$name2_file);
		}
	$query7="UPDATE too_project_mentor_report SET rep_date='$rep_date1', comments='$comments',time='$time',files='$name2_file' where project_mentor_report_id='$updateid'";
	$statement7= $mysqli->prepare($query7);  
	$statement7->execute();
}
	
	
header("location:myProjectView7.php?ipaid=$ipaid");
	}

if(isset($submit_id)) {
	
	$query4="UPDATE too_project_mentor_report SET status='$status2[$submit_id]',coo_comments='$coo_comments2_[$submit_id]' where project_mentor_report_id='$submit_id'";
	$statement4= $mysqli->prepare($query4);  
	$statement4->execute();
	
}

if(isset($edit_id)) {

$query5 = "SELECT project_mentor_report_id,DATE_FORMAT(rep_date, '%m/%d/%Y') as rep_date,comments,time,files,coo_comments,added_date,status FROM  too_project_mentor_report  WHERE project_mentor_report_id='$edit_id'";
//echo $query1;
$statement5=$mysqli->prepare($query5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($project_mentor_report_id1a,$rep_date3,$comments1a,$time1a,$files1a,$coo_comments1a,$added_date1a,$status1a);
$statement5->fetch();

	
}

$query6 = "SELECT institution_project_id FROM  institution_project_assign  WHERE institution_project_assign_id='$ipaid'";
//echo $query6;
$statement6=$mysqli->prepare($query6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($institution_project_id);
$statement6->fetch();

$query7 = "SELECT project_id FROM  institution_project  WHERE institution_project_id='$institution_project_id'";
//echo $query6;
$statement7=$mysqli->prepare($query7);
$statement7->execute();
$statement7->store_result();
$statement7->bind_result($project_id);
$statement7->fetch();

$query7a = "SELECT coordinator_id FROM  institution_project_assign  WHERE institution_project_id='$institution_project_id' AND coordinator_id!='0'";
//echo $query7a;
$statement7a=$mysqli->prepare($query7a);
$statement7a->execute();
$statement7a->store_result();
$statement7a->bind_result($coordinator_id7a);
$statement7a->fetch();

$query7b = "SELECT coordinator_id FROM  co_representative_details  WHERE co_representative_details_id='$coordinator_id7a'";
//echo $query7b;
$statement7b=$mysqli->prepare($query7b);
$statement7b->execute();
$statement7b->store_result();
$statement7b->bind_result($coordinator_id);
$statement7b->fetch();


$query1 = "SELECT project_mentor_report_id,DATE_FORMAT(rep_date, '%d/%m/%Y') as rep_date,comments,time,files,coo_comments,added_date,status FROM  too_project_mentor_report  WHERE project_mentor_report_id!='' AND institution_project_assign_id='$ipaid' ORDER BY rep_date DESC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($project_mentor_report_id1, $rep_date2, $comments1,$time1,$files1,$coo_comments1,$added_date1,$status1);

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
		<h4>Product Mentor Report</h4>
		<div class="gap20"></div>
	<form id="form_report" method="POST" enctype="multipart/form-data" <?php if($user_type=='MEN') { ?>style="display:block;"<?php } else { ?>style="display:none;"<?php } ?>>
		<div class="form-group">
			<label class="col-sm-3 text-right">Date <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="text" placeholder="" value="<?php echo $rep_date3;?>"  class="form-control date" id="rep_date" name="rep_date">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="rep_date"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Comments <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
				<textarea class="form-control tal100" id="comments" name="comments" value="<?php echo $comments1a;?>"><?php echo $comments1a;?></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="comments"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Time Duration <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				<input type="text" placeholder="Time Duration in Hours" value="<?php echo $time1a;?>"  class="form-control" id="time" name="time">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="time"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Report File</label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
				<input type="file" placeholder=""  class="form-control" id="files" name="files">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="files"></span>
			</div>
			<div class="gap1"></div>
		</div>
	
		<div>
			<input type="hidden" id="updateid" name="updateid" value="<?php echo $project_mentor_report_id1a;?>">
			<input type="hidden" id="institution_project_id" name="institution_project_id" value="<?php echo $institution_project_id;?>">
			<input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id;?>">
			<input type="hidden" id="coordi_id" name="coordi_id" value="<?php echo $coordinator_id;?>">
		</div>

		<div class="gap10"></div>
		<div class="col-sm-9 col-sm-push-3">
			<button type="submit" class="btn submitM" id="solution_submit" name="solution_submit">Submit</button>
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
		      <td align="left">Time Duration</td>
		      <td align="left">Mentor Comments</td>
		      <td align="left">Reports Files</td>
			 <td align="left">Coordinator Comments</td>
			 <td align="left">status</td>
			<td align="left">Action</td>
		      </tr>
		  </thead>
		<?php $i=1; while($statement1->fetch()) {
			$added_date1=sysDBDateConvert1($added_date1);
if($status1=='A'){
$status1='Approved';
$sta='A';
}
elseif($status1=='P'){
$status1='Pending';
$sta='P';
}
elseif($status1=='SFA'){
$status1='Sending For Approval';
$sta='SFA';
}

		?>
		    <tr class="tr">
		      <td align="center"><?php echo $i; ?></td>
		      <td ><?php echo $rep_date2; ?></td>
     		      <td ><?php echo $time1; ?></td>
		      <td ><?php echo $comments1; ?></td>
		      <td align="center"><a href="uploads/reports/<?php echo $files1; ?>" target="_blank"><img src="images/doc.png" width="25px"></a></td>
		    
		 <?php if($user_type=='COO'){ ?>
				 <td><textarea  name="coo_comments2_[<?php echo $project_mentor_report_id1;?>]" id="coo_comments2_<?php echo $project_mentor_report_id1;?>" width="300px"><?php echo $coo_comments1; ?> </textarea></td>
			 <?php } else { ?> 
				 <td class="td_txt"><?php echo $coo_comments1; ?></td> 
			<?php } ?> 

		<?php if($user_type=='COO'){ ?> 
				<td> <select id="status2" name="status2[<?php echo $project_mentor_report_id1;?>]" >
					<option value="P" <?php if($sta=='P' || $sta=='SFA' ) { echo "selected"; } ?>>Pending</option>
					<option value="A" <?php if($sta=='A') { echo "selected"; } ?>>Approved</option>
 					</select></td> 
			<?php } else { ?>
				<td align="center"><?php echo $status1; ?></td>
			 <?php } ?>

		<?php if($user_type=='COO'){ ?> 

					<td align="center"><button type="submit" name="submit_id" class="fa fa-paper-plane" id="submit_id" value="<?php echo $project_mentor_report_id1;?>"></button></td> 

			<?php } else { ?> 
			
					 <td align="center"><a href="myProjectView7.php?edit_id=<?php echo $project_mentor_report_id1;?>&ipaid=<?php echo $ipaid;?>"><i class="fa fa-pencil edit"></i></a></td>

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
            $("#form_report").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            rep_date: {
                                            required: true,
                                            },
                                            comments: {
                                            required: true,
                                            },
					    time : {
                                            required: true,
                                            decimalnum: true,
                                            },
                                            files: {
                                            //required: true,
                                            fileextension: true,
					    filesize: 10485760,
					    },
                                           
                                           
					   
                                            
               },


				//The error message Str here

           messages: {
					    time: {
             				    decimalnum: "Kindly enter numbers only",
                                            },
					    diagram: {
                                            accept: "Please enter ' jpg | jpeg | png ' image formats only",
					    filesize: "Please Upload a File less Than 1 MB",
                                            },
					    files: {
             				    fileextension: "Kindly upload in document format",
					    filesize: "Please Upload a File less Than 10 MB",
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
