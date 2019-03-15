<?php
$page="myProjectView4";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];

if(isset($submit_del)) {
	$query_del = "DELETE FROM too_project_solution WHERE project_solution_id='$submit_del'";
	$statement_del= $mysqli->prepare($query_del);
	$statement_del->execute();	
}


if(isset($solution_submit1)){
	$query = "UPDATE institution_project_assign SET project_link=? where institution_project_assign_id='$ipaid'";
	//echo "UPDATE institution_project_assign SET project_link='$project_link' where institution_project_assign_id='$ipaid'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('s',$project_link);
	$statement->execute();	
	
	header("location:myProjectView4.php?ipaid=$ipaid");
}

if(isset($solution_submit)) {				
	$status="A";
	$path = "uploads/solution/";
	$name1="diagram";
	$name2="files";
	$ins_id="";
	if($_FILES[$name2]["size"]>0)
	{
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

		//echo $ipaid."#".$user_id."#".$notes."#".$name1_file."#".$name2_file."#".$status;exit;
		

		$query2 = "INSERT INTO  too_project_solution (institution_project_assign_id, user_id, notes, files, added_date, status) VALUES(?,?,?,?, now(), ?)";
		$statement2= $mysqli->prepare($query2);
		$statement2->bind_param('iisss', $ipaid, $user_id, $notes, $name2_file, $status);
		$statement2->execute();
		$ins_id=$statement2->insert_id;
	}

	if($_FILES[$name1]["size"]>0 && $ins_id!='')
	{
		/*------ Diagram --------*/
		$img_name1= $_FILES[$name1]['name']; 
		$val1=explode(".",$img_name1);
		$tmp_file1 = $_FILES[$name1]['tmp_name'];
		$imgtype1=substr(strrchr(basename($_FILES[$name1]["name"]),"."),1); 
		$imgtype1=strtolower($imgtype1);
		if($imgtype1=='jpg' || $imgtype1=='gif' || $imgtype1=='png'|| $imgtype1=='jpeg'){
		$name1_file = $val1[0].time().".".$imgtype1;
		move_uploaded_file($tmp_file1,$path.$name1_file);
		}

		$queryUP = "UPDATE too_project_solution SET diagram=? WHERE project_solution_id='$ins_id'";
		$statementUP= $mysqli->prepare($queryUP);  
		$statementUP->bind_param('s',$name1_file);
		$statementUP->execute();	

	}

	header("location:myProjectView4.php?ipaid=$ipaid");

}

$query3 = "SELECT project_link FROM  institution_project_assign  WHERE institution_project_assign_id=$ipaid";
//echo "SELECT project_link FROM  institution_project_assign  WHERE institution_project_assign_id=$ipaid";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($project_link);
$statement3->fetch();


$query1 = "SELECT project_solution_id, notes, diagram, files, added_date FROM  too_project_solution  WHERE project_solution_id!='' AND institution_project_assign_id=$ipaid ORDER BY project_solution_id DESC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($project_solution_id1, $notes1, $diagram1, $files1, $added_date1);

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
		<h4>Product Solutions</h4>
		<div class="gap20"></div>
	<form id="form_solution1" method="POST" enctype="multipart/form-data" <?php if($user_type=='MEN' || $user_type=='SP') { ?>style="display:block;"<?php } else { ?>style="display:none;"<?php } ?>>

		<div class="form-group">
			<label class="col-sm-3 text-right">Project Link <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-external-link"></i></span>
				<textarea class="form-control tal10" id="project_link" name="project_link"><?php echo $project_link;?></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="project_link"></span>
			</div>
			<div class="gap1"></div>
		</div>
		
		<div class="col-sm-9 col-sm-push-3 text-right">
			<button style="background: #840053; color: #fff;" type="submit" class="btn submitM" id="solution_submit1" name="solution_submit1">Submit</button>
		</div>
		<div class="gap1"></div>
</form>

<hr>
<div class="gap20"></div>

	<form id="form_solution" method="POST" enctype="multipart/form-data" <?php if($user_type=='MEN' || $user_type=='SP') { ?>style="display:block;"<?php } else { ?>style="display:none;"<?php } ?>>
		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Notes <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-file-o"></i></span>
				<textarea class="form-control tal100" id="notes" name="notes"></textarea>
				</div>
				<div class="gap1"></div>
				<span class="errors" for="notes"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Diagram</label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="diagram" name="diagram">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="diagram"></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Files <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				<input type="file" placeholder="" class="form-control" id="files" name="files">
				</div>
				<div class="gap1"></div>
				<span class="errors" for="files"></span>
			</div>
			<div class="gap1"></div>
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
		      <td align="center" width="400">Solution Notes</td>
		      <td align="center">Solution Diagram</td>
		      <td align="center">Solution Files</td>
		<?php if($user_type=='MEN') { ?>
		      <td align="center">Action</td>
		<?php } ?>
		      </tr>
		  </thead>
		<?php $i=1; while($statement1->fetch()) {
			$added_date1=sysDBDateConvert($added_date1);
		?>
		    <tr class="tr">
		      <td align="center"><?php echo $i; ?></td>
		      <td class="td_txt"><?php echo $added_date1; ?></td>
		      <td class="td_txt"><?php echo $notes1; ?></td>
		      <td align="center"><a href="uploads/solution/<?php echo $diagram1; ?>" target="_blank"><img src="uploads/solution/<?php echo $diagram1; ?>" width="150px"></a></td>
		      <td align="center"><a href="uploads/solution/<?php echo $files1; ?>" target="_blank"><img src="images/doc.png" width="150px"></a></td>
		<?php if($user_type=='MEN') { ?>
		      <td align="center">
			<button type="submit" class="" id="submit_del" name="submit_del" value="<?php echo $project_solution_id1; ?>"><i class="fa fa-trash"></i></button>
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
            $("#form_solution").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
					    
                                            notes: {
                                            required: true,
                                            },
					    diagram : {
                                            //required: true,
                                            accept: "jpg|jpeg|png",
					    filesize: 1048576,
                                            },
                                            files: {
                                            required: true,
                                            fileextension: true,
					    filesize: 10485760,
					    },
                                           
                                           
					   
                                            
               },


				//The error message Str here

           messages: {
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
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_solution1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
					    project_link: {
					    required: true,
					    },
                                            
                                           
                                           
					   
                                            
               },


				//The error message Str here

           messages: {
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

<script>
$(document).ready(function() {
	$('#submit_del').click(function() {
		var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
		if (agree) {
			$("#form_deliver1").submit();
		} else {
			return false;
		}
	});
});
</script>
