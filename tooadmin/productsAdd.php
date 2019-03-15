<?php  
$page="productsAdd";

include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);
$userid=$_SESSION['userid'];

if($tp=='') { $tp=1; }

if(isset($project_submit1)) {

	$creation_date1=sysConvert2($creation_date);
	$termination_date1=sysConvert2($termination_date);
	//echo $project_id."#".$name."#".$category."#".$proj_created_by."#".$proj_status."#".$creation_date."#".$termination_date."#".$status;
	//exit;

	if($pid!='') {
		$query7 = "UPDATE too_projects SET project_id=?, name=?, category=?, proj_created_by=?, proj_status=?, creation_date=?, termination_date=? WHERE proj_id=?";
		$statement7= $mysqli->prepare($query7);
		$statement7->bind_param('sssssssi', $project_id, $name, $category, $proj_created_by, $proj_status, $creation_date1, $termination_date1, $pid);
		$statement7->execute();
		$pid1=$pid;
	} else {
		$status="H";
		$query4 = "INSERT INTO  too_projects (project_id, name, category, proj_created_by, proj_status, creation_date, termination_date, added_date, status) VALUES(?,?,?,?,?,?,?, now(), ?)";
		$statement4= $mysqli->prepare($query4);
		$statement4->bind_param('ssssssss', $project_id, $name, $category, $proj_created_by, $proj_status, $creation_date1, $termination_date1, $status);
		$statement4->execute();
		$pid1=$statement4->insert_id;
	}

	header("location:productsAdd.php?pt=PT1&pid=$pid1&tp=2");
	exit;
}

if(isset($project_submit2)) {

	$query5 = "UPDATE too_projects SET proj_abstract=?, notes=?, duration=?, dev_platform=? WHERE proj_id=?";
	$statement5= $mysqli->prepare($query5);
	$statement5->bind_param('ssssi', $proj_abstract, $notes, $duration, $dev_platform, $pid);
	$statement5->execute();

	$query11 = "SELECT status FROM  too_projects  WHERE  proj_id=$pid";
	$statement11=$mysqli->prepare($query11);
	$statement11->execute();
	$statement11->store_result();
	$statement11->bind_result($projstatus);
	$statement11->fetch();

	if($projstatus!='H') {
		header("location:productsAdd.php?pt=PT1&pid=$pid&tp=3&et=Y");
		exit;
	} else {
		header("location:productsAdd.php?pt=PT1&pid=$pid&tp=3");
		exit;
	}
}

if(isset($project_submit3)) {

	$query9 = "SELECT proj_temp_id, country_temp, cost_temp FROM  too_project_cost_temp  WHERE proj_temp_id=$pid";
	$statement9=$mysqli->prepare($query9);
	$statement9->execute();
	$statement9->store_result();
	$statement9->bind_result($proj_temp_id1a, $country_temp1a, $cost_temp1a);
	$q9=$statement9->num_rows();

	if($q9>0) {
		$q9err=0;

		while ($statement9->fetch()) {
			$status="A";
			$query10 = "INSERT INTO too_project_cost (proj_id, country, cost, added_date, status) VALUES(?,?,?, now(), ?)";     
			$statement10 = $mysqli->prepare($query10);
			$statement10->bind_param('isss', $proj_temp_id1a, $country_temp1a, $cost_temp1a,$status);
			$statement10->execute();
		}

		$query6 = "UPDATE too_projects SET status='SFA' WHERE proj_id=$pid";
		$statement6= $mysqli->prepare($query6);
		$statement6->execute();

		$mysqli->query("DELETE FROM too_project_cost_temp WHERE proj_temp_id='$pid' ");

	} else {
		$q9err=1;
	}

	header("location:products.php");
	exit;
}


if(isset($abstract_submit)) {
	//echo $name."#".$category."#".$objectives."#".$complexity."#".$busi_scenerio."#".$pblm_stmt."#".$exp_outcome."#".$tools."#".$ref_url."#";
	$pname=$name;

	if($aid!='') {
		$query3 = "UPDATE too_algorithm SET algorithm_id=?, name=?, category=?, objectives=?, complexity=?, busi_scenerio=?, pblm_stmt=?, exp_outcome=?, tools=?, ref_url=? WHERE algo_id=?";
		$statement3= $mysqli->prepare($query3);  
		$statement3->bind_param('ssssssssssi', $algorithm_id, $pname, $category, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $aid);
		$statement3->execute();

		$path = "uploads/algorithm/";
		$name="imgdoc";
		if($_FILES[$name]["size"]>0)
		{
			//echo $_FILES[$name]["size"].'###';

			$img_name= $_FILES[$name]['name']; 
			$val1=explode(".",$img_name);
			$tmp_file = $_FILES[$name]['tmp_name'];
			$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
			$imgtype=strtolower($imgtype);	
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);

			$query3 = "UPDATE too_algorithm SET imgdoc=? WHERE algo_id=?";
			$statement3= $mysqli->prepare($query3);  
			$statement3->bind_param('si', $imgdoc, $aid);
			$statement3->execute();

			}
		}

	} else {

		$status="SFA";
		$path = "uploads/algorithm/";
		$name="imgdoc";
		if($_FILES[$name]["size"]>0)
		{
			//echo $_FILES[$name]["size"].'###';

			$img_name= $_FILES[$name]['name']; 
			$val1=explode(".",$img_name);
			$tmp_file = $_FILES[$name]['tmp_name'];
			$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
			$imgtype=strtolower($imgtype);	
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
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
	header("location:productsAdd.php");
	exit;

}

if($pt=='PT2' && $aid!='') {

	$sql2 = "SELECT algo_id, algorithm_id, name, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc FROM  too_algorithm  WHERE algo_id='$aid'";
	$statement2=$mysqli->prepare($sql2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($algo_id1, $algorithm_id1, $name1, $objectives1, $complexity1, $busi_scenerio1, $pblm_stmt1, $exp_outcome1, $tools1, $ref_url1, $imgdoc1);
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


$creation_date2=sysDBDateConvert($creation_date2);
$termination_date2=sysDBDateConvert($termination_date2);
}

$sql8 = "SELECT country_id, country_name, currency FROM  master_country  WHERE country_id!=''";
$statement8=$mysqli->prepare($sql8);
$statement8->execute();
$statement8->store_result();
$statement8->bind_result($country_id, $country_name, $currency);

include("header.php"); ?>

<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a> Products &raquo; Add / Edit</h3>

<div class="gap10"></div>
<!--content Box -->
<div class="x_panel">
<div class="x_content">



<ul class="nav nav-tabs">
	<li class="ntab <?php if($tp==1) { echo 'active'; }?>"><a>Primary Information</a></li>
	<li class="ntab <?php if($tp==2) { echo 'active'; }?>"><a>Additional Information</a></li>
	<li class="ntab <?php if($tp==3) { echo 'active'; }?>"><a>Product Cost</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade <?php if($tp==1) { echo 'in active'; }?>">
	<form id="form_project1aaa" method="POST" enctype="multipart/form-data">
		<div class="gap20"></div>
		<h4>Primary Information</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project ID <span class="red">*</span></label>
			<div class="col-md-5">
			  <input type="text" class="form-control" name="project_id" id="project_id" value="<?php echo $project_id2; ?>"/>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Name <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" name="name" id="name" class="form-control" placeholder="" value="<?php echo $name2; ?>">
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Category <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="category" name="category" class="form-control">
						<option value="">Select</option>
					      <?php  projectcategory($category2); ?>
						
					</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Created By <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" id="proj_created_by" name="proj_created_by" class="form-control" value= "<?php  echo $proj_created_by2; ?>" >
					
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Status <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="proj_status" name="proj_status" class="form-control">
						<option value="">Select</option>
						 <?php  projectstatus($proj_status2); ?>
					</select>
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Creation Date <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" name="creation_date" id="creation_date" class="form-control dateIcon" placeholder="" value="<?php echo $creation_date2; ?>">
			</div>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Termination Date <span class="red">*</span></label>
			<div class="col-md-5">
				<input type="text" name="termination_date" id="termination_date" class="form-control dateIcon" placeholder="" value="<?php echo $termination_date2; ?>">
			</div>
		</div>
		<div class="gap15"></div>
		<div class="col-sm-7 col-sm-push-5">	
			<input id="project_submit1" name="project_submit1" class="btn submitM" type="submit" value="Submit"> &nbsp;
			<a href="products.php" class="btn submitM cancelBtn">Cancel</a>
		</div>
		<div class="gap15"></div>
	</form>
	</div>

	<!---------- 2 --------->
	<div id="spro2" class="tab-pane fade <?php if($tp==2) { echo 'in active'; }?>">
	<form id="form_project2" method="POST" enctype="multipart/form-data">
		<div class="gap20"></div>
		<h4>Additional Information</h4>
		<div class="gap20"></div>


		<div class="form-group">
			<label class="col-md-5 text-right">Project Abstract</label>
			<div class="col-md-5">
		<textarea id="proj_abstract" name="proj_abstract" class="form-control tal100" placeholder=""><?php echo $proj_abstract2; ?></textarea>
			<br>
			<span for="proj_abstract" class="errors"></span>			
			</div>
			
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Notes</label>
			<div class="col-md-5">
					<textarea id="notes" name="notes" class="form-control tal100" placeholder=""><?php echo $notes2; ?></textarea>
			<br>			
			<span for="notes" class="errors"></span>
			</div>
			
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right"> Project Duration <span class="red">*</span></label>
			<div class="col-md-5">
					<input type="text" name="duration" id="duration" class="form-control" placeholder="" value="<?php echo $duration2; ?>">
			<br>			
			<span for="duration" class="errors"></span>
			</div>
			
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Project Development Platform <span class="red">*</span></label>
			<div class="col-md-5">
				<select id="dev_platform" name="dev_platform" class="form-control">
					<option value="" >Select</option>
					<?php categoryForProgram(3,$dev_platform2); ?>
				</select>
			<br>			
			<span for="dev_platform" class="errors"></span>
			</div>
			
		</div>
		</div>
	<div class="col-sm-7 col-sm-push-5">	
				<input id="project_submit2" name="project_submit2" class="btn submitM" type="submit" value="Submit"> &nbsp;

				<a href="products.php" class="btn submitM cancelBtn">Cancel</a>

			</div>
			<div class="gap1"></div>
		</form>
	</div>

	
	<!---------- 5 --------->
	<div id="spro5" class="tab-pane fade <?php if($tp==3) { echo 'in active'; }?>">
		<form id="form_project3" method="POST" enctype="multipart/form-data">
		<div class="gap20"></div>
		<h4>Product Cost</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Country <span class="red">*</span></label>
			<div class="col-md-5">
			<select id="country" name="country" class="form-control" onchange="load_currency(this.value)">
						<option value="">Select</option>
					<?php while($statement8->fetch()) { ?>
						<option value="<?php echo $country_id; ?>" <?php if($country_id==$country) { echo "selected"; } ?>><?php echo $country_name; ?></option>
					<?php } ?>
					</select>
			</div>
			<span for="country" class="errors"></span>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Currency</label>
			<div class="col-md-5" id="load_currency">
					<input type="text" name="currency" id="currency" class="form-control" value="" readonly>
			</div>
			<span for="currency" class="errors"></span>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<label class="col-md-5 text-right">Cost</label>
			<div class="col-md-5">
					<input type="text" name="cost" id="cost" class="form-control" placeholder="">
			</div>
			<span for="cost" class="errors"></span>
		</div>
		<div class="gap15"></div>

		<div class="form-group">
			<div class="col-md-5 col-md-push-5">
				<button type="button" class="btn submitM" onclick="load_project_cost('')">Add Cost</button>
			</div>
			<div class="gap15"></div>
			<div class="col-sm-9 col-sm-push-3" id="load_project_cost">
			</div>
		</div>
	
		<div class="col-sm-7 col-sm-push-5">	
				<input id="project_submit3" name="project_submit3" class="btn submitM" type="submit" value="Submit">&nbsp;
			<!--	<input id="" class="btn submitM" type="submit" value="Submit" data-toggle="modal" data-target="#modal_contentsuccess"> &nbsp;	-->
				<a href="products.php" class="btn submitM cancelBtn">Cancel</a>
			<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
			</div>
			<div class="gap1"></div>
		</form>
</div>
</div>

</div>
</div>




<div class="gap15"></div>

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
            $("#form_project1aaa").validate({
				errorClass:"errors",
				onkeyup: true,
				
                rules: {
                                            project_id: {
                                            required: true,
                                            },
                                            name: {
                                            required: true,
					    firstChar: true,
					    lettersonly4N: true,				
                                            },
                                            category: {
                                            required: true,
					    },
                                            proj_created_by: {
                                            required: true,
                                            },
	
                                            proj_status: {
                                            required: true,
                                            },
                                            creation_date: {
                                            required: true,
					    },
                                            termination_date: {
                                            required: true,
					    },

               },

		//The error message Str here

           messages: {

       },

                submitHandler: function(form) {
                    //form.submit();
			alert("Hiii");
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);



(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_project2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            proj_abstract: {
                                            required: true,
                                            },
	
                                            notes: {
                                            required: true,
					   					
                                            },
                                            duration: {
                                            required: true,
					    },

                                            dev_platform: {
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

$(document).ready(function(){
	load_proType();
	load_project_cost('str');
});

function load_proType() {

	var val11=$('#product_type').val();

	if(val11=='PT1') {
		$('#algoId').slideUp();
		$('#proId').slideDown();
	} else if(val11=='PT2') {
		$('#proId').slideUp();
		$('#algoId').slideDown();
	} else {
		$('#proId').slideUp();
		$('#algoId').slideUp();
	}
}

function load_currency(val1)
{
	if(val1!='') {
	$.ajax({
		url:'ajax_load_currency.php',
		type:'POST',
		data: {country:val1},
		//data:$('#form_coursereg').serialize(),
		success:function(result){ //alert(result);
			$("#load_currency").html(result);
		}
	});
	} else {
		$('#currency').val('');
	}
}

function load_project_cost(val5)
{
	var val1=$("#country option:selected").val();
	var val2=$('#cost').val();
	var val3='<?php echo $pid; ?>';
	var val4='<?php echo $et; ?>';

	$.ajax({
		url:'ajax_load_project_cost.php', 
		type:'POST',
		data: {country:val1, cost:val2, proj_temp_id:val3, et:val4, start:val5},
		//data:$('#form_coursereg').serialize(),
		success:function(result){ //alert(result);
			$("#load_project_cost").html(result);
		}
	});
}


function deleteInsiderTips(val1, val2, val3)
{  var agree=confirm("Are you sure want to delete this auction?");
   if (agree) {
    $.ajax({url:'ajax_load_project_cost.php', 
		type:'POST',
		data: {del_id:val1, proj_temp_id:val2, et:val3},
		success:function(result){	
                    document.getElementById("load_project_cost").innerHTML=result;
		}
	});
    }
}

function empty_form(val1){
	$("#"+val1).closest('#form_project3').find("input[type=text], input[type=radio], input[type=tel], select, textarea").val("");
}


<script>
$(function() {
$("#creation_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat:'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#termination_date").datepicker("option","minDate",selectedDate);
}	
});
$("#termination_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	dateFormat:'dd/mm/yy',
	onClose:function(selectedDate) {
		$("#creation_date").datepicker("option","maxDate",selectedDate);
}	
});
});
</script>

</script>

