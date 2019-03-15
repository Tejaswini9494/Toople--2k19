<?php
$page="tooprojects";
$title="Tooople Projects";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];

include("header.php");


if(isset($search_submit)) {

	if($name!='' || $dev_platform!='' || $duration!='' || $category!='') {
		$qry.=" AND name LIKE '%".$name."%' AND dev_platform LIKE '%".$dev_platform."%' AND duration LIKE '%".$duration."%' AND category LIKE '%".$category."%'";
	} else {
		$qry='';
	}
}
if($cat!='' && $category=='') {
	$qry1.="AND category LIKE '%".$cat."%'";
} else {
	$qry1='';
}

				////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =9; 
				////======= Paging =====///
$query1= "SELECT proj_id, project_id, name, category, proj_abstract, duration, dev_platform, status FROM  too_projects  WHERE proj_id!='' AND status='A'$qry $qry1 ORDER BY proj_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($proj_id, $project_id, $name, $category, $proj_abstract, $duration, $dev_platform, $status);
$numRows=$statement1->num_rows();
//echo $query1;

			////======= Paging =====///
				$endrow=$startrow + $display;
				if ($endrow > $numRows)
				{
					$endrow= $numRows;
				}
				$query1.=" LIMIT $startrow, $display";
				$statement2=$mysqli->prepare($query1);//echo $query1;
				
				$statement2->execute();
				$statement2->store_result();
				$statement2->bind_result($proj_id, $project_id, $name, $category, $proj_abstract, $duration, $dev_platform, $status);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///

 ?>
<h3>TOOOPLE Projects</h3>
<div class="well filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
		<div class="col-md-2 col-sm-6">
				<input type="text" id="name" name="name" class="form-control" placeholder="Project Name" value="<?php echo $name; ?>">
		</div>

		<div class="col-md-3 col-sm-6">
			<select id="dev_platform" name="dev_platform" class="form-control">
				<option value="" >Technology</option>
				<?php categoryForProgram(9,$dev_platform2); ?>
			</select>
		</div>

		<div class="col-md-2 col-sm-6">
			<input type="text" id="duration" name="duration" class="form-control" placeholder="Duration in Weeks" value="<?php echo $duration; ?>">
		</div>

		<div class="col-md-2 col-sm-6">
			<select name="category" id="category" class="form-control">
				<option value="">Project Category</option>
				<?php projectcategory($category) ?>
			</select>
			<!--
			<input type="text" id="proj_cat" name="proj_cat" class="form-control" placeholder="Project Category" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" value="<?php echo $proj_cat; ?>">
			-->
		</div>
	<div class="col-md-2 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search">
		
		<a href="tooprojects.php" class="btn submitM cancelBtn">Clear</a>
	</div>

	<div class="gap1"></div>
	</form>
</div>
<div class="gap10"></div>

<div class="row">

<?php $i=1; while($statement2->fetch()) {
$sql1 = "SELECT category_name FROM master_category WHERE category_id='$dev_platform'";
$statement1s=$mysqli->prepare($sql1);	
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($tech_area);		
$statement1s->fetch();

	$cost3=0;
	if($user_id!='' && $type=='CIN') {
		$sql2 = "SELECT co_country FROM  customer_organisation  WHERE user_id=$user_id";
	}elseif($user_id!='' && $type=='SP') {
		$sql2 = "SELECT s_country FROM  student_info  WHERE user_id=$user_id";
	}else {
		$sql2 = "SELECT country_id FROM  master_country  WHERE country_name='India'";
	}
		$statement2a=$mysqli->prepare($sql2);
		$statement2a->execute();
		$statement2a->store_result();
		$statement2a->bind_result($country_id);
		$statement2a->fetch();
	//echo $country_id."#"	;


	$sql3 = "SELECT cost FROM  too_project_cost  WHERE country='$country_id' AND proj_id='$proj_id'";
	$statement3=$mysqli->prepare($sql3);
	$statement3->execute();
	$statement3->store_result();
	$statement3->bind_result($cost3);
	$statement3->fetch();

	$sql5 = "SELECT currency FROM  master_country  WHERE country_id='$country_id'";
	$statement5=$mysqli->prepare($sql5);
	$statement5->execute();
	$statement5->store_result();
	$statement5->bind_result($currency);
	$statement5->fetch();

?>
<div class="col-sm-4">
	<div class="courseBox">
		<div class="absoverflow perfectScroll">
			<span><?php echo $proj_abstract; ?></span>
		</div>		
		<div class="gap5"></div>
<?php if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP") {?>
		<div class="price1"><?php echo $currency." ".$cost3; ?></div>
		<div class="gap5"></div>
<?php } ?>
		<a class="protitle" href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><?php echo $name; ?></a>
		<div class="gap1"></div>
		<hr>
		<div class="gap10"></div>

		<div class="cBox1">
			<span class="proI"><i class="fa fa-cubes"></i></span> : <?php echo getcategoryname($category); ?>
			<span class="pull-right">
				<span class="proI"><i class="fa fa-gears"></i></span> : <?php echo $tech_area; ?>
			</span>
			<div class="gap10"></div>

			<span class="proI"><i class="fa fa-clock-o"></i></span> : <?php echo $duration; ?> Weeks
		</div>
		<div class="gap20"></div>

		<a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>" class="btn submitM">Project Details</a> &nbsp;&nbsp;
		<?php if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP") { ?>

<?php 
$nrows=0;
$sql6="select project_id FROM project_cart where user_id='$user_id' AND project_id='$proj_id' AND order_id='$id3'";
$statement6=$mysqli->prepare($sql6);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($id8);
$nrows=$statement6->num_rows();
?>
			<?php if($nrows>0){ $sel='Selected'; $act='active'; } else{ $sel='Select Project'; $act=''; } ?>
			  <label class="btn submitM <?php echo $act;?>">
			   <a style="color:#fff;" href="institutionSelectedProject.php?pid=<?php echo $proj_id; ?>"> <?php echo $sel; ?></a>
			  </label>
			

	
		<?php } ?>
		<!--<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="") { ?>
		<a href="index.php" class="btn submitM">Project Details</a>
		<?php } else { ?>
		<a href="paySummary.php" class="btn submitM">Project Details</a>
		<?php } ?>-->
	</div>
	<div class="gap20"></div>
</div>
<?php if($i==3) { ?>
<div class="gap20"></div>
<?php $i=0;} ?>

<?php $i++; } ?>

</div>
<div class="gap40"></div>
<?php if($numRows>0){ ?>
<?php if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP" || $_SESSION["sesLoggedInTOOPLE2016"]!="YES") { ?>
<a href="institutionSelectedProject.php" class="btn submitM font16">Add Selected Projects</a>
<?php }  }?>


<div class="gap20"></div>



<!-- Paging Start -->
<div class="text-center">
<?php //echo $numRows." ## ".$display." ## ".$startrow; 
if($numRows>$display) {?> 
<nav aria-label="Page navigation">
<ul class="pagination">
		<?php
		if($_SERVER["QUERY_STRING"]!=""){$qs=explode("&",$_SERVER["QUERY_STRING"]);}

			$qstr="";		
			for($q=0;$q<count($qs);$q++){
				$varname=explode("=",$qs[$q]);				
				if($varname[0]!='startrow')
				{
					$qstr.=$varname[0]."=".$varname[1]."&";
				}
			}
			
			if ($startrow != 0) {  
				$prevrow = $startrow - $display;	
				print("<li><a href='tooprojects.php?$qstr&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
			} 

			$pages = intval($numRows / $display);
			$parapages=intval($pages/3);

			if ($numRows % $display) {
				$pages++;
			}
			if ($pages > 1) {
				for ($i=1; $i <= $pages; $i++) { 
					$nextrow = $display * ($i - 1);
					$presPage=($startrow/$display) +1 ;
					if ($presPage==$i){
						print("<li><span  class='active' style='color:#000000;'>$i</span></li>  "); 
					}else{
						print("<li><a href='tooprojects.php?$qstr&startrow=$nextrow'>$i </a></li>");
					}
				} 
			}
									
			if ($endrow	< $numRows){
				if ($pages != 1){
					$nextrow = $startrow + $display;
					echo("<li><a href='tooprojects.php?$qstr&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
				}
			}
		?>
	  </ul></nav>
<?php }?>
	
 </div>
<!-- paging End -->
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
            $("#form_search").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            name: {
                                           lettersonly: true,
                                            },
                                           
                                            dev_platform: {
                                          alphanumeric: true,
                                            },
					    duration: {
						 alphanumeric: true,
					     }
					     proj_cat: {
					     lettersonly: true,
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

function empty_form(val1){
        $("#"+val1).closest('#form_search').find("input[type=text], select, textarea").val("");
	
}
</script>
