<?php
$page="productCost";
//$tit="Add Cost";
include_once("../class/config.php");
include_once("../includes/functions.php");
session_start();

extract($_REQUEST);

$userid=$_SESSION['userid'];
//echo $userid."#";

if($tp=='') { $tp=1; }

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
			$statement10->bind_param('isss', $proj_temp_id1a, $country_temp1a, $cost_temp1a, $status);
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
		$statement3->bind_param('ssssssssssi', $algorithm_id, $pname, $categoryaa, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $aid);
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
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'|| $imgtype=='xls'){
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);

			$query3 = "UPDATE too_algorithm SET imgdoc=? WHERE algo_id=?";
			$statement3= $mysqli->prepare($query3);  
			$statement3->bind_param('si', $name_file , $aid);
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
			if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='xls' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);

			$query1 = "INSERT INTO  too_algorithm (algorithm_id, name, category, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc, created_by, added_date, status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?, now(), ?)";
			$statement1= $mysqli->prepare($query1);
			$statement1->bind_param('sssssssssssis', $algorithm_id, $pname, $categoryaa, $objectives, $complexity, $busi_scenerio, $pblm_stmt, $exp_outcome, $tools, $ref_url, $name_file,$userid, $status);
			$statement1->execute();

			}
		}
	}

	//getMessageNotification('regS');
	header("location:program_mgnt.php");
	exit;

}

if($pt=='PT2' && $aid!='') {

	$sql2 = "SELECT algo_id, algorithm_id, name,category, objectives, complexity, busi_scenerio, pblm_stmt, exp_outcome, tools, ref_url, imgdoc FROM  too_algorithm  WHERE algo_id='$aid'";
	$statement2=$mysqli->prepare($sql2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($algo_id1, $algorithm_id1, $name1,$category1 ,$objectives1, $complexity1, $busi_scenerio1, $pblm_stmt1, $exp_outcome1, $tools1, $ref_url1, $imgdoc1);
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

if($pt=='PT1' && $pid!='') {

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

$sql41 = "SELECT s_first_name FROM student_info WHERE user_id='$userid'";
$statement41=$mysqli->prepare($sql41);
$statement41->execute();
$statement41->store_result();
$statement41->bind_result($s_first_name);
$statement41->fetch();
include("header.php"); ?>

<h3 class="">
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>


<div id="proId12" style="display:block;">

	<div class="tab-content">

		<!---------- 5 --------->
		<div id="spro5" class="tab-pane fade in active">
		<form id="form_project3" method="POST" enctype="multipart/form-data">
			<div class="gap20"></div>
			<h4>Product Cost</h4>
			<div class="gap20"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<select id="country" name="country" class="form-control" onchange="load_currency(this.value)">
						<option value="">Select</option>
					<?php while($statement8->fetch()) { ?>
						<option value="<?php echo $country_id; ?>" <?php if($country_id==$country) { echo "selected"; } ?>><?php echo $country_name; ?></option>
					<?php } ?>
					</select>
					</div>
					<div class="gap1"></div>
					<span for="country" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group" id="load_currency">
				<label class="col-sm-3 text-right">Currency <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<input type="text" name="currency" id="currency" class="form-control" value="" readonly>
					</div>
					<div class="gap1"></div>
					<span for="currency" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="form-group">
				<label class="col-sm-3 text-right">Cost <span class="red">*</span></label>
				<div class="col-sm-9">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cube"></i></span>
					<input type="text" name="cost" id="cost" class="form-control" placeholder="">
					</div>
					<div class="gap1"></div>
					<span for="cost" class="errors"></span>
				</div>
				<div class="gap1"></div>
			</div>
			<div class="gap15"></div>

			<div class="col-sm-9 col-sm-push-3">
				<button type="button" class="btn submitM" onclick="load_project_cost('')">Add Cost</button>
			</div>
			<div class="gap30"></div>


			<div class="col-sm-9 col-sm-push-3" id="load_project_cost">
			</div>

			<div class="gap5"></div>
			<div class="col-sm-9 col-sm-push-3">	
				<input id="project_submit3" name="project_submit3" class="btn submitM" type="submit" value="Submit"> &nbsp;
			<!--	<input id="" class="btn submitM" type="submit" value="Submit" data-toggle="modal" data-target="#modal_contentsuccess"> &nbsp;	-->
				<a href="products.php" class="btn submitM cancelBtn">Cancel</a>
			<!--	<input id="" class="btn submitM cancelBtn" type="reset" value="Cancel">	-->
			</div>
			<div class="gap1"></div>
		</form>
		</div>

	</div>

</form>

<!--------------end--------------->
</div>


<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
$(function() {
$("#creation_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	onClose:function(selectedDate) {
		$("#termination_date").datepicker("option","minDate",selectedDate);
}	
});
$("#termination_date").datepicker({
	defaultDate:null,
	changeMonth:true,
	changeYear:true,
	onClose:function(selectedDate) {
		$("#creation_date").datepicker("option","maxDate",selectedDate);
}	
});
});
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
            $("#form_project1").validate({
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
					    decimalnum: true,
					    },

                                            dev_platform: {
                                            required: true,
                                            },	
					   
					    proj_cat: {
					    required: true,
					    }   
                                            
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
            $("#form_algo").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            name: {
                                            required: true,
					    //firstChar: true,
					    //lettersonly4N: true,
					    minlength: 3,
					    maxlength: 50,
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
                                            //required: true,
				            //url: true,
					    },

                                            imgdoc: {
                                            //required: true,
					    //fileextension:true,
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


function categorya() 
{ 

 var id=$('#duration').val();

if(id <= 6){
$('#proj_cat').val('Micro');
}
else if(id >= 7){
$('#proj_cat').val('Macro');
}

}





</script>

