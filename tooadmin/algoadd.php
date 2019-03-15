<?php
$page="algoadd";
$title="Algo Add";
include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);

$userid=$_SESSION['userid'];

if(isset($abstract_submit)) {
	//echo $name."#".$category."#".$objectives."#".$complexity."#".$busi_scenerio."#".$pblm_stmt."#".$exp_outcome."#".$tools."#".$ref_url."#";
	$pname=$name;

	if($aid!='') {
		$query3 = "UPDATE too_algorithm SET algorithm_id=?, name=?, category=?, objectives=?, complexity=?, busi_scenerio=?, pblm_stmt=?, exp_outcome=?, tools=?, ref_url=? WHERE algo_id=?";
		$statement3= $mysqli->prepare($query3);  
		$statement3->bind_param('ssssssssssi', $algorithm_id, $pname, $category, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $aid);
		$statement3->execute();

		$path = "../uploads/algorithm/";
		$name="imgdoc";
		if($_FILES[$name]["size"]>0)
		{
			//echo $_FILES[$name]["size"].'###';

			$img_name= $_FILES[$name]['name']; 
			$val1=explode(".",$img_name);
			$tmp_file = $_FILES[$name]['tmp_name'];
			$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
			$imgtype=strtolower($imgtype);	
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='xls' || $imgtype=='pdf'){
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);

			$query3 = "UPDATE too_algorithm SET imgdoc=? WHERE algo_id=?";
			$statement3= $mysqli->prepare($query3);  
			$statement3->bind_param('si', $imgdoc, $aid);
			$statement3->execute();
			header("location:selectedProjects.php");
		
			}

		}
header("location:selectedProjects.php");
	} else {

		$status="SFA";
		$path = "../uploads/algorithm/";
		$name="imgdoc";
		if($_FILES[$name]["size"]>0)
		{
			//echo $_FILES[$name]["size"].'###';

			$img_name= $_FILES[$name]['name']; 
			$val1=explode(".",$img_name);
			$tmp_file = $_FILES[$name]['tmp_name'];
			$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
			$imgtype=strtolower($imgtype);	
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='xls' || $imgtype=='pdf'){
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);

			$query1 = "INSERT INTO  too_algorithm (algorithm_id, name, category, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc, added_date, status) VALUES(?,?,?,?,?,?,?,?,?,?,?, now(), ?)";
			$statement1= $mysqli->prepare($query1);
			$statement1->bind_param('ssssssssssss', $algorithm_id, $pname, $category, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $name_file, $status);
			$statement1->execute();

			}
		}
	}

	//getMessageNotification('regS');
	
}

if($aid!='') {

	$sql2 = "SELECT algo_id, algorithm_id, name, category, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc FROM  too_algorithm  WHERE algo_id='$aid'";
	$statement2=$mysqli->prepare($sql2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($algo_id1, $algorithm_id1, $name1, $category1, $objectives1, $complexity1, $busi_scenerio1, $pblm_stmt1, $exp_outcome1, $tools1, $ref_url1, $imgdoc1);
	$statement2->fetch();
}

$sql3 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE category_id='21'";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($subcategory_id, $subcategory_name);

$sql4 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE category_id='22'";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id1, $subcategory_name1);

if($pid!='') {

	$sql7 = "SELECT proj_id, project_id, name, category, proj_created_by, proj_status, creation_date, termination_date, proj_abstract, notes, duration, dev_platform FROM  too_projects  WHERE proj_id='$pid'";
	$statement7=$mysqli->prepare($sql7);
	$statement7->execute();
	$statement7->store_result();
	$statement7->bind_result($proj_id2, $project_id2, $name2, $category2, $proj_created_by2, $proj_status2, $creation_date2, $termination_date2, $proj_abstract2, $notes2, $duration2, $dev_platform2);
	$statement7->fetch();
}

$sql8 = "SELECT country_id, country_name, currency FROM  master_country  WHERE country_id!=''";
$statement8=$mysqli->prepare($sql8);
$statement8->execute();
$statement8->store_result();
$statement8->bind_result($country_id, $country_name, $currency);





include("header.php"); ?>

<h3 class="">
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>
<div class="x_panel">
<div class="x_content">
<div class="tab-content">
<div id="algoId" >
<form id="form_algo" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label class="col-sm-3 text-right">Algorithm Name <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cube"></i></span>
			<input type="text" name="name" id="name" class="form-control" placeholder="Algorithm Name" value="<?php echo $name1; ?>">
			</div>
			<div class="gap1"></div>
			<span for="name" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Category <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
			<select id="category" name="category" class="form-control">
				<option value="">Select</option>
			<?php while($statement3->fetch()) { ?>
				<option value="<?php echo $subcategory_id; ?>" <?php if($category1==$subcategory_id) { echo "selected"; } ?>><?php echo $subcategory_name; ?></option>
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
		<label class="col-sm-3 text-right">Algorithm Code <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cube"></i></span>
			<input type="text" name="algorithm_id" id="algorithm_id" class="form-control" placeholder="" value="<?php echo $algorithm_id1; ?>">
			</div>
			<div class="gap1"></div>
			<span for="algorithm_id" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Objectives <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-terminal"></i></span>
			<textarea id="objectives" name="objectives" class="form-control tal100" placeholder=""><?php echo $objectives1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="objectives" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Complexity Level <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
			<select id="complexity" name="complexity" class="form-control">
				<option value="">Select</option>
			<?php while($statement4->fetch()) { ?>
				<option value="<?php echo $subcategory_id1; ?>" <?php if($complexity1==$subcategory_id1) { echo "selected"; } ?>><?php echo $subcategory_name1; ?></option>
			<?php } ?>
			</select>
			</div>
			<div class="gap1"></div>
			<span for="complexity" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Business Scenario <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			<textarea id="busi_scenerio" name="busi_scenerio" class="form-control tal100" placeholder=""><?php echo $busi_scenerio1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="busi_scenerio" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Problem Statement <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			<textarea id="pblm_stmt" name="pblm_stmt" class="form-control tal100" placeholder=""><?php echo $pblm_stmt1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="pblm_stmt" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Expectation Outcome <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			<textarea id="exp_outcome" name="exp_outcome" class="form-control tal100" placeholder=""><?php echo $exp_outcome1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="exp_outcome" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Tools <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			<textarea id="tools" name="tools" class="form-control tal100" placeholder=""><?php echo $tools1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="tools" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Reference URL <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
			<textarea id="ref_url" name="ref_url" class="form-control tal100" placeholder=""><?php echo $ref_url1; ?></textarea>
			</div>
			<div class="gap1"></div>
			<span for="ref_url" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="form-group">
		<label class="col-sm-3 text-right">Uploads <span class="red">*</span></label>
		<div class="col-sm-9">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-file"></i></span>
			<input type="file" name="imgdoc" id="imgdoc" class="form-control">
			</div>
			<div class="gap1"></div>
			<span for="imgdoc" class="errors"></span>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap15"></div>

	<div class="col-sm-9 col-sm-push-3">

		<div style="display:<?php if($q9err!=0) { echo 'block'; } else { echo 'none'; } ?>;">
			<div class="alert alert-danger alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				Please add atleast one cost.
			</div>
		</div>

		<input id="abstract_submit" name="abstract_submit" class="btn submitM" type="submit" value="Submit"> &nbsp;
	<!--	<input id="" class="btn submitM" type="submit" value="Submit" data-toggle="modal" data-target="#modal_contentsuccess"> &nbsp;	-->
		<a href="selectedProjects.php" class="btn submitM cancelBtn">Cancel</a>
	<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
	</div>
	<div class="gap1"></div>

</form>
</div>
</div>
</div>
</div>
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
            $("#form_algo").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            name: {
                                            required: true,
					    firstChar: true,
					    lettersonly4N: true,
                                            },
	
                                            category: {
                                            required: true,
					   					
                                            },
                                            algorithm_id: {
                                            required: true,
					    },

                                            objectives: {
                                            required: true,
                                            },	
					    complexity: {
                                            required: true,
                                            },
	
                                            busi_scenerio: {
                                            required: true,
					   					
                                            },
                                            pblm_stmt: {
                                            required: true,
					    },

                                            exp_outcome: {
                                            required: true,
                                            },		   
                                             tools: {
                                            required: true,
					   					
                                            },
                                            ref_url: {
                                            required: true,
					    },

                                            imgdoc: {
                                            required: true,
					    fileextension:true,
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

