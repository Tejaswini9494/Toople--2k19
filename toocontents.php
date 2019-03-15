<?php
$page="toocontents";
$title="Tooople Contents";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");
extract($_REQUEST);

session_start();

$usrid=$_SESSION["userid"];
$usrtype=$_SESSION["type"];

function limitTxt1($strg) {
	if (strlen($strg) > 180) {
		$strg1=substr($strg, 177);
		$strg1P=strpos($strg1," ");
		$strg1P=$strg1P+177;
		echo substr($strg, 0, $strg1P)."...";
	} else {
	   echo $strg;
	}
}

include("header.php"); 
if(isset($search_submit)) {

	if($category!='' || $complexity!='' || $name!='') {
		$qry.=" AND category LIKE '%".$category."%' AND complexity LIKE '%".$complexity."%' AND name LIKE '%".$name."%'";
	} else {
		$qry='';
	}
}

			////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =9; 
				////======= Paging =====///

$query1 = "SELECT algo_id, algorithm_id, name, category, objectives, status, created_by FROM  too_algorithm  WHERE algo_id!='' AND status='A'$qry ORDER BY algo_id DESC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($algo_id, $algorithm_id, $name, $category, $objectives, $status,$created_by);
$numRows=$statement1->num_rows();

				////======= Paging =====///
				$endrow=$startrow + $display;
				if ($endrow	> $numRows)
				{
					$endrow= $numRows;
				}
				$query1.=" LIMIT $startrow, $display";
				$statement2=$mysqli->prepare($query1);//echo $query1;
				
				$statement2->execute();
				$statement2->store_result();
				$statement2->bind_result($algo_id, $algorithm_id, $name, $category, $objectives, $status,$created_by);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///


$query3 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE category_id='21'";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($subcategory_id2, $subcategory_name2);

$query4 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE category_id='22'";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id1, $subcategory_name1);


?>

<h3>Algorithms
<span class="pull-right"><a href="javascript:history.back();" class="btn submitBk">&raquo; Back</a></span>
</h3>
<div class="gap20"></div>
<div class="well1 filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<select id="category" name="category" class="form-control">
			<option value="">Algorithm Category</option>
		<?php while($statement3->fetch()) { ?>
			<option value="<?php echo $subcategory_id2; ?>" <?php if($category==$subcategory_id2) { echo "selected"; } ?>><?php echo $subcategory_name2; ?></option>
		<?php } ?>
		</select>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<select id="complexity" name="complexity" class="form-control">
			<option value="">Complexity</option>
		<?php while($statement4->fetch()) { ?>
			<option value="<?php echo $subcategory_id1; ?>" <?php if($complexity==$subcategory_id1) { echo "selected"; } ?>><?php echo $subcategory_name1; ?></option>
		<?php } ?>
		</select>
	</div>
	<div class="gap15 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<input type="text" id="name" name="name" class="form-control" placeholder="Title" value="<?php echo $name; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="toocontents.php" class="btn submitM cancelBtn">Cancel</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>
<div class="gap20"></div>

<div class="row">

<?php $i=1; while($statement2->fetch()) { 

	$query5 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id='$category'";
	$statement5=$mysqli->prepare($query5);
	$statement5->execute();
	$statement5->store_result();
	$statement5->bind_result($subcategory_id, $subcategory_name);
	$statement5->fetch();

?>
<div class="col-sm-4">
	<div class="courseBox">
		<div class="algoInnB2 text-grey">
		<h4><a href="tooAlgorithms_view.php?aid=<?php echo $algo_id; ?>"><?php echo $name; ?></a></h4>
		</div>
		<div class="gap10"></div>

		<span class="text-grey">Algorithm Category :</span> <?php echo $subcategory_name; ?>
		<div class="gap10"></div>

		<div class="algoInnB1 text-grey"><?php limitTxt1($objectives); ?></div>
		<div class="gap15"></div>
		<?php if($usrid!=$created_by && $usrtype!='SP' && $usrtype!='SI'){ ?>
 		<a href="algorithmSolution.php?aid=<?php echo $algo_id; ?>" class="btn submitM">Upload Solution</a>
		<?php } ?>
		
		

		<!--<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="") { ?>
		<a href="index.php" class="btn submitM">Take Algorithm</a>
		<?php } else { ?>
		<a href="paySummary.php" class="btn submitM">Take Algorithm</a>
		<?php } ?>-->
	</div>
	<!--<img width="100%" src="images/shd.png">-->
	<div class="gap20"></div>
</div>



<?php if($i==3) { ?>
<div class="gap20"></div>
<?php $i=0;} ?>

<?php $i++; } ?>


<div class="gap1"></div>
</div>

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
				print("<li><a href='".$PHP_SELF."toocontents.php?&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
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
						print("<li><a href='".$PHP_SELF."toocontents.php?&startrow=$nextrow'>$i </a></li>");
					}
				} 
			}
									
			if ($endrow	< $numRows){
				if ($pages != 1){
					$nextrow = $startrow + $display;
					echo("<li><a href='".$PHP_SELF."toocontents.php?&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
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

function empty_form(val1){
        $("#"+val1).closest('#form_search').find("input[type=text], select, textarea").val("");
	
}
</script>
