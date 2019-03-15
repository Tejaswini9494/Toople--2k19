<?php
$page="tooprojects";
$title="Tooople Projects";
$ses="no";
include_once("class/config.php");
require_once 'includes/encrypt.php';
include_once("includes/functions.php");
include("class/paging.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];

$qry='';

if(isset($search_submit)) {
	if($name!=''){
		$qry.=" AND name LIKE '%".$name."%'";
	}
	if($duration!=''){
		$qry.=" AND duration LIKE '%".$duration."%'";
	}
	if($search_dev_platform!=''){
		$qry.=" AND dev_platform='$search_dev_platform'";
	}
	if($search_category!=''){
		$qry.=" AND category='$search_category'";
	}
	if($search_business_domain!=''){
		$qry.=" AND busi_domain='$search_business_domain'";
	}
}

if($cat!='' && $category=='') {
	$qry1.="AND category LIKE '%".$cat."%'";
} else {
	$qry1='';
}

if($pctid!='') {
	$qry2.=" AND category='".$pctid."'";
} elseif($ptcid!='') {
	$qry2.=" AND dev_platform='".$ptcid."'";
} elseif($pbdcid!='') {
	$qry2.=" AND busi_domain='".$pbdcid."'";
} elseif($pmcid!='') {
	$qry2.=" AND proj_method='".$pmcid."'";
} else {
	$qry2="";
}



				////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =9; 
				////======= Paging =====///
				$query1= "SELECT proj_id, project_id, name, category, busi_domain, proj_created_by, proj_abstract, duration, dev_platform, proj_img, status FROM  too_projects  WHERE proj_id!='' AND status='A' $qry $qry1 $qry2 ORDER BY proj_id DESC";
				$statement1=$mysqli->prepare($query1);
				$statement1->execute();
				$statement1->store_result();
				$statement1->bind_result($proj_id, $project_id, $name, $category, $busi_domain, $proj_created_by, $proj_abstract, $duration, $dev_platform, $proj_img, $status);
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
				$statement2->bind_result($proj_id, $project_id, $name, $category, $busi_domain, $proj_created_by, $proj_abstract, $duration, $dev_platform, $proj_img, $status);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///


include("header.php");
?>

<ol class="breadcrumb ">
	<li><a href="index.php">Home</a></li>
	<li class="active">Projects</li>				
</ol> <!--product header ends-->
<div class="gap10"></div>

<!--<h4>Projects</h4>-->
<div class="gap10"></div>

	<div class="well filterBox">
		<form id="form_search" method="POST" enctype="multipart/form-data">
			<div class="row"><div class="col-md-12">
			<!--
				<div class="col-md-3 col-sm-6">
						<input type="text" id="name" name="name" class="form-control" placeholder="Project Name" value="<?php echo $name; ?>">
				</div>

				<div class="col-md-3 col-sm-6">
					<input type="text" id="duration" name="duration" class="form-control" placeholder="Duration in Weeks" value="<?php echo $duration; ?>">
				</div>
			-->
			<div class="col-md-2 col-sm-6 col-md-offset-1">
					


					<select name="search_category" id="search_category" class="form-control" onchange="Category()">
						<option value="">Project Category</option>
						<?php projectcategory($search_category) ?>
					</select>
					
					<!--<input type="text" id="proj_cat" name="proj_cat" class="form-control" placeholder="Project Category" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" value="<?php echo $proj_cat; ?>">-->
					
				</div>

				<div class="col-md-2 col-sm-6 col-md-offset-1">
					<div id="technology">
						<!-- ajax -->
					</div>
					<!--<select id="dev_platform" name="dev_platform" class="form-control">
						<option value="" >Technology</option>
						<?php categoryForProgram(9,$dev_platform2); ?>
					</select>-->
				</div>


				<div class="col-md-2 col-sm-6 col-md-offset-1">
					<div id="business_domain">
						<!-- ajax -->
					</div>
					
				</div>

				

				<div class="col-md-2 col-sm-6 col-md-offset-1">
					<input type="submit" id="search_submit" name="search_submit" class="btn searchSub" value="Search">
		
					<!--<a href="tooprojects.php" class="btn submitM cancelBtn">Clear</a>-->
				</div>
				<div class="gap1"></div>
			</div></div>
		</form>
	</div>
	<div class="gap10"></div>


		<div class="col-md-9"><div class="row">

		<?php $i=1; while($statement2->fetch()) {
		$tech_area="";
		$busi_domain_txt="";
		$sql1 = "SELECT category_name FROM master_category WHERE category_id='$dev_platform'";
		$statement1s=$mysqli->prepare($sql1);	
		$statement1s->execute();
		$statement1s->store_result();
		$statement1s->bind_result($tech_area);		
		$statement1s->fetch();
		//echo $dev_platform."#".$tech_area;

		$sqlBS = "SELECT category_name FROM master_category WHERE category_id='$busi_domain'";
		$statementBS=$mysqli->prepare($sqlBS);	
		$statementBS->execute();
		$statementBS->store_result();
		$statementBS->bind_result($busi_domain_txt);		
		$statementBS->fetch();
		$statementBS->close();


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


			<div class="testiBox">
				<div class="row">
					<div class="col-sm-2">
						<a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><img src="uploads/<?php echo $proj_img; ?>"></a>
					</div>
					<div class="col-sm-10">
						<h4 class="proj_title"><a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><?php echo $name; ?></a></h4>
						<div class="gap5"></div>

						<h6 class="projCategoryTit">
 	<span data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Category"><?php echo getcategoryname($category); ?> - </span>
				
 	 <span data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Category Id"><?php echo $project_id; ?>&emsp; &emsp;</span>
 

					<?php if($tech_area!='') { ?>
						<span class="proI"><i class="fa fa-gears"></i></span> : 
		 <span data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Technology"><?php echo $tech_area; ?>&emsp; &emsp;</span>
					<?php } ?>
					<?php if($busi_domain_txt!='') { ?>
						<span class="proI"><i class="fa fa-black-tie"></i></span> : 
		 <span data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Business Domain"><?php echo $busi_domain_txt; ?>&emsp; &emsp;</span>
					<?php } ?>
					<?php if($duration!='') { ?>
						<span class="proI"><i class="fa fa-clock-o"></i></span> : 
		 <span data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Duration"><?php echo $duration; ?>&nbsp;Week(s)</span>
					<?php } ?>


						<?php if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP") { 
						$nrows=0;
						$sql6="select project_id FROM project_cart where user_id='$user_id' AND project_id='$proj_id' AND order_id='$id3'";
						$statement6=$mysqli->prepare($sql6);
						$statement6->execute();
						$statement6->store_result();
						$statement6->bind_result($id8);
						$nrows=$statement6->num_rows();

						if($nrows>0){ $sel='Selected'; $act='active'; } else{ $sel='Select Project'; $act=''; }
					?>
			 			<a class="btn submitM select_button pull-right  <?php echo $act;?>"  href="institutionSelectedProject.php?pid=<?php echo $proj_id; ?>" style="padding:5px;"><?php echo $sel; ?></a>
						<div class="gap1"></div>
					<?php } ?>



						</h6>
						<div class="gap10"></div>
						
						<p>
							<?php
								$abTxt_Txt="";
								$abTxt_len=strlen($proj_abstract);
								if($abTxt_len>170) {
									$abTxt_Txt=substr($proj_abstract, 0, 170);
									$sp_pos=strrpos($abTxt_Txt, ' ');
									$abTxt_Txt=substr($proj_abstract, 0, $sp_pos);
									$abTxt_Txt.="...";
								} else {
									$abTxt_Txt=$proj_abstract;
								}
							?>
							<!--<i class="fa fa-quote-left"></i>-->
							<?php echo $abTxt_Txt; ?>
							<!--<i class="fa fa-quote-right"></i>-->
						</p>
						<div class="gap5"></div>
						<a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>" class="readRHS">Read More &nbsp;<i class="fa fa-angle-right"></i></a>
						<div class="gap1"></div>
					</div>
				</div>
				<div class="gap1"></div>
			</div>

<!--
			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox-------><!--
					<div class="projImgBox">
						<a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><img src="uploads/<?php echo $proj_img; ?>"></a>
						<div class="cBox1">
							<div class="col-md-6">
								<span class="proI"><i class="fa fa-gears"></i></span> : <?php echo $tech_area; ?>
							</div>
							<div class="col-md-6">
								<span class="proI"><i class="fa fa-clock-o"></i></span> : <?php echo $duration; ?> Weeks
							</div>


						</div>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><?php echo $name; ?></a></h4>
						<h6 class="projCategoryTit"><?php echo getcategoryname($category); ?> - <?php echo $project_id; ?></h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll">
							<span><?php echo $proj_abstract; ?></span>
						</div>
					</div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->

					<!--	<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="tooprojects_view.php?pid=<?php echo $proj_id; ?>"><?php echo $proj_created_by; ?></a></span>	-->
<!--
					<?php if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP") { 
						$nrows=0;
						$sql6="select project_id FROM project_cart where user_id='$user_id' AND project_id='$proj_id' AND order_id='$id3'";
						$statement6=$mysqli->prepare($sql6);
						$statement6->execute();
						$statement6->store_result();
						$statement6->bind_result($id8);
						$nrows=$statement6->num_rows();

						if($nrows>0){ $sel='Selected'; $act='active'; } else{ $sel='Select Project'; $act=''; }
					?>
			 			<a class="btn submitM pull-right <?php echo $act;?>"  href="institutionSelectedProject.php?pid=<?php echo $proj_id; ?>" style="padding:5px;"><?php echo $sel; ?></a>
						<div class="gap1"></div>
					<?php } ?>
					</div>
				</div><!-------courseBox------->
			<!--</div>

		<?php if($i==3) { ?>
		<div class="gap20"></div>
		<?php $i=0;} ?>-->

		<?php $i++; } ?>

		</div></div><!-------col-md-9-------->

		<div class="col-md-3"><div class="row"><!-----col-md-3-------->
			<div class="projDetail_rhs"><!-----projDetail_rhs-------->
				<div class="rhs_cat">
					<h5 class="projRhsTit" data-toggle="collapse" data-target="#pCat">PROJECT CATEGORIES</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList" id="pCat">
					<?php
						$query7= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='13' AND a.category=b.category_id GROUP BY a.category";
						$statement7=$mysqli->prepare($query7);
						$statement7->store_result();
						$statement7->bind_result($projcat_count, $projcat_name, $projcat_id);
						$statement7->execute();
						while($statement7->fetch()) {
					?>
						<li class="<?php if($projcat_id==$pctid) { echo 'active'; } ?>">
							<a href="tooprojects.php?pctid=<?php echo $projcat_id; ?>"><?php echo $projcat_name; ?></a>
							<span class="pull-right"><?php echo $projcat_count; ?></span>
						</li>
					<?php } $statement7->close(); ?>
					</ul>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit" data-toggle="collapse" data-target="#pTech">TECHNOLOGY CATEGORIES</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList" id="pTech">
					<?php
						$query8= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='3' AND a.dev_platform=b.category_id GROUP BY a.dev_platform";
						//echo $query8;
						$statement8=$mysqli->prepare($query8);
						$statement8->store_result();
						$statement8->bind_result($projtech_count, $projtech_name, $projtech_id);
						$statement8->execute();
						while($statement8->fetch()) {
					?>
						<li class="<?php if($projtech_id==$pctid) { echo 'active'; } ?>">
							<a href="tooprojects.php?ptcid=<?php echo $projtech_id; ?>"><?php echo $projtech_name; ?></a>
							<span class="pull-right"><?php echo $projtech_count; ?></span>
						</li>
					<?php } $statement8->close(); ?>
					</ul>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit" data-toggle="collapse" data-target="#pBusi">BUSINESS DOMAIN</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList" id="pBusi">
					<?php
						$query9= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='18' AND a.busi_domain=b.category_id GROUP BY a.busi_domain";
						//echo $query9;
						$statement9=$mysqli->prepare($query9);
						$statement9->store_result();
						$statement9->bind_result($bsdom_count, $bsdom_name, $bsdom_id);
						$statement9->execute();
						while($statement9->fetch()) {
					?>
						<li class="<?php if($bsdom_id==$pbdcid) { echo 'active'; } ?>">
							<a href="tooprojects.php?pbdcid=<?php echo $bsdom_id; ?>"><?php echo $bsdom_name; ?></a>
							<span class="pull-right"><?php echo $bsdom_count; ?></span>
						</li>
					<?php } $statement9->close(); ?>
					</ul>
				</div>
				<div class="dividerLine"></div>
				<div class="gap10"></div>

				<div class="rhs_cat">
					<h5 class="projRhsTit" data-toggle="collapse" data-target="#pMethod">PROJECT METHODOLOGY</h5>
		                        <span class="separateLine"></span>
					<div class="gap10"></div>
					<ul class="projRhsList" id="pMethod">
					<?php
						$query10= "SELECT COUNT(a.proj_id), b.category_name, b.category_id FROM  too_projects a, master_category b  WHERE a.proj_id!='' AND a.status='A' AND b.category_for='19' AND a.proj_method=b.category_id GROUP BY a.proj_method";
						//echo $query10;
						$statement10=$mysqli->prepare($query10);
						$statement10->store_result();
						$statement10->bind_result($prjmethod_count, $prjmethod_name, $prjmethod_id);
						$statement10->execute();
						while($statement10->fetch()) {
					?>
						<li class="<?php if($prjmethod_id==$pmcid) { echo 'active'; } ?>">
							<a href="tooprojects.php?pmcid=<?php echo $prjmethod_id; ?>"><?php echo $prjmethod_name; ?></a>
							<span class="pull-right"><?php echo $prjmethod_count; ?></span>
						</li>
					<?php } $statement10->close(); ?>
					</ul>
				</div>

			</div><!-----projDetail_rhs-------->
		</div><!-----col-md-3-------->

	</div><!-------row------->

	<div class="gap40"></div>
	<?php if($numRows>0){
		if($_SESSION["type"]=="CIN" || $_SESSION["type"]=="SP" || $_SESSION["sesLoggedInTOOPLE2016"]!="YES") { ?>
		<a class="btn submitM font16" href="institutionSelectedProject.php">Add Selected Projects</a>
	<?php } } ?>
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

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


Category();
function Category() {
	//alert('aa');
	
	var category=$( "#search_category option:selected" ).val();
	var technology="<?php echo $search_dev_platform?>";
	var business_domain="<?php echo $search_business_domain?>";
	//alert(technology+"a"+business_domain);
	//alert(category);
	$.ajax({
		url:'ajax_technology.php', 
		type:'POST',
		data: {category:category,technology:technology},
		success:function(result){ //alert(result);
			$("#technology").html(result);
			
		}
	});
	$.ajax({
		url:'ajax_business_domain.php', 
		type:'POST',
		data: {category:category,business_domain:business_domain},
		success:function(result){ //alert(result);
			$("#business_domain").html(result);
			
		}
	});
}


/*
function modal_cal_trig() {
	var val1=$( "#mentor_id option:selected" ).val();

	if(val1!="") {
	$.ajax({
		url:'ajax_modal_cal_trig.php', 
		type:'POST',
		data: {m_id11:val1},
		success:function(result){ //alert(result);
			$("#load_modal_cal_trig").html(result);
			$('#modal_mentor_calendar').modal('show');
		}
	});
	}
}
*/
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
